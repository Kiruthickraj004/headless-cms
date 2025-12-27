<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
     protected $fillable = [
        'name',
        'slug',
        'api_key',
        'user_id',
    ];
    protected static function booted()
{
    static::creating(function ($project) {
        $project->api_key = Str::random(40);
        
    });
}

}


