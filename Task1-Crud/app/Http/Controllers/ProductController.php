<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductnRequest;
use App\Http\Requests\UpdateProductnRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view ("Proudct/index",compact('products'));
    }


    public function create()
    {
        return view("Product/create");
    }


    public function store(StoreProductnRequest $request)
    {
        $data=$request->except('_token');
        $status=Product::create($data);
        return $this->redirectBack($status->exists,'articale.index');
    }


    public function edit(Product $product)
    {
        return view("Articales/update",compact('permission'));
    }


    public function update(UpdateProductnRequest $request, Product $product)
    {
        $data = $request->except('_token','_method');
        return $this->redirectBack($product->where('id',$product->id)->update($data),'articale.index');
    }

    public function destroy(Product $product)
    {

        $product->delete();
        return redirect()->back()->with('success','Articale Deleted Successfully');

    }
}
