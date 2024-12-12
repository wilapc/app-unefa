<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Careers;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(RoleUsers::class);

        User::create([
          'name' => 'Wilmer Pereira',
          'email' => 'wilmerapc26@gmail.com',
          'password' => '12345678',
          'id_card' => '23801640',
        ])->assignRole('student');

        User::create([
          'name' => 'Allisom Mendoza',
          'email' => 'allisomendoza2@gmail.com',
          'password' => '12345678',
          'id_card' => '25326247',
        ])->assignRole('delegate');

        User::create([
          'name' => 'Anderson Castillo',
          'email' => 'wilmer14super@gmail.com',
          'password' => '12345678',
          'id_card' => '24342167',
        ])->assignRole('student');

        Careers::create([
          'name' => 'Ingenieria de Sistema',
          'code' => '2605'
        ]);
        
        Careers::create([
          'name' => 'Ciclo Basico',
          'code' => '0001'
        ]);



        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
