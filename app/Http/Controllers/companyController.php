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
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class companyController extends Controller
{
    public function index()
    {
        if (Session::has('companyCreated')) {
            Alert::success('', 'کمپنی په بریالیتوب سره ثبت شوه');
            Session::pull('companyCreated');
        }

        $companyType = companyType::all();
        $companyActiveType = companyActiveType::all();
        $citizenships = citizenship::all();
        $provence = provence::all();
        $district = district::all();
        $countires = country::all();
        $licenseType = licenseType::all();

        $companies = Company::join('company_active_types', 'companies.company_active_type_id', 'company_active_types.id')
            ->join('company_types', 'companies.company_type_id', 'company_types.id')
            ->select(
                'company_active_types.companyName as aname',
                'company_types.companyTypeName as tname',
                'companies.*'
            )->get();




        // $companies=company::join('company_active_types','companies.company_active_type_id','company_active_types.id')
        // ->leftjoin('company_types','companies.company_type_id','company_types.id')
        // ->leftjoin('citizenships','companies.citizenship_id','citizenships.id')
        // ->select('company_active_types.companyName as aname','company_types.companyTypeName as tname',
        // 'citizenships.citizenshipName as cname','companies.companyName as name','companies.companyManagerName as mname','companies.id as comp_id')->get();


        return view('company.list', compact('licenseType', 'countires', 'companyType', 'companyActiveType', 'citizenships', 'provence', 'district', 'companies'));
    }

    public function addCompany()
    {

        $transmissionModel = transmissionModel::all();
        $transmissionType = transmissionType::all();
        $provence = provence::all();
        $district = district::all();
        $companyType = companyType::all();
        $companyActiveType = companyActiveType::all();
        $citizenships = citizenship::all();
        $countires = country::all();
        $licenseType = licenseType::all();


        return view('company.add', compact('licenseType', 'countires', 'companyType', 'companyActiveType', 'citizenships', 'provence', 'district', 'transmissionModel', 'transmissionType'));
    }


    public function saveCompnay(Request $request)
    {

        $company = new Company();
        $company->companyName = $request->companyName;
        $company->company_type_id = $request->company_type_id;
        $company->company_active_type_id = $request->company_active_type_id;
        $company->companyManagerName = $request->companyManagerName;
        if ($request->citizenship_id == 1 || $request->citizenship_id == 3) {
            $company->country_id = 3;
        } else {
            $company->country_id = $request->country;
        }
        $company->companyAddress = $request->companyAddress;
        $company->latitude = $request->letitude;
        $company->longtitude = $request->longtutude;
        $company->save();


        for ($x = 0; $x < count($request->licenseTypeId); $x++) {
            $companylicense = new companyLicense();
            $companylicense->company_id = $company->id;
            $companylicense->license_type_id = $request->licenseTypeId[$x];
            $companylicense->licenseNumber = $request->licenseNumber[$x];
            $companylicense->files = $request->licenseFile[$x];
            $companylicense->issueDate = $request->issueDate[$x];
            $companylicense->save();
        }

        Session::put('companyCreated', true);





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

    public function saveCompany1(Request $request)
    {
        $company = new Company();
        $company->companyName = $request->companyName;
        $company->company_type_id = $request->company_type_id;
        $company->company_active_type_id = $request->company_active_type_id;
        $company->companyManagerName = $request->companyManagerName;
        if ($request->citizenship_id == 1 || $request->citizenship_id == 3) {
            $company->country_id = 3;
        } else {
            $company->country_id = $request->country;
        }
        $company->companyAddress = $request->companyAddress;
        $company->latitude = $request->letitude;
        $company->longtitude = $request->longtutude;
        $company->save();

        for ($x = 0; $x < count($request->licenseTypeId); $x++) {
            $companylicense = new companyLicense();
            $companylicense->company_id = $company->id;
            $companylicense->license_type_id = $request->licenseTypeId[$x];
            $companylicense->licenseNumber = $request->licenseNumber[$x];
            $companylicense->files = $request->licenseFile[$x];
            $companylicense->issueDate = $request->issueDate[$x];
            $companylicense->save();
        }

        $agent = new companyAgent();
        $agent->agentName = $request->agentName;
        $agent->fName = $request->fName;
        $agent->gFName = $request->gFName;
        $agent->NIC = $request->NIC;
        $agent->phone = $request->phone;
        $agent->email = $request->email;
        $agent->odistrict_id = $request->odistrict_id;
        $agent->ovillage = $request->ovillage;
        $agent->cdistrict_id = $request->cdistrict_id;
        $agent->cvillage = $request->cvillage;
        $agent->Save();

        $order = new order();
        $order->company_id = $company->id;
        $order->company_agent_id = $agent->id;
        $order->save();

        $provence = provence::all();
        $district = district::all();
        $transmissionModel = transmissionModel::all();
        $transmissionType = transmissionType::all();
        return view('transmittion.add', compact('company', 'agent', 'provence', 'district', 'transmissionModel', 'transmissionType'));
    }



    public function details($id)
    {
        $provence = provence::all();
        $district = district::all();
        // DB::enableQueryLog();
        $company = Company::join('company_active_types', 'companies.company_active_type_id', 'company_active_types.id')
            ->leftjoin('company_types', 'companies.company_type_id', 'company_types.id')
            ->leftjoin('company_licenses', 'companies.id', 'company_licenses.company_id')
            ->leftjoin('license_types', 'company_licenses.license_type_id', 'license_types.id')
            ->select(
                'company_active_types.companyName as aname',
                'company_types.companyTypeName as tname',
                'companies.*',
                'company_licenses.licenseNumber as lNumber',
                'company_licenses.issueDate as adate',
                'company_licenses.files as sfile',
                'license_types.licenseTypeName as ltname'
            )->where('companies.id', $id)->first();


            $licenseType=licenseType::all();

        $companylicense = Company::Join('company_licenses', 'companies.id', 'company_licenses.company_id')
            ->join('license_types', 'company_licenses.license_type_id', 'license_types.id')
            ->select('company_licenses.*', 'license_types.licenseTypeName as ltname')->where('companies.id', $company->id)->get();

        $cagent = Company::join('orders', 'companies.id', 'orders.company_id')
            ->rightjoin('company_agents', 'company_agents.id', 'orders.company_agent_id')
            ->select('company_agents.*')->where('companies.id', $id)->groupBy('orders.company_agent_id')->get();



        return view('company.details', compact('company', 'provence', 'district', 'companylicense', 'cagent','licenseType'));
    }


    public function addTransmittion()
    {
        $provence = provence::all();
        $district = district::all();
        $companies = Company::all();
        $agent = companyAgent::all();
        $transmissionModel = transmissionModel::all();
        $transmissionType = transmissionType::all();
        return view('transmittion.add1', compact('provence', 'district', 'companies', 'agent', 'transmissionModel', 'transmissionType'));
    }

    public function addTransmission0(Request $request)
    {

        $agent = companyAgent::find($request->id);
        $provence = provence::all();
        $district = district::all();
        $companies = Company::all();
        $company = company::find($request->cid);
        $transmissionModel = transmissionModel::all();
        $transmissionType = transmissionType::all();
        return view('transmittion.add', compact('agent', 'provence', 'district', 'companies', 'transmissionModel', 'transmissionType', 'company'));
    }



    public function addTransmission(Request $request)
    {
        // $order=order::join('company_agents','orders.company_agent_id','company_agents.id')->where('company_agents.id',$request->agent_id)->first();
        // $order=order::where('company_agent_id',$request->agent_id)->first();
        for ($i = 0; $i < count($request->transmission_type_id); $i++) {
            $transmission = new transmission();
            $transmission->transmission_type_id  = $request->transmission_type_id[$i];
            $transmission->transmission_model_id = $request->transmission_model_id[$i];
            $transmission->serialNo = $request->serialNo[$i];
            $transmission->order_id = $request->order_id;
            $transmission->provence_id = $request->provence_id[$i];
            $transmission->status = 1;
            $transmission->save();
        }


        if ($request->w) {
            $orderDetails = new orderDetails();
            $orderDetails->order_id = $request->order_id;
            $orderDetails->transmission_type_id = 1;
            $orderDetails->transmissionQuantity = $request->wakiTaki;
            $orderDetails->save();
        }

        if ($request->b) {

            $orderDetails = new orderDetails();
            $orderDetails->order_id = $request->order_id;
            $orderDetails->transmission_type_id = 2;
            $orderDetails->transmissionQuantity = $request->baseStation;
            $orderDetails->save();
        }

        if ($request->c) {

            $orderDetails = new orderDetails();
            $orderDetails->order_id = $request->order_id;
            $orderDetails->transmission_type_id = 3;
            $orderDetails->transmissionQuantity = $request->codeOn;
            $orderDetails->save();
        }

        if ($request->r) {

            $orderDetails = new orderDetails();
            $orderDetails->order_id = $request->order_id;
            $orderDetails->transmission_type_id = 4;
            $orderDetails->transmissionQuantity = $request->repeter;
            $orderDetails->save();
        }


        for ($i = 0; $i < count($request->freqNumber); $i++) {
            $frequencey = new frequencey();
            $frequencey->frequenceyNo = $request->freqNumber[$i];
            $frequencey->autraLicenceNo = $request->afile[$i];
            $frequencey->provence_id = $request->fprovence[$i];
            $frequencey->order_id = $request->order_id;
            $frequencey->save();
        }



        return redirect()->route('list.company');
    }






    public function companyTransmission($id)
    {


        $order1 = order::join('companies', 'orders.company_id', 'companies.id')
            ->select('orders.*', 'companies.companyName as companyName')
            ->where('companies.id', $id)->where('orders.status', 0)->get();

        // foreach($order1 as $row){
        //     $order3[$i++]=orderDetails::join('orders','orders.id','order_details.order_id')
        // ->where('order_details.order_id',$row->id)
        // ->select(DB::raw('sum(order_details.transmissionQuantity) as totalT'))
        // ->get();
        // }

        $orders = order::join('companies', 'companies.id', 'orders.company_id')
            ->join('order_details', 'order_details.order_id', 'orders.id')
            ->join('company_agents', 'orders.company_agent_id', 'company_agents.id')
            ->selectRaw('company_agents.agentName aname, companies.companyName company,orders.id `order`, orders.created_at created_at, SUM(order_details.transmissionQuantity) total_transmissions')
            ->where('orders.company_id', $id)->where('orders.status', 0)
            ->groupByRaw('1,2,3,4')
            ->get();
        // $order2=orderDetails::where('order_id',$order1->id)->select(DB::raw('sum(order_details.transmissionQuantity) as totalT'))->get();
        $order3 = orderDetails::join('orders', 'orders.id', 'order_details.order_id')
            ->where('order_details.order_id', 1)
            ->select(DB::raw('sum(order_details.transmissionQuantity) as totalT'))
            ->get();


        $order = Company::join('orders', 'companies.id', 'orders.company_id')
            ->join('transmissions', 'orders.id', 'transmissions.order_id')
            ->join('transmission_types', 'transmissions.transmission_type_id', 'transmission_types.id')
            ->join('transmission_models', 'transmissions.transmission_model_id', 'transmission_models.id')
            ->join('provences', 'transmissions.provence_id', 'provences.id')
            ->select(
                'transmission_types.transmissionTypeName as tname',
                'transmission_types.rate as rate',
                'transmission_models.transmissionModelName as mname',
                'provences.provenceName as pname',
                'transmissions.*'
            )->where('companies.id', $id)->get();

        return response()->json(['order' => $order, 'orders' => $orders]);
    }


    public function orderStatus($id)
    {
        $order = order::find($id);
        $order->status = 1;
        $order->Save();
        $transmissiontype = new transmissionType();
        $transmission = transmissionType::find(1);
        $transmission->rate = 400;
        $transmission->update();

        $transmission = transmissionType::find(2);
        $transmission->rate = 600;
        $transmission->update();

        $transmission = transmissionType::find(3);
        $transmission->rate = 900;
        $transmission->update();

        $transmission = transmissionType::find(4);
        $transmission->rate = 1200;
        $transmission->update();
        return response()->json(['order' => $order, 'message' => 'order status changed successfuly ']);
    }


    public function edit($id)
    {

        $name = Company::where('id', $id)->first()->companyName;
        $type = Company::where('id', $id)->first()->company_type_id;
        $activeType = Company::where('id', $id)->first()->company_active_type_id;
        $manager = Company::where('id', $id)->first()->companyManagerName;
        $country = Company::where('id', $id)->first()->country_id;
        $address = Company::where('id', $id)->first()->companyAddress;
        $lat = Company::where('id', $id)->first()->latitude;
        $lan = Company::where('id', $id)->first()->longtitude;

        $companyType = companyType::all();
        $companyActiveType = companyActiveType::all();
        $countries = country::all();
        $citizenships = citizenship::all();

        return response()->json([
            'name' => $name, 'type' => $type, 'activeType' => $activeType, 'manager' => $manager, 'country' => $country, 'address' => $address, 'lat' => $lat,
            'lan' => $lan, 'companyType' => $companyType, 'companyActiveType' => $companyActiveType, 'countries' => $countries, 'citizenships' => $citizenships
        ]);
    }


    public function getCountry()
    {
        return response()->json(['country' => country::all()]);
    }

    public function update(Request $request)
    {
        $company = company::find($request->company_id);
        $company->companyName = $request->companyName;
        $company->company_type_id = $request->company_type_id;
        $company->company_active_type_id = $request->company_active_type_id;
        $company->companyManagerName = $request->companyManagerName;
        $company->companyAddress = $request->companyAddress;
        $company->latitude = $request->latitude;
        $company->longtitude = $request->longtitude;
        if ($request->citizenship_id == 1 || $request->citizenship_id == 3) {
            $company->country_id = 3;
        } else {
            $company->country_id = $request->country_id;
        }
        $company->update();
        $cmp=Company::join('company_active_types','companies.company_active_type_id','company_active_types.id')
        ->join('company_types','companies.company_type_id','company_types.id')
        ->select('companies.*','company_active_types.companyName as aname','company_types.companyTypeName as tname')
        ->where('companies.id',$request->company_id)->first();
        return response()->json(['company' => $cmp, 'message' => 'د کمپنی معلومات په بریالیتوب سره تغیر شول!']);
    }

    public function editLicense($id){
         $company=companyLicense::where('id',$id)->first()->company_id;
         $licenseTypeId=companyLicense::where('id',$id)->first()->license_type_id;
         $licenseType=licenseType::all();
         $companyLicense=companyLicense::find($id);

         return response()->json(['company'=>$company,'licenseTypeId'=>$licenseTypeId,'licenseType'=>$licenseType,'companyLicense'=>$companyLicense]);
    }

    public function updateLicese(Request $request){
         $companyLicense=companyLicense::find($request->company_license_id);
         $companyLicense->license_type_id = $request->license_type_id;
         $companyLicense->licenseNumber=$request->licenseNumber;
         $companyLicense->issueDate=$request->issueDate;
         $companyLicense->update();

         $companylicense = Company::Join('company_licenses', 'companies.id', 'company_licenses.company_id')
         ->join('license_types', 'company_licenses.license_type_id', 'license_types.id')
         ->select('company_licenses.*', 'license_types.licenseTypeName as ltname','companies.companyName as cname')->where('company_licenses.id', $request->company_license_id)->first();


         return response()->json(['companyLices'=>$companylicense,'message'=>'د کمپنی لیسانس په بریالیتوب سره تغیر شو!']);

    }

    public function deleteLicense(Request $request){
        $cmp=companyLicense::find($request->id)->delete();
        $companylicense = Company::Join('company_licenses', 'companies.id', 'company_licenses.company_id')
        ->join('license_types', 'company_licenses.license_type_id', 'license_types.id')
        ->select('company_licenses.*', 'license_types.licenseTypeName as ltname')->where('companies.id', $request->cmpId)->get();
        return response()->json(['data'=>$companylicense,'message'=>'د کمپنی لیسانس په بریالیتوب سره پاک/حذف شو!']);

    }


    public function addLicense(Request $request){


        $cmpLicense=new companyLicense();
        $cmpLicense->company_id=$request->company_id;
        $cmpLicense->license_type_id=$request->license_type_id;
        $cmpLicense->licenseNumber=$request->licenseNumber;
        $cmpLicense->issueDate=$request->issueDate;
        $cmpLicense->files=$request->file('files')->store(companyLicense::IMAGE_PATH);
        $cmpLicense->save();
        $clicense= companyLicense::join('companies','company_licenses.company_id','companies.id')
        ->join('license_types','company_licenses.license_type_id','license_types.id')
        ->select('companies.companyName as cname','license_types.licenseTypeName as lname','company_licenses.*')->where('company_licenses.id',$cmpLicense->id)->first();
        return response()->json(['message'=>'د کمپنی لیسانس په بریالیتوب سره اضافه کړل شو!','license'=>$clicense]);
    }
}
