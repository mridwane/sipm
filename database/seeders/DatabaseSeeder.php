<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Car;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    Car::factory(10)->create();

    \App\Models\User::factory()->create([
      'name' => 'user',
      'email' => 'user@gmail.com',
      'password' => bcrypt('user123'),
    ]);
  }
}
