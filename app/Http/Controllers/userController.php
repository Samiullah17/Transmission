<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:Admin|Display User');
    }
    public function index()
    {
        $users=User::get();
        $roles=Role::get();
        $permissions=Permission::get();
        return view('users.index',compact('users','permissions','roles'));
    }

    public function edit($id)
    {
         $users=User::find($id);
         return view('users.edit',compact('users'));
    }
    public function destroy($id)
    {
        
        $user=User::find($id);
        if($user->status==0)
        {
        $user->status=1;
        $user->update();
        }
        else{
            $user->status=0;
            $user->update();
        }
        return response()->json(['success'=>route('list.user')]);
    }
}
