<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = [
        'category_id',
        'title',
        'text',
        'heroImage',
        'deleted_at',
        'created_at',
        'updated_at',
    ];


    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }
}
