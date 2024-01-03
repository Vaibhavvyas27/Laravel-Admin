<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Auth;

class UserCon extends Controller
{
    public function index(){
        $users = User::all()->except(Auth::id());
        $count = User::onlyTrashed()->count();
        return view('admin.users.index',compact('users','count'));
    }
    public function show(String $id){
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.users.show',compact('user','roles'));
    }

    public function add_role_user(Request $request,String $user_id){
        // dd($request->role);
        $user = User::find($user_id);
        if($request->role == 'default'){
            return back()->with('message-warning','Did not Select Any role');
        }
        if($request->role == 'delete'){
            $user->syncRoles([]);
            return back()->with('message','Roles is taken Sucessfully');
        }
        $user = User::find($user_id);
        $user->syncRoles($request->role);
        // $user->assignRole($request->role);
        return back()->with('message','Role is Assign Succesfully');
    }
    public function soft_delete(Request $request,String $user_id){
        
        $user = User::find($user_id);
        $user->delete();
        // dd($user);
        return back()->with('message','Removed Successfully');
    }

    public function trash_page(){
        // dd('Hello Worldsd');
        $users = User::onlyTrashed()->get();
        return view('admin.users.trash',compact('users'));
    }
    public function restore_user(Request $request,String $user_id){
        // dd($user_id);
        $user = User::withTrashed()->find($user_id);
        $user->restore();
        return back()->with('message','Restore Successfully');
    }
}

