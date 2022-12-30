<?php
namespace App\Http\Services;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthService{
    public function GetUserByEmail($email){
        return Admin::where('email',$email)->first();
    }
    function CheckAuth($request) {
        $credintel=$request->only('email','password');
        $admin= $this->GetUserByEmail($credintel['email']);
       if(!$admin)
           return false;
       if(Hash::check($request->password,$admin->password))
           return $admin;
       return false;
    }
}
