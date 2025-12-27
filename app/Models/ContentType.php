<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentType extends Model
{
    public function project()
{
    return $this->belongsTo(Project::class);
}

public function fields()
{
    return $this->hasMany(Field::class);
}

public function entries()
{
    return $this->hasMany(Entry::class);
}

}
