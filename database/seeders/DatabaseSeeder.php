<?php

namespace Database\Seeders;

use App\Models\User;
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
        \App\Models\Category::factory(5)->create();
        \App\Models\Product::factory(10)->create();
        \App\Models\User::factory(5)->create();
        \App\Models\Order::factory(5)->create();
        \App\Models\Orderdetail::factory(5)->create();
        \App\Models\Comment::factory(1)->create();

        User::factory()->create([
            'username' => 'test_user',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => rand(1,3), 
        ]);
    }
}
