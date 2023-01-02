<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Response;
class permissionController extends Controller
{
   public function index(){
    return view('Permissions.index');
   }
   public function userPermissions($id)
   {
      
      $permissions=User::find($id)->getAllPermissions();
      return response()->json(['success'=>$permissions,'userID'=>$id]);
   }
   public function grantPermissions(Request $request)
   {
      $userID=$request->userID;
      $user=User::find($userID);
      $user->givePermissionTo($request->permission);
      return response()->json(['success' => 'صلاحیت موفقانه به یوزر داده شد'],  response::HTTP_OK);
   }
   public function revokePermission(Request $request,$id)
   {
      
      $userID=$request->userID;
      $permissions=User::find($userID)->revokePermissionTo($id);
   
      return response()->json(['success' => 'صلاحیت موفقانه حدف شد'], Response::HTTP_OK);
   }
}
