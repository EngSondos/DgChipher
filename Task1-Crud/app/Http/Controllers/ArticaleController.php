<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticaleRequest;
use App\Http\Requests\UpdateArticaleRequest;
use App\Http\Services\Media;
use App\Models\Articale;
use App\Models\Category;
use Illuminate\Support\Facades\Artisan;

class ArticaleController extends Controller
{
    public function index()
    {
        $articales = Articale::all();
        return view ("Articales/index",compact('articales'));
    }


    public function create()
    {
        $categories = Category::all();
        return view("Articales/create",compact('categories'));
    }


    public function store(StoreArticaleRequest $request)
    {
        $data=$request->except('_token','image');
        if($request->hasFile('image')){
           $newimage= Media::upload(public_path('images/articales'),$request->file('image'));
            $data['image']= $newimage;
        }
        // dd($data);
        $status=Articale::create($data);
        return $this->redirectBack($status->exists,'articale.index');
    }


    public function edit($id)
    {
        $articale = Articale::find($id);
        $categories = Category::all();
        return view("Articales/update",compact('articale','categories'));
    }


    public function update(UpdateArticaleRequest $request,int $id)
    {
        $data = $request->except('_token','_method','image');
        if($request->hasFile('image')){
            $dir=public_path('images/articales');
           $newimage= Media::upload($dir,$request->file('image'));
           $articale = Articale::find($id);
            Media::delete($dir."//$articale->image");
            $data['image']=$newimage;
        }
        return $this->redirectBack(Articale::where('id',$id)->update($data),'articale.index');
    }

    public function destroy(int $id)
    {
        #delete image from server
        $articale = Articale::find($id);
        if(!$articale)
            return abort(404);
        Media::delete(public_path("images/articales/$articale->image"));
        $articale->delete();
        return redirect()->back()->with('success','Articale Deleted Successfully');

    }
}
