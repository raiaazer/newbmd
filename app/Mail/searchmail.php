<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class searchmail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    public $username, $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    // public function __construct($username, $password)
    // {
    //     $this->username = $username;
    //     $this->password = $password;
    // }

    public function __construct($details, $username, $password)
    {
        $this->details = $details;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    // public function build()
    // {
    //     return $this->from('BMD@gmail.com')->view('view.mail.test');
    // }


    public function build()
    {
        $data = User::all();
        return $this->subject('Welcome to '.env('APP_NAME'))
                    ->view('mail.test', compact('data'));
    }


    // public function index(){
    //     $data = ['name'=>'ali', 'data'=>''];
    //     Mail::send('mail', $data, function($messages) use ($user){
    //         $messages->to('sbc@gmail.com');
    //         $messages->subject('hello');
    //     });
    // }
}
