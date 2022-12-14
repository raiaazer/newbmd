<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
// use AuthenticatesUsers;


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

    protected $username;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/birth';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->username = $this->findUsername();
        // $this->username = $this->findUsername();

    }

    public function findUsername()
    {
        $login = request()->input('login');

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        request()->merge([$fieldType => $login]);

        return $fieldType;
    }

    public function username()
    {
        return $this->username;
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'login'    => 'required',
            'password' => 'required',
        ]);

        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL )
            ? 'email'
            : 'username';

        $request->merge([
            $login_type => $request->input('login')
        ]);

        if (Auth::attempt($request->only($login_type, 'password'))) {
            return redirect()->intended($this->redirectPath());
        }

        return redirect()->back()
            ->withInput()
            ->withErrors([
                'login' => 'These credentials do not match our records.',
            ]);
    }

    protected function authenticated() {
        if (Auth::check()) {
            return redirect()->route('birth');
        }
    }


    // public function findUsername()
    // {
    //     $login = request()->input('login');

    //     $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

    //     request()->merge([$fieldType => $login]);

    //     return $fieldType;
    // }

    // public function username()
    // {
    //     return $this->username;
    // }



    // public function login(Request $request)
    // {
    // $this->validate($request, [
    //     'login'    => 'required',
    //     'password' => 'required',
    // ]);
    // $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL )
    //     ? 'email'
    //     : 'username';
    // $request->merge([
    //     $login_type => $request->input('login')
    // ]);
    // if (Auth::attempt($request->only($login_type, 'password'))) {
    //     return redirect()->intended($this->redirectPath());
    // }
    // return redirect()->back()
    //     ->withInput()
    //     ->withErrors([
    //         'login' => 'These credentials do not match our records.',
    //     ]);
    // }

}
