<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('soldiers', function (Blueprint $table) {
            if (Schema::hasColumn('soldiers', 'on_leave')) {
                $table->dropColumn('on_leave');
            }
            if (Schema::hasColumn('soldiers', 'is_on_leave')) {
                $table->dropColumn('is_on_leave');
            }
            if (Schema::hasColumn('soldiers', 'leave_end_date')) {
                $table->dropColumn('leave_end_date');
            }
            if (Schema::hasColumn('soldiers', 'leave_start_date')) {
                $table->dropColumn('leave_start_date');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('soldiers', function (Blueprint $table) {
 
            
            // إعادة الأعمدة القديمة إذا كان ذلك مطلوبًا (حسب الحاجة)
            $table->boolean('on_leave')->default(false);
            $table->boolean('is_on_leave')->default(false);
            $table->date('leave_end_date')->nullable();
            $table->date('leave_start_date')->nullable();
        });
    }
};
