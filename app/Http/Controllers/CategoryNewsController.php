<?php

namespace App\Http\Controllers;

use App\Http\Requests\News\CreateNewsCategoryRequest;
use App\Http\Requests\News\UpdateNewsCategoryRequest;
use App\Models\CategoryNews;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryNews = CategoryNews::orderBy('created_at', 'desc')->paginate($this->pag);
        $br = ($categoryNews->currentPage() - 1) * $categoryNews->perPage() + 1;
        return view('admin.category-news.index')->withCategoryNews($categoryNews)->withBr($br);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category-news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewsCategoryRequest $r)
    {
        $input = new CategoryNews;
        $input->name   = $r->name;

        if($input->save()){
            Session::flash('success', 'Uspješno ste dodali kategoriju novosti: "'.$input->name.'"');
            $user_activity = UserActivity::create(['log_id' => Session::get('user_log_id'), 'users_activity' => 'Dodavanje kategorije novosti: "'.$input->name.'"']);
            $user_activity->save();
        }else{
            Session::flash('error', 'Whoops, something went wrong');
        }


        return redirect()->route('category-news.index');
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
    public function edit(CategoryNews $categoryNews)
    {
        return view('admin.category-news.edit')->withCategoryNews($categoryNews);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsCategoryRequest $request, CategoryNews $categoryNews)
    {
        $categoryNews->name = $request->name;

        if($categoryNews->save()){
            Session::flash('success', 'Uspješno ste izmijenili Kategoriju novosti: "'.$categoryNews->name.'"');
            $user_activity = UserActivity::create(['log_id' => Session::get('user_log_id'), 'users_activity' => 'Izmjena kategorije novosti: "'.$categoryNews->name.'"']);
            $user_activity->save();
        }else{
            Session::flash('error', 'Whoops, something went wrong');
        }

        return redirect()->route('category-news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryNews $categoryNews)
    {
        if($categoryNews->delete()){
            Session::flash('success', 'Uspješno ste obrisali kategoriju novosti: "'.$categoryNews->name.'"');
            $user_activity = UserActivity::create(['log_id' => Session::get('user_log_id'), 'users_activity' => 'Brisanje kategorije novosti: "'.$categoryNews->name.'"']);
            $user_activity->save();
        }else{
            Session::flash('error', 'Ne može se obrisati');
        }

        return redirect()->route('category-news.index');
    }
}
