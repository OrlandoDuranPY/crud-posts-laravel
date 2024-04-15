<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0; $i < 50; $i++){
            $category = Category::inRandomOrder()->first();
            DB::table('posts')->insert([
                'title' => 'Post '.$i,
                'slug' => 'post-'.$i,
                'content' => Str::random(100),
                'description' => Str::random(50),
                'posted' => 'yes',
                'category_id' => $category->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
