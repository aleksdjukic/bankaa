<?php

namespace App\Models;

use App\Traits\FilterQuery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Property extends Model
{
    use HasFactory;

    use FilterQuery;

    protected $table = "properties";

    protected $fillable = [
        'image',
        'title_sr',
        'title_en',
        'content_sr',
        'content_en',
        'slug_en',
        'slug_sr',
        'link',
        'visibility',
        'created_at',
        'updated_at'
    ];

    public function getRouteKeyName()
    {
        return 'slug_sr';
    }
    public function scopeSort($query)
    {
        $r = Input::all();
        $sort = isset($r['sort']) ? $r['sort'] : "najnovije";

        switch ($sort)
        {
            case "a-z":
                $column = 'title_sr';
                $order = 'asc';
                break;
            case "z-a":
                $column = 'title_sr';
                $order = 'desc';
                break;
            case "najstarije":
                $column = 'created_at';
                $order = 'asc';
                break;
            case "najnovije":
                $column = 'created_at';
                $order = 'desc';
                break;
            default:
                $column = 'created_at';
                $order = 'desc';
        }

        if($sort)
        {
            return $query->orderBy($column, $order);
        }
        return $query;
    }
    public function scopeSearch($query)
    {
        return $this->filter($query, ['title_sr']);
    }
}
