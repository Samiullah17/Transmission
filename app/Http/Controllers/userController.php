<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\userAcount;
use App\Models\transmission;
class UserController extends Controller
{
    public function __construct()
    {
      $this->middleware('role_or_permission:Admin|Diplay User');
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

    public function acount($id){

         $uname=User::where('id',$id)->first()->name;
        // $userA=userAcount::where('user_id',1)->get();
        $userA=userAcount::join('orders','user_acounts.order_id','orders.id')
        ->select('orders.*','user_acounts.money as rate','user_acounts.id as accountID','user_acounts.user_id as uid')->where('user_acounts.user_id',$id)->get();

        $total=userAcount::where('user_id',$id)->selectRaw('sum(money) as totalRate')->get();
        $t=$total[0]->totalRate;
        // $transmission=transmission::where('order_id',1)->selectRaw('sum(rate) as total_order_amount')->get();
        return view('user.Acount',compact('userA','t','uname','id'));



    }
    public function destroyacount($accountID,$uid){
         $userAccount = userAcount::find($accountID);
         $userAccount->delete();
         $total=userAcount::where('user_id',$uid)->selectRaw('sum(money) as totalRate')->get();
        $t=$total[0]->totalRate;
         return response()->json(['success'=>$t,'message'=>'successfully deleted']);
    }
}
