<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\product;
use App\Models\Products;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products');
    }
    public function addProducts()
    {
        return view('admin.addProducts');
    }
    public function catagory()
    {   
        $category = Category::paginate(10);
        return view('admin.category',compact('category'));
    }
    public function sub_catagory()
    {
        $Subcategory = SubCategory::paginate(5);
        return view('admin.sub_category',compact('Subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function catagory_create(Request $request ,Category $category)
    {
        $request->validate([
            'name'=>'required|unique:category,name'
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return redirect(route('admin_category'))->with('message','Added Successfully');
    }
    public function sub_catagory_create(Request $request ,SubCategory $subCategory)
    {
        $request->validate([
            'name'=>'required|unique:category,name'
        ]);
        $subCategory = new SubCategory;
        $subCategory->name = $request->name;
        $subCategory->save();
        return redirect(route('admin_subCategory'))->with('message','Added Successfully');
    }
    public function catagory_delete(int $id)
    {
    //    @dd($id);
        //  Category::delete($id);
        DB::table('category')->delete('$id');
        return redirect(route('admin_category'))->with('message','Deleted Successfully');
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'=>'required',
            'description'=>'required',
            'price'=>'required|integer',
            'quantity'=>'required|integer'
        ]);
        $product = new Products;
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->visible = $request->visible;
        $product->save();
        return response()->json(["status"=>true,"message"=>"Data added succesfully"]) ;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Products::Active()->get();
        // dd($product->toArray());
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
