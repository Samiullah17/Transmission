<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function index(){

    }

    public function show($id){

        $user=User::find($id);
        return view('user.profile',compact('user'));

    }
}
