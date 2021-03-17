<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogIstorija extends Model
{
    use HasFactory;
    protected $table = 'log_istorijas';

    protected $fillable = ['user_id', 'ip_address', 'user_agent', 'login_at', 'logout_at', 'users_activity', 'role'];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
