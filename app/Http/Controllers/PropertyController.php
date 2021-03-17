<?php

namespace App\Http\Controllers;

use App\Http\Requests\Properties\CreatePropertyRequest;
use App\Http\Requests\Properties\UpdatePropertyRequest;
use App\Models\CategoryProperty;
use App\Models\Property;
use App\Models\UserActivity;
use App\Traits\SlugTrait;
use App\Traits\TextTrait;
use App\Traits\ImageTrait;
use App\Traits\GalleryTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
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
    public function index()
    {
        $properties = Property::orderBy('created_at', 'desc')->paginate($this->pag);
        $br = ($properties->currentPage() - 1) * $properties->perPage() + 1;
        return view('admin.properties.index')->withProperties($properties)->withBr($br);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $propertyCategories = CategoryProperty::all();
        return view('admin.properties.create')->withPropertyCategories($propertyCategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePropertyRequest $r)
    {
        $input = new Property();
        $input->category_id = $r->category_id;
        $input->title_en    = strip_tags($r->title_en);
        $input->title_sr    = strip_tags($r->title_sr);
        $input->content_sr  = $r->content_sr;
        $input->content_en  = $r->content_en;
        $input->link        = str_replace("watch?v=", "embed/", (explode("&", strip_tags($r->link))[0]));
        $input->slug_en     = $this->slug('App\Models\Property', 'slug_en', $input->title_en);
        $input->slug_sr     = $this->slug('App\Models\Property', 'slug_sr', $input->title_sr);
        $input->image       = $this->storeImage('image', 'propertiesImage', $r, 'default-pictures.jpg');


        if($input->save()){
            Session::flash('success', 'Uspješno ste dodali imovinu: "'.$input->title_sr.'"');
            $this->storeGallery('gallery-properties', 'galleryProperties',  $input->id);
            $user_activity = UserActivity::create(['log_id' => Session::get('user_log_id'), 'users_activity' => 'Dodavanje imovine: "'.$input->title_sr.'"']);
            $user_activity->save();
        }else{
            Session::flash('error', 'Whoops, something went wrong');
        }


        return redirect()->route('properties.index');
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
    public function edit(Property $property)
    {
        $propertyCategories = CategoryProperty::all();
        return view('admin.properties.edit')->withProperty($property)->withPropertyCategories($propertyCategories);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertyRequest $r, Property $property)
    {
        $property->category_id = $r->category_id;
        $property->title_en     = strip_tags($r->title_en);
        $property->title_sr     = strip_tags($r->title_sr);
        $property->content_sr   = $r->content_sr;
        $property->content_en   = $r->content_en;
        $property->link         = str_replace("watch?v=", "embed/", (explode("&", strip_tags($r->link))[0]));
        $property->slug_en      = $this->slug('App\Models\Property', 'slug_en', $property->title_en);
        $property->slug_sr      = $this->slug('App\Models\Property', 'slug_sr', $property->title_sr);
        $property->image        = $this->storeImage('image', 'propertiesImage', $r, 'default-pictures.jpg', false, false, true, $property->image);

        if($property->save()){
            Session::flash('success', 'Uspješno ste izmijenili imovinu: "'.$property->title_sr.'"');
            $this->storeGallery('gallery-properties', 'galleryProperties',  $property->id, true);
            $user_activity = UserActivity::create(['log_id' => Session::get('user_log_id'), 'users_activity' => 'Izmjena imovine: "'.$property->title_sr.'"']);
            $user_activity->save();
        }else{
            Session::flash('error', 'Whoops, something went wrong');
        }

        return redirect()->route('properties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $this->deleteGallery($property->id, 'galleryNews');
        (Storage::disk('newsImage')->exists($property->image) && $property->image != 'default-pictures.jpg') ? Storage::disk('newsImage')->delete($property->image) : "";

        if($property->delete()){
            Session::flash('success', 'Uspješno ste obrisali imovinu: "'.$property->title_en.'"');
            $user_activity = UserActivity::create(['log_id' => Session::get('user_log_id'), 'users_activity' => 'Brisanje imovine: "'.$property->title_sr.'"']);
            $user_activity->save();
        }else{
            Session::flash('error', 'Ne može se obrisati');
        }

        return redirect()->route('properties.index');
    }

    public function visibility(Request $r)
    {
        if($r->ajax())
        {
            $property = Property::findOrFail($r->id);
            $property->visibility = ($property->visibility == 1) ? 0 : 1;
            $property->save();
            $sve = Property::where('id', '=', $r->id)->first();
            return view('include.properties._ajax_akt_deak_properties')->withSve($sve)->withBr($r->br);
        }
    }

    public function search(Request $r)
    {
        if($r->ajax())
        {
            $properties = Property::sort()->search()->paginate($this->pag);
            $br = ($properties->currentPage() - 1) * $properties->perPage() + 1;
            return view('include.properties._ajax_admin_properties')->withProperties($properties)->withBr($br);
        }
    }
}
