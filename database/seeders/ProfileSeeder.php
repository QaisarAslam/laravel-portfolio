<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profiles =
        [
            [
                'user_id' => 1,
                'first_name' => 'Bilal Khalid',
                'last_name' => 'Mughal',
                'gender' => 'male',
                'dob' => '06-05-1992',
                'country' => 'Pakistan',
                'state' => 'Punjab',
                'city' => 'Faisalabad',
                'zipcode' => '38000',
                'address' => 'Chak 41 JB Santiana',
                'email_primary' => 'mirzabilal1992@gmail.com',
                'mobile_primary' => '+92-301-4027841',
                'mobile_whatsapp' => '+92-301-4027841',
                'facebook' => 'https://facebook.com/mirzabilal1992',
                'twitter' => 'https://twitter.com/mirzabilal1992',
                'linkedin' => 'https://linkedin.com/mirzabilal1992',
                'website' => 'https://www.bilalkhalidmughal.com',
                'about' => 'Nothing interested about me yet',
                'doc' => 'uploads/docs/users/resume.pdf',
                'avatar' => 'uploads/images/users/avatars/bilalkhalidmughal.jpg',
            ]
        ];

        foreach ($profiles as $profile)
        {
            Profile::create($profile);
        }
    }
}
