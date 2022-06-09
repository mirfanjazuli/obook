<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        Category::create([
            'name' => 'Ensiklopedia',
            'slug' => 'ensiklopedia'
        ]);

        Category::create([
            'name' => 'Novel',
            'slug' => 'novel'
        ]);
        Category::create([
            'name' => 'Komik',
            'slug' => 'komik'
        ]);

        // Book::factory(50)->create();

    }
}
