<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'description', 'posted', 'category_id', 'image'];
    protected $table = 'posts';

    // Relacion con categorias
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    use HasFactory;
}
