<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
    
            // تاريخ بداية الإجازة
            $table->date('start_date');  
    
            // تاريخ نهاية الإجازة
            $table->date('end_date');    
    
       
    
            // حالة الإجازة (approved, expired, pending, etc.)
            $table->enum('status', ['working', 'leave'])->default('working')->change();; 
    
     
    
            // ربط الجندي بالإجازة
            $table->foreignId('soldier_id')->constrained()->onDelete('cascade'); 
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
