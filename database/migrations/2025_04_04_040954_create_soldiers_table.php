<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('soldiers', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('police_number');
            $table->string('national_id');
            $table->date('date_of_conscription');
            $table->date('discharge_from_conscription'); // تاريخ انتهاء الخدمة
            $table->string('governorate');
            $table->string('phone_number');
            $table->string('medical_condition');
            $table->string('confidentiality');
            
            $table->text('notes')->nullable(); // ملاحظات
            $table->boolean('special_case')->default(false); // حالة خاصة
             $table->foreignId('regiment_id')->constrained()->onDelete('cascade'); // العلاقة مع الفرق

             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soldiers');
    }
};
