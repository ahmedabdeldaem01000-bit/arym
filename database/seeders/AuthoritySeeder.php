<?php

namespace Database\Seeders;

use App\Models\Authority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthoritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authorities = [
             'قوات امن الاسماعليه',
            'قسم اول',
            'قسم ثاني',
            'قسم ثالث',
            'القنطره شرق',
            'القنطره غرب',
            'مركز الاسماعيليه',
            'مركز فايد',
            'مركز تل الكبير',
            'مركز القصاصين',
            'مركز ابو صوير',
            'الترحيلات',
            'مجمع المحاكم',
            'الحمايه المدنيه',
            'الانقاز النهري',
            'اداره المرور',
            'تامين طرق',
            'مركز التدريب',
            'المركبات',
            'المرافق',
            'جمعيه الوفاق لضباط الشرطه',
            'النجده',
            'المديريه',
            'اداره البحث',
            'الامن الوطني',
            'المحكمه العسكريه بالمستقبل',
            'التموين',
            'الحراسات الازاعة',
            'الحراسات ابو سلطان',

                        ];

        foreach ($authorities as $name) {
            Authority::create(['name' => $name]);
        }
    }
}
