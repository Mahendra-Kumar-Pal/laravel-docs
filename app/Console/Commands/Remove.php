<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Remove extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remove';

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
        \App\Models\User::take(1)->delete();
    }
}
