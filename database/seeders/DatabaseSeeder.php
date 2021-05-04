<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create an account for us to use
        $user = User::create([
            'email' => 'admin@example.com',
            'name' => 'admin',
            'password' => Hash::make('password'),
        ]);

        // Add some category into database
        $category_works = Category::create(['name' => 'Works']);
        $category_cookings = Category::create(['name' => 'Cookings']);
        $category_groceries = Category::create(['name' => 'Groceries']);

        Todo::factory()->count(3)
            ->for($category_works)
            ->create();
        Todo::factory()->count(3)
            ->for($category_cookings)
            ->create();
        Todo::factory()->count(3)
            ->for($category_groceries)
            ->create();
    }
}
