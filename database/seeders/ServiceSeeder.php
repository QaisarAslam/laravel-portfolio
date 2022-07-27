<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $services = [
            [
                'name' => 'HTML & CSS',
                'description' => 'I am Intermediate in HTML & CSS',
                'image' => 'uploads/images/services/01_html_css.png',
                'visibility' => 'public'
            ],
            [
                'name' => 'PHP Expert',
                'description' => 'I am expert in php.',
                'image' => 'uploads/images/services/02_php.png',
                'visibility' => 'public'
            ],
            [
                'name' => 'Javascript Professional',
                'description' => 'I have 1 year experience in JS',
                'image' => 'uploads/images/services/03_javascript.png',
                'visibility' => 'public'
            ],
            [
                'name' => 'React Expert',
                'description' => 'I am expert in React.',
                'image' => 'uploads/images/services/04_react.png',
                'visibility' => 'public'
            ],
            [
                'name' => 'Angular Professional',
                'description' => 'I have 1 year experience in Angular',
                'image' => 'uploads/images/services/05_angular.png',
            ],
            [
                'name' => 'Node Expert',
                'description' => 'I am Intermediate in Node',
                'image' => 'uploads/images/services/06_node.png',
            ]
        ];

        foreach ($services as $skill)
        {
            Service::create($skill);
        }
    }
}
