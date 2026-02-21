<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $jobs = [
            
            'عساكر الحكمدار',
            'عساكر القائد',
            'عساكر الوكيل',
            'عساكر الظباط',
            'خدمات',
            'تحريات',
            'عمليات',
            'شؤون',
            'رصد',
            'كمبيوتر',
            'دفاتر',
            'ميكانيكي',
            'سواق',
            'بروجي',
            'امن بوابه',
            'رقيب',
            'شاويش تدريب',
            'مكتب تدريب',
            'مغسلة',
            'حلاق',
            'مكوجي',
            'ترزي',
            'كهربائي',
            'نجار',
            'سباك', 
            'نظافة', 
            'مخبز مجندين', 
            'مطبخ مجندين', 
            'مطبخ ظباط',
             'بوفية'];

        foreach ($jobs as $job) {
            Job::create(['name' => $job]);
        }
    }
}
