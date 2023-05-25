<?php

namespace App\Console;

use App\Console\Commands\DeleteSOAZipFiles;
use App\Console\Commands\RefreshProductionPlan;
use App\Console\Commands\RotateLogFile;
use App\Console\Commands\SendEmailDailyProduct;
use App\Console\Commands\UpdateStatusMaterialPlan;
use App\Console\Commands\UpdateStatusProductionPlan;
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
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
