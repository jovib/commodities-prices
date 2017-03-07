<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\GetGold::class,
        Commands\GetCooper::class,
        Commands\GetSilver::class,
        Commands\GetIron::class,
        Commands\GetOil::class,
        Commands\GetGas::class,
        Commands\GetCoffee::class,
        Commands\GetCorn::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('api:get-coffee')->hourly();
        $schedule->command('api:get-gas')->hourly();
        $schedule->command('api:get-copper')->hourly();
        $schedule->command('api:get-oil')->hourly();
        $schedule->command('api:get-iron')->hourly();
        $schedule->command('api:get-gold')->hourly();
        $schedule->command('api:get-silver')->hourly();
        $schedule->command('api:get-corn')->hourly();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
