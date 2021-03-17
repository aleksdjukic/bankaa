<?php

namespace App\Http\Controllers;

use App\Http\Requests\Properties\CreatePropertyCategoryRequest;
use App\Http\Requests\Properties\UpdatePropertyCategoryRequest;
use App\Models\CategoryProperty;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryProperty = CategoryProperty::orderBy('created_at', 'desc')->paginate($this->pag);
        $br = ($categoryProperty->currentPage() - 1) * $categoryProperty->perPage() + 1;
        return view('admin.category-properties.index')->withCategoryProperty($categoryProperty)->withBr($br);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category-properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePropertyCategoryRequest $r)
    {
        $input = new CategoryProperty;
        $input->name   = $r->name;

        if ($input->save()){
            Session::flash('success', 'Uspješno ste dodali kategoriju novosti: "'.$input->name.'"');
            $user_activity = UserActivity::create(['log_id' => Session::get('user_log_id'), 'users_activity' => 'Dodavanje kategorije imovine: "'.$input->name.'"']);
            $user_activity->save();
        }else{
            Session::flash('error', 'Whoops, something went wrong');
        }

        return redirect()->route('category-properties.index');
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
    public function edit(CategoryProperty $categoryProperty)
    {
        return view('admin.category-properties.edit')->withCategoryProperty($categoryProperty);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertyCategoryRequest $request, CategoryProperty $categoryProperty)
    {
        $categoryProperty->name = $request->name;

        if($categoryProperty->save()){
            Session::flash('success', 'Uspješno ste izmijenili Kategoriju imovine: "'.$categoryProperty->name.'"');
            $user_activity = UserActivity::create(['log_id' => Session::get('user_log_id'), 'users_activity' => 'Izmjena kategorije imovine: "'.$categoryProperty->name.'"']);
            $user_activity->save();
        }else{
            Session::flash('error', 'Whoops, something went wrong');
        }

        return redirect()->route('category-properties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryProperty $categoryProperty)
    {
        if($categoryProperty->delete()){
             Session::flash('success', 'Uspješno ste obrisali kategoriju imovine: "'.$categoryProperty->name.'"');
            $user_activity = UserActivity::create(['log_id' => Session::get('user_log_id'), 'users_activity' => 'Brisanje kategorije imovine: "'.$categoryProperty->name.'"']);
            $user_activity->save();
        }else {
            Session::flash('error', 'Ne može se obrisati');
        }

        return redirect()->route('category-properties.index');
    }
}
