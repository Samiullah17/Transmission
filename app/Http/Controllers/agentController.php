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
        $agent->company_id =$request->ag_company_id;
        $agent->odistrict_id=$request->odistrict_id;
        $agent->ovillage=$request->ovillage;
        $agent->cdistrict_id=$request->cdistrict_id;
        $agent->cvillage=$request->cvillage;
        $agent->Save();

        return response()->json([
            'message'=>'Agent Saved Successfuly ',
        ]);

    }

    // public function details($id){
    //     $agent= companyAgent::join('districts','company_agents.odistrict_id','districts.id')
    //     ->join('companies','company_agents.company_id','companies.id')
    //     ->select('company_agents.*','companies.companyName as cname','districts.districtName as dname')->where('company_agents.id',$id)->first();
    //     return view('agent.details',compact('agent'));

    // }


    public function cagent($id){

        $agent=companyAgent::find($id);
          return response()->json(['agent'=>$agent]);
    }



    public function cdetails($id){

        $cagent=companyAgent::join('companies','company_agents.company_id','companies.id')
        ->join('districts as cdistricts','company_agents.cdistrict_id','cdistricts.id')
        ->join('districts as odistricts','company_agents.odistrict_id','odistricts.id')
        ->select('company_agents.*','companies.companyName as cname','cdistricts.districtName as cdname',
        'odistricts.districtName as odname')->where('company_agents.id',$id)->first();

         $agents=companyAgent::join('companies','company_agents.company_id','companies.id')
        ->join('districts as cdistricts','company_agents.cdistrict_id','cdistricts.id')
        ->join('districts as odistricts','company_agents.odistrict_id','odistricts.id')
        ->join('orders','company_agents.id','orders.company_agent_id')
        ->join('transmissions','orders.id','transmissions.order_id')
        ->join('transmission_types','transmissions.transmission_type_id','transmission_types.id')
        ->join('transmission_models','transmissions.transmission_model_id','transmission_models.id')
        ->join('provences','transmissions.provence_id','provences.id')
        ->select('company_agents.agentName as aname','company_agents.fName as fname','company_agents.gFName as gname',
        'company_agents.phone as p','company_agents.email as e','company_agents.NIC as nic','company_agents.cvillage as cv',
        'company_agents.ovillage as ov','companies.companyName as cname','cdistricts.districtName as cdname',
        'odistricts.districtName as odname','transmissions.serialNo as sno','transmission_types.transmissionTypeName as ttname',
        'transmission_models.transmissionModelName as tmname','provences.provenceName as tpname')
        ->where('company_agents.id',$id)->get();

        return view('agent.details',compact('agents','cagent'));


    }
}
