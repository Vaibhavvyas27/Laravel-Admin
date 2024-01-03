<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RoleCon extends Controller
{
    public function index(){

        $roles = Role::get();
        $permissions = Permission::all();
        return view('admin.roles.index',compact('roles','permissions'));
    }

    public function store(Request $request){
        // dd($request->name);
        $validator  = $request->validate([

            'name' =>'required|string|min:3',
        ]);
        Role::create($validator);
        $role = Role::findByName( $request->name);
        $role->givePermissionTo($request->permissions);
        return to_route("superadmin.roles.index");
    }

    public function edit(Role $role){
        $permissions = Permission::all();
        return view('Admin.roles.edit',compact('role','permissions'));
    }

    public function update(Request $request, Role $role){
        $validator  = $request->validate([

            'name' =>'required|string|min:3',
        ]);
        $role->update($validator);
        return to_route("superadmin.roles.index")->with('message','Role Is Updated SucessFully');
    }

    public function destroy(Role $role){
        $role->delete();
        return to_route("superadmin.roles.index")->with('message','Role Deleted Sucessfully');

    }

    public function add_permission(Request $request, Role $role){
        // dd($role);
        $role->syncPermissions($request->permissions);
        return back()->with('message','Saved Sucessfully');
    }

    public function restrok_permission(Role $role ,String $p_name){
        if($role->hasPermissionTo($p_name)){
            $role->revokePermissionTo($p_name);
            return back()->with('message','Permission revoke Succesfully');
        }
    }
    
}