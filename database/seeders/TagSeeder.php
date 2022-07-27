<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'name' => 'HTML',
                'slug' => 'HTML',
                'visibility' => 'public'
            ],
            [
                'name' => 'CSS',
                'slug' => 'CSS'
            ],
            [
                'name' => 'Javascript',
                'slug' => 'Javascript',
                'visibility' => 'public'
            ],
            [
                'name' => 'PHP',
                'slug' => 'PHP'
            ],
            [
                'name' => 'jQuery',
                'slug' => 'jQuery',
                'visibility' => 'public'
            ],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
