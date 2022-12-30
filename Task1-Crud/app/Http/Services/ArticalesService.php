<?php
namespace App\Http\Services;


use App\Http\Media\Media;
use App\Models\Articale;

class ArticalesService {
    const images_dir ='image/articales';
    public function getArticales(){
        return Articale::all();
    }
    public function getArticale($id){
        $articale = Articale::find($id);
        return $articale;
    }
    public function updateArticale($id,$request){
        $articale= $this->getArticale($id);
        $data=$request->except('_token');
        if ($request->hasFile('image')) {
            $newimage = Media::upload(public_path(self::images_dir), $request->file('image'));
            Media::delete($this->images_dir . "//$articale->image");
            $data['image'] = $newimage;
        }
        return Articale::where('id',$id)->update($data);
    }
    public function storeArticale($request){
        $data=$request->except('_token','image');
        if($request->hasFile('image')){
            $newimage= Media::upload(public_path(self::images_dir),$request->file('image'));
            $data['image']= $newimage;
        }
        $articale = Articale::create($data);
        return $articale->exists;
    }
    public function deleteArticale($id){
        $articale=$this->getArticale($id);
       return $articale->delete();

    }
}
