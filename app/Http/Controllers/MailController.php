<?php

namespace App\Http\Controllers;

use App\Mail\FirstMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        return view('mail');
    }

    public function firstMail()
    {
        $mail_data = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];
       
        Mail::to('first@gmail.com')->send(new FirstMail($mail_data));
       
        return redirect()->back()->with('message1', 'Mail send successfully.');
    }

    public function secondMail()
    {
        $mail_data = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];
       
        Mail::send('email-templates.first-mail', $mail_data, function ($message) {
            $message->to('second@gmail.com', 'Second Mail')->subject('Welcome!');
        });
       
        return redirect()->back()->with('message2', 'Mail send successfully.');
    }

    public function thirdMail()
    {
        $mail_data = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];
       
        Mail::raw('Text to send in an email.', function ($message) {
            $message->to('third@gmail.com')->subject('Welcome!');
        });
       
        return redirect()->back()->with('message3', 'Mail send successfully.');
    }
}
