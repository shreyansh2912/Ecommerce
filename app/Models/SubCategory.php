<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = 'sub_category';
    protected $fillable = [
        'name',
    ];

    public function getCategory(){
        // return $this->hasMany(Category::class);
        return $this->hasMany('App\Models\Products','id');
    }
}
