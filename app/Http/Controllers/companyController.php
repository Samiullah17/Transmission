<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCompanyRequest;
use App\Models\citizenship;
use App\Models\Company;
use App\Models\companyActiveType;
use App\Models\companyAgent;
use App\Models\companyType;
use App\Models\country;
use App\Models\district;
use App\Models\order;
use App\Models\provence;
use App\Models\transmission;
use App\Models\transmissionModel;
use App\Models\transmissionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class companyController extends Controller
{
    public function index(){
        $companyType=companyType::all();
        $companyActiveType=companyActiveType::all();
        $citizenships=citizenship::all();
        $provence=provence::all();
        $district=district::all();
        $companies=company::join('company_active_types','companies.company_active_type_id','company_active_types.id')
        ->leftjoin('company_types','companies.company_type_id','company_types.id')
        ->leftjoin('citizenships','companies.citizenship_id','citizenships.id')
        ->select('company_active_types.companyName as aname','company_types.companyTypeName as tname',
        'citizenships.citizenshipName as cname','companies.companyName as name','companies.companyManagerName as mname','companies.id as comp_id')->get();



        return view('company.list',compact('companies','companyType','companyActiveType','citizenships','provence','district'));

    }

    public function addCompany(){
        $transmissionModel=transmissionModel::all();
        $transmissionType=transmissionType::all();
        $provence=provence::all();
        $district=district::all();
        $companyType=companyType::all();
        $companyActiveType=companyActiveType::all();
        $citizenships=citizenship::all();
        $countires=country::all();
        return view('company.add',compact('countires','companyType','companyActiveType','citizenships','provence','district','transmissionModel','transmissionType'));
    }


    public function saveCompnay(SaveCompanyRequest $request){

        $company=new Company();
        $company->companyName=$request->companyName;
        $company->companyId = $request->compnayID;
        $company->licenceNo = $request->licenseNumber;
        $company->company_type_id = $request->company_type_id;
        $company->company_active_type_id = $request->company_active_type_id;
        $company->companyManagerName = $request->companyManagerName;
        $company->citizenship_id = $request->citizenship_id;
        $company->save();


        $agent=new companyAgent();
        $agent->agentName=$request->agentName;
        $agent->fName=$request->fName;
        $agent->gFName=$request->gFName;
        $agent->NIC=$request->NIC;
        $agent->phone=$request->phone;
        $agent->email=$request->email;
        $agent->company_id =$company->id;
        $agent->odistrict_id=$request->odistrict_id;
        $agent->ovillage=$request->ovillage;
        $agent->cdistrict_id=$request->cdistrict_id;
        $agent->cvillage=$request->cvillage;
        $agent->Save();



        for($x=0; $x<count($request->frqNo); $x++){

         $order=new order();
        $order->company_id=$company->id;
        $order->company_agent_id =$agent->id;
        $order->frqNo=$request->frqNo[$x];
        $order->freQuantity=$request->freQuantity;
        $order->save();

        }





        for($i=0;$i<count($request->transmission_type_id);$i++){
            $transmission=new transmission();
            $transmission->transmission_type_id  =$request->transmission_type_id[$i];
            $transmission->transmission_model_id =$request->transmission_model_id[$i];
            $transmission->provence_id= $request->provence_id[$i];
            $transmission->serialNo=$request->serialNo[$i];
            $transmission->order_id = $order->id;
            $transmission->save();
         }






        // return response()->json([
        //     'message' => 'company Added Successfuly ',
        // ]);
        return response()->json(['data'=>$request->all()]);


    }



    public function details($id){
        $provence=provence::all();
        $district=district::all();
        // DB::enableQueryLog();
         $company=Company::join('company_active_types','companies.company_active_type_id','company_active_types.id')
         ->join('company_types','companies.company_type_id','company_types.id')
         ->join('citizenships','companies.citizenship_id','citizenships.id')
         ->leftjoin('company_agents','companies.id','company_agents.company_id')
         ->select('companies.*','company_active_types.companyName as aname','company_types.companyTypeName as tname'
         ,'citizenships.citizenshipName as cname','company_agents.*')->where('companies.id',$id)->first();
        //  dd(DB::getQueryLog());
        $cagent=Company::join('company_agents','companies.id','company_agents.company_id')->where('companies.id',$id)->get();

         return view('company.details',compact('company','provence','district','cagent'));
    }


    public function addTransmittion(){
        $provence=provence::all();
        $district=district::all();
        $companies=Company::all();
        $agent=companyAgent::all();
        $transmissionModel=transmissionModel::all();
        $transmissionType=transmissionType::all();
        return view('transmittion.add',compact('provence','district','companies','agent','transmissionModel','transmissionType'));
    }

    public function companyAgent($id){
         $cagent=companyAgent::where('company_id',$id)->get();
         return response()->json(['agent'=>$cagent,]);
    }

    public function addTransmission(Request $request){
         $order=new order();
         $order->company_id=$request->tr_company_id;
         $order->company_agent_id =$request->company_agent_id;
         $order->frqNo=$request->frqNo;
         $order->traQuantity=$request->traQuantity;

         $order->save();


         for($i=0;$i<count($request->transmission_type_id);$i++){
            $transmission=new transmission();
            $transmission->transmission_type_id  =$request->transmission_type_id[$i];
            $transmission->transmission_model_id =$request->transmission_model_id[$i];
            $transmission->provence_id= $request->provence_id[$i];
            $transmission->serialNo=$request->serialNo[$i];
            $transmission->order_id = $order->id;
            $transmission->save();
         }

        //   foreach($request->transmission_type_id as $key=>$item){
        //     $transmission=new transmission();
        //     $transmission->transmission_type_id  =$request->transmission_type_id[$key];
        //     $transmission->transmission_model_id =$request->transmission_model_id[$key];
        //     $transmission->provence_id= $request->provence_id;
        //     $transmission->serialNo=$request->serialNo;
        //     $transmission->order_id = $order->id;
        //     $transmission->save();

        //   }

          return redirect()->back();


    }


    public function listTransmission(){

        $companies=Company::all();

        return view('transmittion.list',compact('companies'));

    }



    public function companyTransmission($id){



        $order=Company::join('orders','companies.id','orders.company_id')
        ->join('transmissions','orders.id','transmissions.order_id')
        ->join('transmission_types','transmissions.transmission_type_id','transmission_types.id')
        ->join('transmission_models','transmissions.transmission_model_id','transmission_models.id')
        ->join('provences','transmissions.provence_id','provences.id')
        ->select('transmission_types.transmissionTypeName as tname',
        'transmission_models.transmissionModelName as mname',
       'provences.provenceName as pname','transmissions.serialNo as sname')->where('companies.id',$id)->get();

        return response()->json(['order'=> $order]);
    }
}
