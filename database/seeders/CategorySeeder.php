<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Sports',
                'slug' => 'sports',
                'visibility' => 'public'
            ],
            [
                'name' => 'Health',
                'slug' => 'health',
                'visibility' => 'public'
            ],
            [
                'name' => 'Technology',
                'slug' => 'technology',
                'visibility' => 'public'
            ],
            [
                'name' => 'Education',
                'slug' => 'education',
            ],
            [
                'name' => 'Motivational',
                'slug' => 'motivational',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
