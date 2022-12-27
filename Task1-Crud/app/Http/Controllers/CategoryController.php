<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Services\CategoriesService;
use App\Models\Category;

class CategoryController extends Controller
{
    private CategoriesService $CategoriesService;
    public function __construct(CategoriesService $CategoriesService)
    {
        $this->CategoriesService = $CategoriesService;
    }
    public function index()
    {
        $categories=$this->CategoriesService->getCategories();
        return view ("categories.index",compact('categories'));

    }


    public function create()
    {
        return view('categories.create');
    }


    public function store(StoreCategoryRequest $request)
    {
        $data= $request->except('_token');
        $status= $this->CategoriesService->StoreCategory($data);
        return $this->redirectBack($status->exists,'category.index');
    }


    public function edit(int $id)
    {
        $category = $this->CategoriesService->getCategory($id);
        return view('categories.update',compact('category'));
    }


    public function update(UpdateCategoryRequest $request, int $id)
    {
        $data = $request->except('_token','_method');
        $category=$this->CategoriesService->updatecategory($id,$data);
        return $this->redirectBack($category->where('id',$category->id)->update($data),'category.index');
    }


    public function destroy(int $id)
    {
        $this->CategoriesService->deleteCategory($id);
        return redirect()->back()->with('success','Category Deleted Successfully');
    }
}
