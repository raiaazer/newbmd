<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Mail\NewRegisterMail;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    protected function validator(array $data)
    {
        // dd($data);
        return Validator::make($data, [
            'first_name' => ['string', 'max:255'], //required
            'last_name' => ['string', 'max:255'], //required
            'wife_first_name' => ['string', 'max:255'],
            'wife_last_name' => ['string', 'max:255'],
            'respondent_first_name' => ['string', 'max:255'],
            'respondent_last_name' => ['string', 'max:255'],
            'certificate_type' => ['string', 'max:255'], //required
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }


    public function certificate_register(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'wife_first_name' => 'string|max:255',
            'wife_last_name' => 'string|max:255',
            'respondent_first_name' => 'string|max:255',
            'respondent_last_name' => 'string|max:255',
            'certificate_type' => 'string|max:255',
            'email' => 'required|string|max:255|unique:users',
        ]);
        if($request->email != $request->confirm_email)
        {
            return redirect()->back();
        }
        $username = explode('@',$request->email);
        $username = $username[0];
        $password = 12345;

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        // $user->wife_first_name = $request->wife_first_name ? $request->wife_first_name : '';

        $user->wife_first_name = $request->wife_first_name ? $request->wife_first_name : '';
        $user->wife_last_name = $request->wife_last_name ? $request->wife_last_name : '';
        $user->respondent_first_name = $request->respondent_first_name ? $request->respondent_first_name : '';
        $user->respondent_last_name = $request->respondent_last_name ? $request->respondent_last_name : '';
        $user->certificate_type = $request->certificate_type ? $request->certificate_type : '';

        $user->username = $username;
        $user->email = $request->email;
        $user->password = \Hash::make($password);

        $user->save();


        $details = [
            'username' => $username,
            'email' => $request->email,
            'password' => $password
        ];
        \Mail::to($request->email)->send(new NewRegisterMail($details));

        Auth::login($user);
        return redirect()->route('type');

        // return User::create([
        //     'first_name' => isset($data['first_name']) ? $data['first_name'] : '',
        //     'last_name' => isset($data['last_name']) ? $data['last_name'] : '',
        //     // 'first_name' => $data['first_name'],
        //     // 'last_name' => $data['last_name'],

        //     'wife_first_name' => isset($data['wife_first_name']) ? $data['wife_first_name'] : '',
        //     'wife_last_name' => isset($data['wife_last_name']) ? $data['wife_last_name'] : '',
        //     'respondent_first_name' => isset($data['respondent_first_name']) ? $data['respondent_first_name'] : '',
        //     'respondent_last_name' => isset($data['respondent_last_name']) ? $data['respondent_last_name'] : '',

        //     'certificate_type' => isset($data['certificate_type']) ? $data['certificate_type'] : '',
        //     // 'certificate_type' => $data['certificate_type'],

        //     'username' => $username,
        //     'email' => $data['email'],
        //     'password' => Hash::make($password),
        // ]);
    }
    public function login()
    {
        return view('theme.login');
    }

}
