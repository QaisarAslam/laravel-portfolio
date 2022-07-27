<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [
            [
                'category_id' => '1',
                'framework_id' => '1',
                'name' => '1st Project',
                'url' => 'www.dummyurl.com',
                'slug' => '1st_Project',
                'description' => 'My First Project My First Project My First Project My First Project My First Project',
                'featured_image' => 'uploads/images/projects/featured-image/01.png',
                'gallery_images' => 'uploads/images/projects/gallery-images/01.png,uploads/images/projects/gallery-images/02.png,uploads/images/projects/gallery-images/03.png',
                'visibility' => 'public'
            ],
            [
                'category_id' => '2',
                'framework_id' => '2',
                'name' => '2nd Project',
                'url' => 'www.fakeurl.com',
                'slug' => '2nd_Project',
                'description' => 'My Second Project My Second Project My Second Project My Second Project My Second Project',
                'featured_image' => 'uploads/images/projects/featured-image/02.png',
                'gallery_images' => 'uploads/images/projects/gallery-images/04.png,uploads/images/projects/gallery-images/05.png,uploads/images/projects/gallery-images/06.png',
                'visibility' => 'public'
            ],
            [
                'category_id' => '3',
                'framework_id' => '3',
                'name' => '3rd Project',
                'url' => 'www.copyurl.com',
                'slug' => '3rd_Project',
                'description' => 'My Third Project My Third Project My Third Project My Third Project My Third Project',
                'featured_image' => 'uploads/images/projects/featured-image/03.png',
                'gallery_images' => 'uploads/images/projects/gallery-images/07.png,uploads/images/projects/gallery-images/08.png,uploads/images/projects/gallery-images/09.png',
                'visibility' => 'public'
            ],
            [
                'category_id' => '4',
                'framework_id' => '4',
                'name' => '4th Project',
                'url' => 'www.faultyurl.com',
                'slug' => '4th_Project',
                'description' => 'My Fourth Project My Fourth Project My Fourth Project My Fourth Project My Fourth Project',
                'featured_image' => 'uploads/images/projects/featured-image/05.png',
                'gallery_images' => 'uploads/images/projects/gallery-images/10.png,uploads/images/projects/gallery-images/11.png,uploads/images/projects/gallery-images/12.png',
                'visibility' => 'public'
            ],
            [
                'category_id' => '5',
                'framework_id' => '5',
                'name' => '5th Project',
                'url' => 'www.limitateurl.com',
                'slug' => '5th_Project',
                'description' => 'My Fifth Project My Fifth Project My Fifth Project My Fifth Project My Fifth Project',
                'featured_image' => 'uploads/images/projects/featured-image/05.png',
                'gallery_images' => 'uploads/images/projects/gallery-images/13.png,uploads/images/projects/gallery-images/14.png,uploads/images/projects/gallery-images/15.png'
            ]
        ];
        foreach($projects as $project){
            Project::Create($project);
        }
    }
}
