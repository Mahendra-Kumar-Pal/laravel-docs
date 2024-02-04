<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateTodayQuantity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'today:quantity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update today_quantity column to 0';
    
    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $finishedProducts = \App\Models\user::all();
        foreach ($finishedProducts as $finishedProduct) {
            $finishedProduct->update(['name' => 'Testing']);
        }
    }
}
