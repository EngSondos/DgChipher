<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermessionRequest;
use App\Http\Requests\UpdatePermessionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

// class PermessionController extends Controller
// {
//     public function index()
//     {
//         $permissions = Permission::all();
//         return view ("Permissions/index",compact('permissions'));
//     }


//     public function create()
//     {
//         return view("Permission/create");
//     }


//     public function store(StorePermessionRequest $request)
//     {
//         $data=$request->except('_token');
//         $status=Permission::create($data);
//         return $this->redirectBack($status->exists,'.index');
//     }


//     public function edit(Permission $permission)
//     {
//         return view("product/update",compact('permission'));
//     }


//     public function update(UpdatePermessionRequest $request, Permission $permission)
//     {
//         $data = $request->except('_token','_method');
//         return $this->redirectBack($permission->where('id',$permission->id)->update($data),'.index');
//     }

//     public function destroy(Permission $permission)
//     {

//         $permission->delete();
//         return redirect()->back()->with('success','permession Deleted Successfully');

    // }
// }
