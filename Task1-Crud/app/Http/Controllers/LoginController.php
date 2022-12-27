<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function Login()
    {
        $roles = Role::all();
        return view('login', compact('roles'));
    }

    public function LoginRequest(LoginRequest $request)
    {
        $data = $request->except('_token');
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($data['password'], $admin->password)) {
            $role = Role::Where('id',$admin->role_id)->with(['permission'])->first();
            Session::put('loginId', $data['email']);
            Session::put('permissions', $role->permission);
            return redirect()->route('articale.index');
        }
        return redirect('login');
    }
}
