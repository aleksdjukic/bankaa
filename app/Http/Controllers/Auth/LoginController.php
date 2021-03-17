<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LogIstorija;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = "admin/dashboard";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);


        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }


        if ($this->attemptLogin($request)) {

            // if (Auth::user()->role != 'super-admin') {

            $login = LogIstorija::create([
                'user_id'           =>Auth::user()->id,
                'ip_address'        =>$request->ip(),
                'user_agent'        =>isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'none',
                'login_at'          =>Carbon::now(),
                'logout_at'         =>'-',
                'role'              =>Auth::user()->role->name
            ]);
            Session::put('user_log_id', $login->id);
            // }

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        $id             = Auth::user()->id;
        $user_log_id    = Session::pull('user_log_id');
        $logout         = LogIstorija::where('id', '=', $user_log_id)->first();

        $this->guard()->logout();

        $request->session()->invalidate();

        if ($logout) {
            $logout->logout_at  = Carbon::now();
            $logout->save();
        }

        $max            = 100;
        $top            = LogIstorija::select('id')->where('role', '=', 'admin')->orderBy('id', 'DESC')->skip($max)->take(1000)->get();
        $toDelete       = array();
        foreach ($top as $key) {
            $toDelete[] = $key->id;
        }
        $logIstorija    = LogIstorija::destroy($toDelete);
        $top            = LogIstorija::select('id')->where('role', '<>', 'admin')->orderBy('id', 'DESC')->skip($max)->take(1000)->get();
        $toDelete       = array();
        foreach ($top as $key) {
            $toDelete[] = $key->id;
        }
        $logIstorija = LogIstorija::destroy($toDelete);

        return redirect()->route('login');
    }

}
