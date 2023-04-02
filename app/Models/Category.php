<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nestable\NestableTrait;

class Category extends Model
{
    use NestableTrait;

    protected $parent = 'parent_id';

    protected $fillable = ['parent_id', 'title'];

    public function parentCategory(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }
}
