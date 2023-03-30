<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       Category::create([
        'name' => 'Anak Anak',
        'slug' => 'anak-anak'
       ]);
       Category::create([
        'name' => 'Remaja',
        'slug' => 'remaja'
       ]);
       Category::create([
        'name' => 'Dewasa',
        'slug' => 'dewasa'
       ]);
    }
}
