<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = [
    'content_type_id',
    'data',
    'status',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function contentType()
    {
        return $this->belongsTo(ContentType::class);
    }
}
