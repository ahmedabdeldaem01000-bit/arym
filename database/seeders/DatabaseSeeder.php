<?php

namespace Database\Seeders;

use App\Models\Regiment;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
         User::create([
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => Hash::make('12345678'),
    ]);
         
        $this->call([
            AuthoritySeeder::class,
            BatchSeeder::class,
            RegimentSeeder::class,
            JobSeeder::class,
            // SoldierSeeder::class,  // لازم يبقى آخر واحد عشان يعتمد على البياانات اللي اتنشأت قبل كده
        ]);
    }
}
