<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\UserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        //--1--
        // $mail_data = [
        //     'subject'=>'User Mail'
        // ];
        // \Mail::to($user['email'])->send(new UserMail($mail_data));
        // // if (\Mail::failures()) {
        // //     return response()->Fail('Sorry! Please try again latter');
        // // }else{
        // //     return response()->success('Great! Successfully send in your mail');
        // // }
        // return 'Message sent successfully!';
        //--2--
        // $user = User::select('name', 'email')->get();
        // $mail_data = [
        //     'name'=>$user['name'],
        //     'subject'=>'User Mail'
        // ];
        // dispatch(new \App\Jobs\UserEmailJob($mail_data));
        // return 'Message sent successfully!';
        //--3-- (there is no need to make mail file)
        $mail_data = [
            'subject'=>'User Mail'
        ];
        Mail::send('User.user-mail', $mail_data, function($message) {
         $message->to('abc@gmail.com', 'Tutorials Point')->subject('Laravel HTML Testing Mail');
         //  $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
         //  $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
        //   $message->from('xyz@gmail.com','Virat Gandhi');
       });
    }
}
