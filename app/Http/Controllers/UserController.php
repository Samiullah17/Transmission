<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $users=User::get();
        $permissions=Permission::get();
        return view('users.index',compact('users','permissions'));
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
