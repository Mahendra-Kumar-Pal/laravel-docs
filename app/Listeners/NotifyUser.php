<?php

namespace App\Listeners;

use App\Mail\UserMail;
use App\Events\PostEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostEvent $event): void
    {
        Mail::to('user@email.com')->send(new UserMail(['email' => 'user@email.com', 'name' => 'user']));
    }
}
