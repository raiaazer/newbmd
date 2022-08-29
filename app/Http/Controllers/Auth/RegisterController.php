<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/type';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data);
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $username = explode('@',$data['email']);
        $username = $username[0];
        // dd($username);

        // $username = substr($data['email'], 3);
        // $username = implode('@', array_slice($username, 0));
        // $username = 'us'.time();
        $password = 12345;
        // $password = rand(10000000,99999999);

        return User::create([
            'first_name' => '',
            'last_name' => '',
            'wife_first_name' => isset($data['wife_first_name']) ? $data['wife_first_name'] : '',
            'wife_last_name' => isset($data['wife_last_name']) ? $data['wife_last_name'] : '',
            'respondent_first_name' => isset($data['respondent_first_name']) ? $data['respondent_first_name'] : '',
            'respondent_last_name' => isset($data['respondent_last_name']) ? $data['respondent_last_name'] : '',

            'certificate_type' => isset($data['certificate_type']) ? $data['certificate_type'] : '',
            // 'certificate_type' => $data['certificate_type'],
            'username' => $username,
            'email' => $data['email'],
            'password' => Hash::make($password),
        ]);
    }
}
