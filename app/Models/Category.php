<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
    'name',
    'slug',
    'description',
    'status',
    'popular',
    'image',
    'meta-title',
    'meta-descrip',
    'meta-keywords',
    ];
    public function article()
    {
        return $this->hasMany(Product::class,'id','cate_id');
    }
}
