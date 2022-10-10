<?php

namespace App\Http\Controllers;

use App\Models\companyAgent;
use Illuminate\Http\Request;

class agentController extends Controller
{
    public function index(){

    }


    public function saveAgent(Request $request){
         
        $agent=new companyAgent();
        $agent->agentName=$request->agentName;
        $agent->fName=$request->fName;
        $agent->gFName=$request->gFName;
        $agent->NIC=$request->NIC;
        $agent->phone=$request->phone;
        $agent->email=$request->email;
        $agent->company_id =$request->company_id;
        $agent->odistrict_id=$request->odistrict_id;
        $agent->ovillage=$request->ovillage;
        $agent->cdistrict_id=$request->cdistrict_id;
        $agent->cvillage=$request->cvillage;
        $agent->Save();

        return response()->json([
            'message'=>'Agent Saved Successfuly ',
        ]);

    }
}
