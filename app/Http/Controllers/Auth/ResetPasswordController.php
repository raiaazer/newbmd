<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Http\Controllers\CertificateController;
use Auth;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
// use App\Http\Controllers\Auth\User;
use Socialite;
use App\Models\User;
use App\Models\socialProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
// use App\User;



class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;



    public function __construct()
    {
        $this->middleware('auth');
    }



}
