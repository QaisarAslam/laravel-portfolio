<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
    	'category_id',
    	'framework_id',
    	'name',
    	'slug',
    	'url',
    	'description',
    	'featured_image',
    	'gallery_images',
    	'visibility'
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function framework()
    {
    	return $this->belongsTo(Framework::class);
    }

    public function tags()
    {
    	return $this->belongsToMany(Tag::class);
    }
}
