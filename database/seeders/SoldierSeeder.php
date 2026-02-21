<?php

namespace Database\Seeders;

use App\Models\Batch;
use App\Models\Job;
use App\Models\Regiment;
use App\Models\Soldier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoldierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Soldier::factory()
            ->count(300)
            ->create();
     
    }
}
