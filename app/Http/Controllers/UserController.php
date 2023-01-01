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
}
