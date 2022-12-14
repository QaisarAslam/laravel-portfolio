<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Framework extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
    	'name', 'slug', 'visibility'
    ];

    public function project()
    {
    	return $this->hasOne(Project::class);
    }
}
