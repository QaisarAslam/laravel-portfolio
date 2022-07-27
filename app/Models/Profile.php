<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'first_name', 'last_name', 'gender', 'dob', 'country', 'state', 'city', 'zipcode', 'address', 'email_primary', 'email_secondary', 'mobile_primary', 'mobile_secondary', 'phone', 'whatsapp', 'facebook_profile', 'twitter_profile', 'linkedin_profile', 'website', 'about', 'avatar', 'doc', 'visibility'];

    //local scope
    public function scopePartialSelect($query)
    {
        return $query->select('first_name', 'last_name', 'country', 'state', 'city', 'address', 'zipcode', 'email_primary','mobile_primary', 'mobile_whatsapp', 'facebook', 'twitter', 'linkedin');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
