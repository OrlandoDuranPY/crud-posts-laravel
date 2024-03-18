<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{

    // Relacion  de uno a muchos inversa Posts
    public function posts(){
        return $this->hasMany(Post::class, 'category_id');
    }

    use HasFactory;
}
