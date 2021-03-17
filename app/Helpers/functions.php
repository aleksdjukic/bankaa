<?php

use App\Models\UserActivity;
use Illuminate\Support\Facades\Auth;

function userActivities($user_log_id = null, $activity = null, $role = null){
    $role = Auth::user()->role;
    try {
        UsersActivity::create(['log_id' => $user_log_id, 'users_activity' => $activity]);
    } catch (Exception $e) {

    }
    return true;
}
