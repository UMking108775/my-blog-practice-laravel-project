<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'category_id',
        'featured_image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
