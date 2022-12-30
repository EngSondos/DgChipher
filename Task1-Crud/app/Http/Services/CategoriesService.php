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
            return false;
        return $category;
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
        $category=$this->getCategory($id);
       return $category->delete();
    }
}
