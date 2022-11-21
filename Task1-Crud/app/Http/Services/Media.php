<?php
namespace App\Http\Services;
class Media {
    public static function upload($dir,$image){
        $imagename= $image->hashName();
        $image->move($dir,$imagename);
        return $imagename;
    }
    public static function delete($dir){
        if(file_exists($dir)){
            unlink($dir);
            return true;
        }
        return false;
    }
}
?>
