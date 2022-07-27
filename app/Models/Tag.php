<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
	use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'slug', 'visibility'];

    public function projects()
    {
    	return $this->belongsToMany(Project::class);
    }
}
