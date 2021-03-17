<?php

namespace App\Models;

use App\Traits\FilterQuery;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Input;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    use FilterQuery;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function logs(){
        return $this->hasMany(LogIstorija::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function scopeSort($query)
    {
        $r = Input::all();
        $sort = isset($r['sort']) ? $r['sort'] : "najnovije";

        switch ($sort)
        {
            case "a-z":
                $column = 'name';
                $order = 'asc';
                break;
            case "z-a":
                $column = 'name';
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
        return $this->filter($query, ['name']);
    }
}
