<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductnRequest;
use App\Http\Requests\UpdateProductnRequest;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view ("Product/index",compact('products'));
    }


    public function create()
    {
        return view("Product/create");
    }


    public function store(StoreProductnRequest $request)
    {
        $data=$request->except('_token');
        $status=Product::create($data);
        return $this->redirectBack($status->exists,'product.index');
    }


    public function edit(int $id)
    {
        $product = Product::find($id);

        return view("product/update",compact('product'));
    }


    public function update(UpdateProductnRequest $request, int $id)
    {
        $data = $request->except('_token','_method');
        return $this->redirectBack(Product::where('id',$id)->update($data),'product.index');
    }

    public function destroy(int $id)
    {
        $product = Product::find($id);
        if(!$product)
            abort(404);
        $product->delete();
        return redirect()->back()->with('success','product Deleted Successfully');

    }
}
