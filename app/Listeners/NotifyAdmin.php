<?php

namespace App\Listeners;

use App\Mail\UserMail;
use App\Events\PostEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAdmin
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
        Mail::to('admin@email.com')->send(new UserMail(['email' => 'admin@email.com', 'name' => 'admin']));
    }
}
