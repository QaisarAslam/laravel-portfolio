<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'slug', 'visibility'];

    public function getCreatedAtAttribute($value)
    {
        return date('d-M-Y', strtotime($value));
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('d-M-Y', strtotime($value));
    }
    
    public function project()
    {
    	return $this->hasOne(Project::class);
    }
}
