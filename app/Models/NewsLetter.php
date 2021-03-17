<?php

namespace App\Models;

use App\Traits\FilterQuery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class NewsLetter extends Model
{
    use HasFactory;

    use FilterQuery;

    protected $table = "newsletters";

    protected $fillable = [
        'email'
    ];

    public function scopeSort($query)
    {
        $r = Input::all();
        $sort = isset($r['sort']) ? $r['sort'] : "najnovije";

        switch ($sort)
        {
            case "a-z":
                $column = 'email';
                $order = 'asc';
                break;
            case "z-a":
                $column = 'email';
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
        return $this->filter($query, ['email']);
    }
}
