<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public $primarykey = 'id';

    public function scopeActive($query){
        return $query->wherevisible(1);
    }
    protected $fillable = [
        'product_name',
        'price',
        'description',
        'quantity',
        'category',
        'image',
        'sub_category',
        'visible'
    ];

    public function getCategory(){
        // return $this->hasMany(Category::class);
        return $this->hasMany('App\Models\Category','id','category');
    }

    public function getSubCategory(){
        return $this->hasMany('App\Models\SubCategory','id','sub_category');
    }

}
