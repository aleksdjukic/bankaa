<?php

namespace App\Traits;

// MODELS


// VENDOR
use DB;
use Illuminate\Support\Facades\Input;


trait FilterQuery
{
    private function filter($query, $columns)
    {
        if (!Input::has('filter')){
            return $query;
        }
        $filter = Input::get('filter');
        $filter = preg_replace('/\s+/', ' ', $filter);
        $filter = explode(' ', $filter);
        $filter = array_unique($filter);
        foreach ($filter as $f){
            if (!empty($f)){
                $query->where(function($query) use ($f, $columns){
                    foreach ($columns as $key => $c){
                        $query->orWhere($c, 'like', "%" . $f . "%");
                    }
                });
            }
        }
        return $query;
    }

}
