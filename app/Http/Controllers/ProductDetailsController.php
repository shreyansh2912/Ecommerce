<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    

    function fetch(Request $request,$id){
        $data = Products::with('getCategory')->with('getSubCategory')->where('id',$id)->get();
        return view('productDetails',compact('data'));
    }
}
