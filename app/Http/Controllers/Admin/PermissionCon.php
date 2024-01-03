<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class PermissionCon extends Controller
{
    public function index(){
        $permissions = Permission::all();
        return view('admin.permissions.index',compact('permissions'));
    }
    public function store(Request $request){
        $validator  = $request->validate([

            'name' =>'required|string|min:3',
        ]);
        Permission::create($validator);
        $premissions = Permission::select('name')->get();
        $role = Role::where('name','SuperAdmin')->get();
        // dd($request->name);
        $role[0]->givePermissionTo($request->name);
        return to_route("superadmin.permissions.index");
    }
    public function edit(Permission $permission){
        return view('Admin.permissions.edit',compact('permission'));
    }

    public function update(Request $request, Permission $permission){
        $validator  = $request->validate([

            'name' =>'required|string|min:3',
        ]);
        $permission->update($validator);
        return to_route("superadmin.permissions.index")->with('message','Role Is Updated SucessFully');
    }
    public function destroy(Permission $permission){
        $permission->delete();
        return to_route("superadmin.permissions.index")->with('message','Permission Deleted Sucessfully');

    }
    
}
