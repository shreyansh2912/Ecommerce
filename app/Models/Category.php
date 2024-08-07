<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $primarykey = 'id';
    protected $table = 'category';
    protected $fillable = [
        'name',
    ];

    // public function getCategory(){
    //     // return $this->hasMany(Category::class);
    //     return $this->hasMany('App\Models\Products','category');
    // }
}
