<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommended extends Model
{
    use HasFactory;

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'recommended_tags', 'recommended_id', 'tag_id');
    }
}
