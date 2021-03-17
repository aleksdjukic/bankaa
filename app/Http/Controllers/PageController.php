<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\UserActivity;
use App\Traits\DocumentTrait;
use App\Traits\SlugTrait;
use App\Traits\TextTrait;
use App\Traits\ImageTrait;
use App\Traits\GalleryTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Mews\Purifier\Facades\Purifier;
use App\Models\Template;

class PageController extends Controller
{
    use DocumentTrait;
    use GalleryTrait;
    use ImageTrait;
    use TextTrait;
    use SlugTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = App::getLocale();

//        $pages = Page::select('id as id', 'layout_id as layout_id', 'image as image', 'title_'.$lang.' as title_sr', 'content_'.$lang.' as content', 'slug_'.$lang.' as slug_sr', 'created_at as created_at', 'visibility as visibility')->paginate($this->pag);
//
//        $br = ($pages->currentPage() - 1) * $pages->perPage() + 1;


//        return view('admin.pages.index')->withPages($pages)->withBr($br);

        $pages = Page::orderBy('created_at', 'desc')->paginate(10);
        $br = ($pages->currentPage() - 1) * $pages->perPage() + 1;
        return view('admin.pages.index')->withPages($pages)->withBr($br)->withLang($lang);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $layoutId = key($_GET);

        $template = Template::findorFail(1);

        return view('admin.pages.create')->withLayoutId($layoutId)->withTemplate($template);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
//        dd($r->all());

        $input = new Page;
        $input->title_en    = strip_tags($r->title_en);
        $input->title_sr    = strip_tags($r->title_sr);
        $input->content_sr  = Purifier::clean($r->content_sr);
        $input->content_en  = Purifier::clean($r->content_en);
        $input->link        = str_replace("watch?v=", "embed/", (explode("&", strip_tags($r->link))[0]));
        $input->slug_en     = $this->slug('App\Models\Page', 'slug_en', $input->title_en);
        $input->slug_sr     = $this->slug('App\Models\Page', 'slug_sr', $input->title_sr);
        $input->image       = $this->storeImage('image', 'pagesImage', $r, 'default-pictures.jpg');

        $input->layout_id = $r->layout_id;

        $input->save() ? Session::flash('success', 'Uspješno ste dodali stranicu: "'.$input->title_sr.'"') : Session::flash('error', 'Whoops, something went wrong');
        $this->storeGallery('gallery', 'galleryPages',  $input->id);

        $user_activity = UserActivity::create(['log_id' => Session::get('user_log_id'), 'users_activity' => 'Dodavanje stranice: "'.$input->title_sr.'"']);
        $user_activity->save();

        $this->storeDocument('documents', 'documentPages',  $input->id);

        return redirect()->route('pages.index');
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
    public function edit(Page $page)
    {
        return view('admin.pages.edit')->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Page $page)
    {
        $page->title_en     = strip_tags($r->title_en);
        $page->title_sr     = strip_tags($r->title_sr);
        $page->content_sr   = Purifier::clean($r->content_sr);
        $page->content_en   = Purifier::clean($r->content_en);
        $page->link         = str_replace("watch?v=", "embed/", (explode("&", strip_tags($r->link))[0]));
        $page->slug_en      = $this->slug('App\Models\Page', 'slug_en', $page->title_en);
        $page->slug_sr      = $this->slug('App\Models\Page', 'slug_sr', $page->title_sr);
        $page->image        = $this->storeImage('image', 'pageImage', $r, 'default-pictures.jpg', false, false, true, $page->image);

        $page->layout_id = $r->layout_id;

        $page->save() ? Session::flash('success', 'Uspješno ste izmijenili stranicu: "'.$page->title_sr.'"') : Session::flash('error', 'Whoops, something went wrong');
        $this->storeGallery('gallery', 'galleryPages',  $page->id, true);

        $user_activity = UserActivity::create(['log_id' => Session::get('user_log_id'), 'users_activity' => 'Izmjena stranice: "'.$page->title_sr.'"']);
        $user_activity->save();

        return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $this->deleteGallery($page->id, 'galleryPage');
        (Storage::disk('pageImage')->exists($page->image) && $page->image != 'default-pictures.jpg') ? Storage::disk('pageImage')->delete($page->image) : "";
        $page->delete() ? Session::flash('success', 'Uspješno ste obrisali stranicu: "'.$page->title_en.'"') : Session::flash('error', 'Ne može se obrisati');

        $user_activity = UserActivity::create(['log_id' => Session::get('user_log_id'), 'users_activity' => 'Brisanje stranice: "'.$page->title_sr.'"']);
        $user_activity->save();

        return redirect()->route('pages.index');
    }
//
//    public function visibility(Request $r)
//    {
//        if($r->ajax())
//        {
//            $page = Page::findOrFail($r->id);
//            $page->visibility = ($page->visibility == 1) ? 0 : 1;
//            $page->save();
//            $sve = Page::where('id', '=', $r->id)->first();
//            return view('include.pages._ajax_akt_deak_pages')->withSve($sve)->withBr($r->br);
//        }
//    }

    public function search(Request $r)
    {
        if($r->ajax())
        {
            $pages = Page::sort()->search()->paginate($this->pag);
            $br = ($pages->currentPage() - 1) * $pages->perPage() + 1;
            return view('include.pages._ajax_admin_pages')->withPages($pages)->withBr($br);

        }
    }

    public function getPage($lang, $slug) {

        $page = Page::where('slug_'.$lang, '=', $slug)->first();

        return view('extends.template')->withPage($page)->withLang($lang);
    }

    public function template()
    {
        return view('admin.pages.template');
    }


}
