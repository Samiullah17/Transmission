<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class permissionController extends Controller
{
   public function index(){
    return view('Permissions.index');
   }
}
