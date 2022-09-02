<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    protected $username;

    public function edit_user(){
        // $edit_acc = User::where('id','=',Auth::id())->get()->first();


        $edit_acc = User::find(Auth::id());


        // dd($edit_acc);
        return view('theme.edit-account', compact('edit_acc'));
    }


    public function forgot_password(Request $request){

        $this->validate($request, [
            'username' => 'required',
        ]);

        $user = User::find(auth()->user()->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;

        if(isset($request->username))
        {
            $prev_user = User::where([['username',$request->username],['id','!=',Auth::id()]])->first();
            if($prev_user)
                return redirect()->back()->with('error','Username already exists.');

            $user->username = $request->username;
        }


        if(isset($request->password))
        {
            $this->validate($request, [
                'password' => 'string|min:8|confirmed',
            ]);
            if (Hash::check($request->password, $user->current_password)) {
                $user->password = Hash::make($request->password);
            }
            else
                return redirect()->back()->with('error','Password not correct.');
        }
        $user->save();
        return redirect()->back()->with('success','Profile updated successfully.');
    }
    public function thank(){
        return view('thankyou');
    }

}
