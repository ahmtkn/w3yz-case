<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
      'parent_id',
      'name',
      'deleted_at',
      'created_at',
      'updated_at',
    ];

    public function posts()
    {
        return $this->hasMany(\App\Models\Post::class);
    }


    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
