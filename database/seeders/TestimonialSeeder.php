<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testimonials = [
            [
                'name' => 'John Doe',
                'location' => 'United Kingdom',
                'detail' => 'In at accumsan risus. Nam id volutpat ante. Etiam vel mi mattis, vulputate nunc nec, sodales nibh. Etiam nulla magna, gravida eget ultricies sit amet.',
                'image' => 'uploads/images/testimonials/testimonial_31-190x190.jpg',
                'visibility' => 'public',
            ],
            [
                'name' => 'Jane Doe',
                'location' => 'Miami',
                'detail' => 'In at accumsan risus. Nam id volutpat ante. Etiam vel mi mattis, vulputate nunc nec, sodales nibh. Etiam nulla magna, gravida eget ultricies sit amet.',
                'image' => 'uploads/images/testimonials/testimonial_11-190x190.jpg',
                'visibility' => 'public',
            ],
            [
                'name' => 'Albert Doe',
                'location' => 'United States',
                'detail' => 'In at accumsan risus. Nam id volutpat ante. Etiam vel mi mattis, vulputate nunc nec, sodales nibh. Etiam nulla magna, gravida eget ultricies sit amet.',
                'image' => 'uploads/images/testimonials/testimonial_22-190x190.jpg',
                'visibility' => 'public',
            ],
        ];

        foreach ($testimonials as $testimonial)
        {
            Testimonial::create($testimonial);
        }
    }
}
