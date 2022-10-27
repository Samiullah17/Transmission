<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCompanyRequest;
use App\Models\citizenship;
use App\Models\Company;
use App\Models\companyActiveType;
use App\Models\companyAgent;
use App\Models\companyLicense;
use App\Models\companyType;
use App\Models\country;
use App\Models\district;
use App\Models\frequencey;
use App\Models\licenceType;
use App\Models\licenseType;
use App\Models\order;
use App\Models\orderDetails;
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
        $countires=country::all();
        $licenseType=licenseType::all();

        $companies=Company::join('company_active_types','companies.company_active_type_id','company_active_types.id')
        ->join('company_types','companies.company_type_id','company_types.id')
        ->select('company_active_types.companyName as aname','company_types.companyTypeName as tname',
        'companies.*')->get();




        // $companies=company::join('company_active_types','companies.company_active_type_id','company_active_types.id')
        // ->leftjoin('company_types','companies.company_type_id','company_types.id')
        // ->leftjoin('citizenships','companies.citizenship_id','citizenships.id')
        // ->select('company_active_types.companyName as aname','company_types.companyTypeName as tname',
        // 'citizenships.citizenshipName as cname','companies.companyName as name','companies.companyManagerName as mname','companies.id as comp_id')->get();



        return view('company.list',compact('licenseType','countires','companyType','companyActiveType','citizenships','provence','district','companies'));

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


        return view('company.add',compact('licenseType','countires','companyType','companyActiveType','citizenships','provence','district','transmissionModel','transmissionType'));
    }


    public function saveCompnay(Request $request){





        $company=new Company();
        $company->companyName=$request->companyName;
        $company->companyId = $request->compnayID;
        $company->company_type_id = $request->company_type_id;
        $company->company_active_type_id = $request->company_active_type_id;
        $company->companyManagerName = $request->companyManagerName;
        if($request->citizenship_id==1 || $request->citizenship_id==3){
            $company->country_id =1;
        }
        else{
            $company->country_id=$request->country;
        }
        $company->companyAddress=$request->companyAddress;
        $company->latitude=$request->letitude;
        $company->longtitude=$request->longtutude;
        $company->save();


        for($x=0; $x<count($request->licenseTypeId); $x++){
            $companylicense=new companyLicense();
            $companylicense->company_id =$company->id;
            $companylicense->license_type_id =$request->licenseTypeId[$x];
            $companylicense->licenseNumber = $request->licenseNumber[$x];
            $companylicense->files = $request->licenseFile[$x];
            $companylicense->issueDate = $request->issueDate[$x];
            $companylicense->save();

        }

        return redirect()->back();




        // $agent=new companyAgent();
        // $agent->agentName=$request->agentName;
        // $agent->fName=$request->fName;
        // $agent->gFName=$request->gFName;
        // $agent->NIC=$request->NIC;
        // $agent->phone=$request->phone;
        // $agent->email=$request->email;
        // $agent->company_id =$company->id;
        // $agent->odistrict_id=$request->odistrict_id;
        // $agent->ovillage=$request->ovillage;
        // $agent->cdistrict_id=$request->cdistrict_id;
        // $agent->cvillage=$request->cvillage;
        // $agent->Save();



        // for($x=0; $x<count($request->frqNo); $x++){

        //  $order=new order();
        // $order->company_id=$company->id;
        // $order->company_agent_id =$agent->id;
        // $order->frqNo=$request->frqNo[$x];
        // $order->freQuantity=$request->freQuantity;
        // $order->save();

        // }





        // for($i=0;$i<count($request->transmission_type_id);$i++){
        //     $transmission=new transmission();
        //     $transmission->transmission_type_id  =$request->transmission_type_id[$i];
        //     $transmission->transmission_model_id =$request->transmission_model_id[$i];
        //     $transmission->provence_id= $request->provence_id[$i];
        //     $transmission->serialNo=$request->serialNo[$i];
        //     $transmission->order_id = $order->id;
        //     $transmission->save();
        //  }






        // return response()->json([
        //     'message' => 'company Added Successfuly ',
        // ]);
        // return response()->json(['data'=>$request->all()]);


    }



    public function details($id){
        $provence=provence::all();
        $district=district::all();
        // DB::enableQueryLog();
        $company=Company::join('company_active_types','companies.company_active_type_id','company_active_types.id')
        ->leftjoin('company_types','companies.company_type_id','company_types.id')
        ->leftjoin('company_licenses','companies.id','company_licenses.company_id')
        ->leftjoin('license_types','company_licenses.license_type_id','license_types.id')
        ->select('company_active_types.companyName as aname','company_types.companyTypeName as tname',
        'companies.*','company_licenses.licenseNumber as lNumber','company_licenses.issueDate as adate',
        'company_licenses.files as sfile','license_types.licenseTypeName as ltname')->where('companies.id',$id)->first();

        $companylicense=Company::Join('company_licenses','companies.id','company_licenses.company_id')
        ->join('license_types','company_licenses.license_type_id','license_types.id')
        ->select('company_licenses.*','license_types.licenseTypeName as ltname')->where('companies.id',$company->id)->get();

        $cagent=Company::join('orders','companies.id','orders.company_id')
        ->rightjoin('company_agents','company_agents.id','orders.company_agent_id')
        ->select('company_agents.*')->where('companies.id',$id)->get();



        return view('company.details',compact('company','provence','district','companylicense','cagent'));
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

    public function addTransmission0($id){

        $agent=companyAgent::find($id);
        $provence=provence::all();
        $district=district::all();
        $companies=Company::all();
        $transmissionModel=transmissionModel::all();
        $transmissionType=transmissionType::all();
        return view('transmittion.add',compact('agent','provence','district','companies','transmissionModel','transmissionType'));

    }

    public function companyAgent($id){
         $cagent=companyAgent::where('company_id',$id)->get();
         return response()->json(['agent'=>$cagent,]);
    }

    public function addTransmission(Request $request){




      $order=order::join('company_agents','orders.company_agent_id','company_agents.id')->where('company_agents.id',$request->agent_id)->first();

         for($i=0;$i<count($request->transmission_type_id);$i++){
            $transmission=new transmission();
            $transmission->transmission_type_id  =$request->transmission_type_id[$i];
            $transmission->transmission_model_id =$request->transmission_model_id[$i];
            $transmission->serialNo=$request->serialNo[$i];
            $transmission->order_id = $order->id;
            $transmission->provence_id = $request->provence_id[$i];
            $transmission->save();
         }


         if($request->w){
            $orderDetails=new orderDetails();
            $orderDetails->order_id =$order->id;
            $orderDetails->transmission_type_id =1;
            $orderDetails->transmissionQuantity=$request->wakiTaki;
            $orderDetails->save();
         }

         if($request->b){

            $orderDetails=new orderDetails();
            $orderDetails->order_id =$order->id;
            $orderDetails->transmission_type_id =2;
            $orderDetails->transmissionQuantity=$request->baseStation;
            $orderDetails->save();

         }

         if($request->c){

            $orderDetails=new orderDetails();
            $orderDetails->order_id =$order->id;
            $orderDetails->transmission_type_id =3;
            $orderDetails->transmissionQuantity=$request->codeOn;
            $orderDetails->save();

         }

         if($request->r){

            $orderDetails=new orderDetails();
            $orderDetails->order_id =$order->id;
            $orderDetails->transmission_type_id =4;
            $orderDetails->transmissionQuantity=$request->repeter;
            $orderDetails->save();

         }


         for($i=0; $i<count($request->freqNumber); $i++){
              $frequencey=new frequencey();
              $frequencey->frequenceyNo = $request->freqNumber[$i];
              $frequencey->autraLicenceNo = $request->afile[$i];
              $frequencey->provence_id = $request->fprovence[$i];
              $frequencey->order_id = $order->id;
              $frequencey->save();
         }



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
