<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Harimayco\Menu\Models\Menus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use jazmy\FormBuilder\Models\Form;

class IndexController extends Controller
{

    public function index(){
        /* get menu by id*/
//        $menu = Menus::find(1);
        /* or by name */
//        $menu = Menus::where('name','Main Menu')->first();

        /* or get menu by name and the items with EAGER LOADING (RECOMENDED for better performance and less query call)*/
        $menu = Menus::where('name','Main Menu')->with('items')->first();
        /*or by id */
//        $menu = Menus::where('id', 1)->with('items')->first();

        //you can access by model result
        $public_menu = $menu->items;

        //or you can convert it to array
//        $public_menu = $menu->items->toArray();

        return view('pages.index', compact('menu'), compact('public_menu'));

//       $data = Http::get('https://sms.novabanka.com:8487/portalgateway/v1/exchangelist/latest?apikey=7a2d0577-8ef4-41dc-b71b-71d293cc0f6f')->json();

//        return view('pages.index', ['data' => $data]);
//        return view('pages.index');
    }

    public function oneNews(){

        return view('pages.news');
    }

    public function allNews(){

        return view('pages.all-news');
    }

    public function table(){

        return view('pages.table');
    }

    public function exchange(){

        $template = Template::findorFail(1);

        $response = Form::all();

        return view('stranice.exchange-rate')->withTemplate($template)->withResponse($response);
    }

    public function menu(){

        /* get menu by id*/
//        $menu = Menus::find(1);
        /* or by name */
//        $menu = Menus::where('name','Main Menu')->first();

        /* or get menu by name and the items with EAGER LOADING (RECOMENDED for better performance and less query call)*/
        $menu = Menus::where('name','Main Menu')->with('items')->first();
        /*or by id */
//        $menu = Menus::where('id', 1)->with('items')->first();

        //you can access by model result
        $public_menu = $menu->items;

        //or you can convert it to array
//        $public_menu = $menu->items->toArray();

        return view('menu', compact('menu'), compact('public_menu'));
    }
}
