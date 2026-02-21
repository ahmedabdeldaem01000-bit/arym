<?php 
namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    // في الـ schedule method، هنضيف الكوماند
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('soldiers:check-leave-status')->everyTwoMinutes();
    }
    
    // هذا الجزء يحدد الأوامر التي يمكنك تنفيذها
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }
}

?>
