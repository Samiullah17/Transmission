<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\companyAgent;
use App\Models\order;
use App\Models\orderDetails;
use App\Models\transmission;
use Illuminate\Http\Request;
use App\Models\transmissionModel;
use App\Models\transmissionType;
use App\Models\provence;
use Illuminate\Support\Facades\DB;

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
        $agent->odistrict_id=$request->odistrict_id;
        $agent->ovillage=$request->ovillage;
        $agent->cdistrict_id=$request->cdistrict_id;
        $agent->cvillage=$request->cvillage;
        $agent->photo=$request->photo;
        $agent->Save();

        $order=new order();
        $order->company_id = $request->company_id;
        $order->company_agent_id =$agent->id;
        $order->suggestion_file=$request->suggestion_file;
        $order->save();



        $provence=provence::all();
        $transmissionModel=transmissionModel::all();
        $transmissionType=transmissionType::all();
        return view('transmittion.add',compact('provence','transmissionModel','transmissionType','order'));

    }


    public function companyAgent($id){

        $agent=Company::join('orders','companies.id','orders.company_id')
        ->join('company_agents','orders.company_agent_id','company_agents.id')->where('companies.id',$id)
        ->select('company_agents.*')->groupBy('orders.company_agent_id')->get();
        return response()->json(['agent'=>$agent]);



    }

    // public function details($id){
    //     $agent= companyAgent::join('districts','company_agents.odistrict_id','districts.id')
    //     ->join('companies','company_agents.company_id','companies.id')
    //     ->select('company_agents.*','companies.companyName as cname','districts.districtName as dname')->where('company_agents.id',$id)->first();
    //     return view('agent.details',compact('agent'));

    // }


    public function cagent($id){

        $agent=companyAgent::find($id);
        $order=order::where('company_agent_id',$id)->first()->company_id;
        return response()->json(['agent'=>$agent,'route'=>route('add.transmittion.id'),'agent_id'=>$agent->id,'company_id'=>$order]);

        // return response()->json(['agent'=>$agent, 'route'=>route('add.transmittion.id', ['id'=>$agent->id,'oId'=>$order])]);
    }



    public function cdetails(Request $request){

        $agent=companyAgent::join('districts as odistricts','company_agents.odistrict_id','odistricts.id')
        ->join('orders','company_agents.id','orders.company_agent_id')
        ->join('companies','orders.company_id','companies.id')
        ->join('districts as cdistricts','company_agents.cdistrict_id','cdistricts.id')
        ->select('companies.*','company_agents.*','odistricts.districtName as oname','cdistricts.districtName as cname')
        ->where('company_agents.id',$request->id)->first();
        // return $agent;


        $orders = order::join('companies','companies.id','orders.company_id')
        ->join('order_details','order_details.order_id','orders.id')
        ->join('company_agents','orders.company_agent_id','company_agents.id')
        ->selectRaw('company_agents.agentName aname, orders.status status, companies.companyName company,orders.id `order`, orders.created_at created_at, SUM(order_details.transmissionQuantity) total_transmissions')
        ->where('orders.company_id',$request->cid)->where('company_agents.id',$request->id)
        ->groupByRaw('1,2,3,4')
        ->get();




        $transmissions=companyAgent::Join('orders','company_agents.id','orders.company_agent_id')
        ->join('order_details','order_details.order_id','orders.id')
        ->join('transmission_types','transmission_types.id','order_details.transmission_type_id')
        ->select('order_details.transmissionQuantity as tquantity','transmission_types.*')->where('company_agents.id',$request->id)->get();



        $cagent=companyAgent::Join('orders','company_agents.id','orders.company_agent_id')
        ->join('transmissions','orders.id','transmissions.order_id')
        ->join('transmission_types','transmissions.transmission_type_id','transmission_types.id')
        ->join('transmission_models','transmissions.transmission_model_id','transmission_models.id')
        ->join('provences','transmissions.provence_id','provences.id')
        ->select('transmissions.*','transmission_models.transmissionModelName as mname',
        'transmission_types.transmissionTypeName as tname',
         'provences.provenceName as provence')->where('company_agents.id',$request->id)->get();

         $company=Company::find($request->cid);





        return view('agent.details',compact('agent','cagent','transmissions','company','orders'));


    }

   public function traDetails(Request $request){

      $order=order::where('orders.company_agent_id',$request->agetnId)->first();
      $transmissions=transmission::join('transmission_models','transmissions.transmission_model_id','transmission_models.id')
      ->join('provences','transmissions.provence_id','provences.id')
      ->select('transmissions.*','transmission_models.transmissionModelName as mname','provences.provenceName as pname')
      ->where('transmissions.order_id',$order->id)->where('transmissions.transmission_type_id',$request->ttypeId)->get();
      return response()->json(['data'=>$transmissions]);

    }
}
