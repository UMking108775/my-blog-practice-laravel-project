<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'slug', 'featured_image', 'description'])]
class Category extends Model
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
