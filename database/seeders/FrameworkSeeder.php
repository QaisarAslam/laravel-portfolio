<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Framework;

class FrameworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $frameworks = [
            [
                'name' => 'Laravel',
                'slug' => 'laravel',
                'visibility' => 'public'
            ],
            [
                'name' => 'Angular',
                'slug' => 'angular',
                'visibility' => 'public'
            ],
            [
                'name' => 'Cake',
                'slug' => 'cake',
                'visibility' => 'public'
            ],
            [
                'name' => 'React',
                'slug' => 'react',
            ],
            [
                'name' => 'Vue',
                'slug' => 'vue',
            ],
        ];

        foreach ($frameworks as $framework) {
            Framework::create($framework);
        }
    }
}
