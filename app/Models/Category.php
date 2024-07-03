<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
    ];
    public function scopeAllCategories ($query,$limit){
        return $query->orderBy('id','desc')->limit($limit);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
