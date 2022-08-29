<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotifyController extends Controller
{
    public function index(){
        $order = App\Order::find(1);
        return (new App\Notifications\StatusUpdate($order))
                ->toMail($order->user);

        // $user = App\User::find(1);
        // return (new App\Notifications\Status($user))
        //         ->toMail($user->email);
    }
}
