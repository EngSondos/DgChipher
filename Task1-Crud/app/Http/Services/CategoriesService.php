<?php
namespace App\Http\Services;
use App\Models\Category;

class CategoriesService{
    public function getCategories(){
        return Category::all();
    }
    public function getCategory($id){
        $category= Category::find($id);
        if(!$category)
            abort(404);
        return true;
    }
    public function updatecategory($id,$data){
        $category= $this->getCategory($id);
        $category->update($data);
        return $category;
    }
    public function StoreCategory($data){
        return Category::create($data);
    }
    public function deleteCategory($id){
        $category=$this->getCategories($id);
       return $category->delete();
    }
}
