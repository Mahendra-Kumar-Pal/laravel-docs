<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('xyz')->everyMinute();
        $schedule->command('user')->everyMinute();
        $schedule->command('user:data')->everyMinute();
        $schedule->command('REMOVE')->everyMinute();
        $schedule->command('app:remove')->everyMinute();
        $schedule->command('today:quantity')->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
