<?php

namespace App\Http\Controllers;

use App\Http\Requests\News\CreateNewsRequest;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\UserActivity;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Mews\Purifier\Facades\Purifier;


class UserController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        $br = ($users->currentPage() - 1) * $users->perPage() + 1;
        return view('admin.users.index')->withUsers($users)->withBr($br);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.users.create')->withRoles($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $r)
    {

        $input = new User;
        $input->name   = $r->name;
        $input->email    = $r->email;
        $input->role_id  = $r->role;
        $input->password    = Hash::make($r->password);
        $input->image       = $this->storeImage('image', 'usersImage', $r, 'default-user.png');

        if($input->save()){
            Session::flash('success', 'Uspješno ste dodali korisnika: "'.$input->name.'"');
            $user_activity = UserActivity::create(['log_id' => Session::get('user_log_id'), 'users_activity' => 'Dodavanje korisnika: "'.$input->name.'"']);
            $user_activity->save();
        }else{
            Session::flash('error', 'Whoops, something went wrong');
        }

        return redirect()->route('users.index');
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
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit')->withRoles($roles)->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $r, User $user)
    {
        $user->name = $r->name;
//        $user->email = $r->email;
        $user->password = $r->password;
        $user->role_id = $r->role;
        $user->image = $this->storeImage('image', 'usersImage', $r, 'default-user.png', false, false, true, $user->image);

        if($user->save()){
            Session::flash('success', 'Uspješno ste izmijenili usera: "'.$user->name.'"');
            $user_activity = UserActivity::create(['log_id' => Session::get('user_log_id'), 'users_activity' => 'Izmjena korisnika: "'.$user->name.'"']);
            $user_activity->save();
        }else{
            Session::flash('error', 'Whoops, something went wrong');
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->delete()){
            Session::flash('success', 'Uspješno ste obrisali korisnika: "'.$user->name.'"');
            $user_activity = UserActivity::create(['log_id' => Session::get('user_log_id'), 'users_activity' => 'Brisanje korisnika: "'.$user->name.'"']);
            $user_activity->save();
        }else{
            Session::flash('error', 'Ne može se obrisati');
        }

        return redirect()->route('users.index');
    }

    public function search(Request $r)
    {
        if($r->ajax())
        {
            $users = User::sort()->search()->paginate($this->pag);
            $br = ($users->currentPage() - 1) * $users->perPage() + 1;
            return view('include.users._ajax_admin_users')->withUsers($users)->withBr($br);
        }
    }

}
