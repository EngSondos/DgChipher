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
        return $this->redirectBack($status->exists,'category.index');
    }


    public function edit(int $id)
    {
        $category = Category::find($id);

        return view('categories.update',compact('category'));
    }


    public function update(UpdateCategoryRequest $request, int $id)
    {
        $category = Category::find($id);

        $data = $request->except('_token','_method');
        return $this->redirectBack($category->where('id',$category->id)->update($data),'category.index');
    }


    public function destroy(int $id)
    {
        $category = Category::find($id);
        if(!$category)
            abort(404);
        $category->delete();
        return redirect()->back()->with('success','Category Deleted Successfully');
    }
}
