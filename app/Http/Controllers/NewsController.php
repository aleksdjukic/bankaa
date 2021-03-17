<?php

namespace App\Http\Controllers;

use App\Http\Requests\News\CreateNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use App\Models\CategoryNews;
use App\Models\News;
use App\Models\UserActivity;
use App\Traits\SlugTrait;
use App\Traits\TextTrait;
use App\Traits\ImageTrait;
use App\Traits\GalleryTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Mews\Purifier\Facades\Purifier;

class NewsController extends Controller
{
    use GalleryTrait;
    use ImageTrait;
    use TextTrait;
    use SlugTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function _construct(){
        $this->middleware('optimizeImages')->except('index' , 'edit', 'destroy');
    }

    public function index()
    {

        $news = News::orderBy('created_at', 'desc')->paginate(10);
        $br = ($news->currentPage() - 1) * $news->perPage() + 1;
        return view('admin.news.index')->withNews($news)->withBr($br);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newsCategories = CategoryNews::all();
        return view('admin.news.create')->withNewsCategories($newsCategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewsRequest $r)
    {
        $input = new News;
        $input->category_id = $r->category_id;
        $input->title_en    = strip_tags($r->title_en);
        $input->title_sr    = strip_tags($r->title_sr);
        $input->content_sr  = Purifier::clean($r->content_sr);
        $input->content_en  = Purifier::clean($r->content_en);
        $input->link        = str_replace("watch?v=", "embed/", (explode("&", strip_tags($r->link))[0]));
        $input->slug_en     = $this->slug('App\Models\News', 'slug_en', $input->title_en);
        $input->slug_sr     = $this->slug('App\Models\News', 'slug_sr', $input->title_sr);
        $input->image       = $this->storeImage('image', 'newsImage', $r, 'default-pictures.jpg');

        if($input->save()){
            Session::flash('success', 'Uspješno ste dodali novost: "'.$input->title_sr.'"');
            $this->storeGallery('gallery-news', 'galleryNews',  $input->id);
            $user_activity = UserActivity::create(['log_id' => Session::get('user_log_id'), 'users_activity' => 'Dodavanje novosti: "'.$input->title_sr.'"']);
            $user_activity->save();
        }else{
            Session::flash('error', 'Whoops, something went wrong');
        }

        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $newsCategories = CategoryNews::all();
        return view('admin.news.edit')->withNews($news)->withNewsCategories($newsCategories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $r, News $news)
    {
        $news->category_id = $r->category_id;
        $news->title_en     = strip_tags($r->title_en);
        $news->title_sr     = strip_tags($r->title_sr);
        $news->content_sr   = Purifier::clean($r->content_sr);
        $news->content_en   = Purifier::clean($r->content_en);
        $news->link         = str_replace("watch?v=", "embed/", (explode("&", strip_tags($r->link))[0]));
        $news->slug_en      = $this->slug('App\Models\News', 'slug_en', $news->title_en);
        $news->slug_sr      = $this->slug('App\Models\News', 'slug_sr', $news->title_sr);
        $news->image        = $this->storeImage('image', 'newsImage', $r, 'default-pictures.jpg', false, false, true, $news->image);

        if($news->save()){
            Session::flash('success', 'Uspješno ste izmijenili novost: "'.$news->title_sr.'"');
            $this->storeGallery('gallery-news', 'galleryNews',  $news->id, true);
            $user_activity = UserActivity::create(['log_id' => Session::get('user_log_id'), 'users_activity' => 'Izmjena novosti: "'.$news->title_sr.'"']);
            $user_activity->save();
        }else{
            Session::flash('error', 'Whoops, something went wrong');
        }

        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $this->deleteGallery($news->id, 'galleryNews');
        (Storage::disk('newsImage')->exists($news->image) && $news->image != 'default-pictures.jpg') ? Storage::disk('newsImage')->delete($news->image) : "";

        if($news->delete()){
            Session::flash('success', 'Uspješno ste obrisali novost: "'.$news->title_en.'"');
            $user_activity = UserActivity::create(['log_id' => Session::get('user_log_id'), 'users_activity' => 'Brisanje novosti: "'.$news->title_sr.'"']);
            $user_activity->save();
        }else{
            Session::flash('error', 'Ne može se obrisati');
        }

        return redirect()->route('news.index');
    }

    public function visibility(Request $r)
    {
        if($r->ajax())
        {
            $news = News::findOrFail($r->id);
            $news->visibility = ($news->visibility == 1) ? 0 : 1;
            $news->save();

            return $news;
        }
    }

    public function search(Request $r)
    {
        if($r->ajax())
        {
            $news = News::sort()->search()->paginate($this->pag);
            $br = ($news->currentPage() - 1) * $news->perPage() + 1;
            return view('include.news._ajax_admin_news')->withNews($news)->withBr($br);
        }
    }
}
