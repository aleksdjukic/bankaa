<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;

    protected $table 	= 'users_activities';
    protected $fillable = ['log_id', 'users_activity'];

    public function logs(){
        return $this->belongsTo(LogIstorija::class, 'log_id');
    }
}
