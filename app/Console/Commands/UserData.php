<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UserData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        \App\Models\User::first()->delete();
        // $user=User::first();
        // $user->delete();
    }
}
