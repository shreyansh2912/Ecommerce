<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $data = Category::all();
        return response()->json($data);
    }
    public function sub(){
        $data = SubCategory::all();
        return response()->json($data);
    }
}   
