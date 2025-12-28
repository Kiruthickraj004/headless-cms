<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = [
    'content_type_id',
    'name',
    'type',
    'required',
];

public function contentType()
{
    return $this->belongsTo(ContentType::class);
}

}
