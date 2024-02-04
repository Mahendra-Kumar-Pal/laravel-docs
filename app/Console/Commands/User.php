<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User as Data;

class User extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user';

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
        Data::first()->delete();
    }
}
