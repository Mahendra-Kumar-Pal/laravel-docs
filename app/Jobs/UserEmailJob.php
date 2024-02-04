<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\UserMail;
use App\Models\User;
 
class UserEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $mail_data;

    /**
     * Create a new job instance.
     */
    public function __construct($mail_data)
    {
        $this->mail_data = $mail_data;
        // dd($this->mail_data);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        dd($this->mail_data['subject']);
        $data = User::all();
        $input['subject'] = $this->mail_data['subject'];
        dd($data);
        foreach ($data as $key => $value) {
            $input['email'] = $value->email;
            $input['name'] = $value->name;
            \Mail::send('User.user-mail', [], function($message) use($input){
                $message->to($input['email'], $input['name'])
                    ->subject($input['subject']);
            });
        }
    }
}
