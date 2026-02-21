<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Soldier;
use App\Models\Leave;
use Carbon\Carbon;

class UpdateSoldierStatus extends Command
{
    // تعريف اسم الكوماند
    protected $signature = 'soldiers:check-leave-status';

    // تعريف وصف الكوماند
    protected $description = 'تحديث حالة الجنود إلى working بعد انتهاء الإجازة';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $today = Carbon::today();  // التاريخ الحالي

        // الحصول على الجنود الذين لديهم إجازة وانتهت
        $soldiersOnLeave = Soldier::whereHas('leaves', function ($query) use ($today) {
            $query->where('end_date', '<=', $today)
                  ->where('status', 'leave');  // تأكد من أن الجندي في حالة إجازة
        })->get();

        foreach ($soldiersOnLeave as $soldier) {
            // تحديث حالة الجندي إلى "working"
            $soldier->status = 'working';
            $soldier->save();

            // حذف سجل الإجازة
            Leave::where('soldier_id', $soldier->id)
                 ->where('end_date', '<=', $today)
                 ->forceDelete();  // حذف السجل بشكل قسري

            \Log::info("تم تحديث حالة الجندي رقم {$soldier->id} إلى working.");
        }

        $this->info('تم تحديث حالة الجنود إلى working.');
    }
}


?>