<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreAdminRequest;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function register()
    {
        $roles = Role::all();
        return view('register', compact('roles'));
    }
    public function registerRequest(StoreAdminRequest $request)
    {
        $data = $request->except('_token', 'password');
        $data['password'] = Hash::make($request->password);
        Session::push('loginId', $data['email']);
        $status = Admin::create($data);
        return redirect()->route('articale.index');
    }
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
            Session::put('loginId', $data['email']);
            Session::put('RoleId', $data['role_id']);
            // dd(Session::get('RoleId'));
            return redirect()->route('articale.index');
        }
        return redirect('login');
    }
    public function logout()
    {
        Session::forget('loginId', 'role');
        return redirect()->route('login');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
