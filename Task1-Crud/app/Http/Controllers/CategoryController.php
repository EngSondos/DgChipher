<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return view ("categories.index",compact('categories'));

    }


    public function create()
    {
        return view('categories.create');
    }


    public function store(StoreCategoryRequest $request)
    {
        $data= $request->except('_token');
        $status= Category::create($data);
        return $this->redirectBack($status->exists);
    }


    public function edit(Category $category)
    {
        return view('categories.update',compact('category'));
    }


    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->except('_token','_method');
        return $this->redirectBack($category->where('id',$category->id)->update($data));
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('success','Category Deleted Successfully');
    }
}
