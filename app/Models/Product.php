<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'price',
        'sale',
        'description',
        'detail',
        'status',
        'category_id',
    ];
    public function scopeAllProducts ($query, $limit){
        return $query->orderBy('id','desc')->limit($limit)->with(['category']);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
