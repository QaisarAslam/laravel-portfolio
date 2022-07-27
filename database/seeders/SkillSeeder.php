<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            [
                'name' => 'HTML',
                'percentage' => '50',
                'logo' => 'uploads/images/skills/01_html.png',
                'visibility' => 'public'
            ],
            [
                'name' => 'CSS',
                'percentage' => '60',
                'logo' => 'uploads/images/skills/02_css.png',
                'visibility' => 'public'
            ],
            [
                'name' => 'PHP',
                'percentage' => '70',
                'logo' => 'uploads/images/skills/03_php.png',
                'visibility' => 'public'
            ],
            [
                'name' => 'Laravel',
                'percentage' => '90',
                'logo' => 'uploads/images/skills/04_laravel.png',
                'visibility' => 'public'
            ],
            [
                'name' => 'JavaScript',
                'percentage' => '60',
                'logo' => 'uploads/images/skills/05_javascript.png',
                'visibility' => 'public'
            ],
            [
                'name' => 'React',
                'percentage' => '40',
                'logo' => 'uploads/images/skills/06_react.png',
            ],
            [
                'name' => 'Angular',
                'percentage' => '50',
                'logo' => 'uploads/images/skills/07_angular.png',
            ]
        ];

        foreach ($skills as $skill)
        {
            Skill::create($skill);
        }
    }
}
