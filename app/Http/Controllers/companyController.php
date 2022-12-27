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
use App\View\Components\companySearchComponent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class companyController extends Controller
{
    public function index()
    {
        if (request()->ajax()) return $this->Search(request());

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
        $companys = Company::join('company_active_types', 'companies.company_active_type_id', 'company_active_types.id')
            ->join('company_types', 'companies.company_type_id', 'company_types.id')
            ->select(
                'company_active_types.companyName as aname',
                'company_types.companyTypeName as tname',
                'companies.*'
            )->paginate(5);

        // $companies = Company::join('company_active_types', 'companies.company_active_type_id', 'company_active_types.id')
        //     ->join('company_types', 'companies.company_type_id', 'company_types.id')
        //     ->select(
        //         'company_active_types.companyName as aname',
        //         'company_types.companyTypeName as tname',
        //         'companies.*'
        //     )->get();




        // $companies=company::join('company_active_types','companies.company_active_type_id','company_active_types.id')
        // ->leftjoin('company_types','companies.company_type_id','company_types.id')
        // ->leftjoin('citizenships','companies.citizenship_id','citizenships.id')
        // ->select('company_active_types.companyName as aname','company_types.companyTypeName as tname',
        // 'citizenships.citizenshipName as cname','companies.companyName as name','companies.companyManagerName as mname','companies.id as comp_id')->get();


        return view('company.list', compact('licenseType', 'countires', 'companyType', 'companyActiveType', 'citizenships', 'provence', 'district', 'companys'));
    }

    public function index1(Request $request)
    {
        $companys = Company::join('company_active_types', 'companies.company_active_type_id', 'company_active_types.id')
            ->join('company_types', 'companies.company_type_id', 'company_types.id')
            ->select(
                'company_active_types.companyName as aname',
                'company_types.companyTypeName as tname',
                'companies.*'
            )->get();

        return view('company.list', compact('companys'));
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
        $licenseType=licenseType::all();


        return view('company.add',compact('licenseType','countires','companyType','companyActiveType','citizenships','provence','district','transmissionModel','transmissionType'));
    }


    public function saveCompnay(SaveCompanyRequest $request)
    {



        $company = new Company();
        $company->companyName = $request->companyName;
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
    }



    public function details($id){
        $provence=provence::all();
        $district=district::all();
        // DB::enableQueryLog();
        if ($id != null) {
            if (Company::find($id)) {
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
                $licenseType = licenseType::all();
                $companylicense = Company::Join('company_licenses', 'companies.id', 'company_licenses.company_id')
                    ->join('license_types', 'company_licenses.license_type_id', 'license_types.id')
                    ->select('company_licenses.*', 'license_types.licenseTypeName as ltname')->where('companies.id', $company->id)->get();
                if ($company != null) {
                    return view('company.details', compact('company', 'provence', 'district', 'companylicense', 'licenseType'));
                } else {
                    return redirect()->back();
                }
            } else {
                return redirect()->back();
            }
        }
    }

    public function saveRight($id)
    {

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

    public function addTransmission(Request $request)
    {

        if ($request != null) {

            $order = new order();
            $cid = companyAgent::where('id', $request->agent_id)->first()->company_id;
            $order->company_id = $cid;
            $order->company_agent_id = $request->agent_id;
            $order->suggestion_file = $request->suggestion_file;
            $order->save();


            foreach ($request->transmission_type_id as $key => $value) {

                $transmission = new transmission();
                $transmission->transmission_type_id  = $request->transmission_type_id[$key];
                $transmission->transmission_model_id = $request->transmission_model_id[$key];
                $transmission->serialNo = $request->serialNo[$key];
                $transmission->order_id = $order->id;
                $transmission->provence_id = $request->provence_id[$key];
                $transmission->status = 0;
                $transmission->save();

            }






            if ($request->freqNumber) {
                foreach ($request->freqNumber as $key => $value) {
                    $frequencey = new frequencey();
                    $frequencey->frequenceyNo = $request->freqNumber[$key];
                    $frequencey->autraLicenceNo = $request->afile[$key];
                    $frequencey->provence_id = $request->fprovence[$key];
                    $frequencey->order_id = $order->id;
                    $frequencey->save();
                }
            }



            if ($request->w) {
                $orderDetails = new orderDetails();
                $orderDetails->order_id = $order->id;
                $orderDetails->transmission_type_id = 1;
                $orderDetails->transmissionQuantity = $request->wakiTaki;
                $orderDetails->save();
            }

            if ($request->b) {

                $orderDetails = new orderDetails();
                $orderDetails->order_id = $order->id;
                $orderDetails->transmission_type_id = 2;
                $orderDetails->transmissionQuantity = $request->baseStation;
                $orderDetails->save();
            }

            if ($request->c) {

                $orderDetails = new orderDetails();
                $orderDetails->order_id = $order->id;
                $orderDetails->transmission_type_id = 3;
                $orderDetails->transmissionQuantity = $request->codeOn;
                $orderDetails->save();
            }

            if ($request->r) {

                $orderDetails = new orderDetails();
                $orderDetails->order_id = $order->id;
                $orderDetails->transmission_type_id = 4;
                $orderDetails->transmissionQuantity = $request->repeter;
                $orderDetails->save();
            }
            return redirect()->route('details.company', $cid);
        } else {
            return redirect()->back();
        }
    }






    // public function companyTransmission($id)
    // {


    //     $order1 = order::join('companies', 'orders.company_id', 'companies.id')
    //         ->select('orders.*', 'companies.companyName as companyName')
    //         ->where('companies.id', $id)->where('orders.status', 0)->get();

    //     // foreach($order1 as $row){
    //     //     $order3[$i++]=orderDetails::join('orders','orders.id','order_details.order_id')
    //     // ->where('order_details.order_id',$row->id)
    //     // ->select(DB::raw('sum(order_details.transmissionQuantity) as totalT'))
    //     // ->get();
    //     // }

    //     $orders = order::join('companies', 'companies.id', 'orders.company_id')
    //         ->join('order_details', 'order_details.order_id', 'orders.id')
    //         ->join('company_agents', 'orders.company_agent_id', 'company_agents.id')
    //         ->selectRaw('company_agents.agentName aname, companies.companyName company,orders.id `order`, orders.created_at created_at, SUM(order_details.transmissionQuantity) total_transmissions')
    //         ->where('orders.company_id', $id)->where('orders.status', 0)
    //         ->groupByRaw('1,2,3,4')
    //         ->get();
    //     // $order2=orderDetails::where('order_id',$order1->id)->select(DB::raw('sum(order_details.transmissionQuantity) as totalT'))->get();
    //     $order3 = orderDetails::join('orders', 'orders.id', 'order_details.order_id')
    //         ->where('order_details.order_id', 1)
    //         ->select(DB::raw('sum(order_details.transmissionQuantity) as totalT'))
    //         ->get();


    // }




    public function companyTransmission($id){



        $order=Company::join('orders','companies.id','orders.company_id')
        ->join('transmissions','orders.id','transmissions.order_id')
        ->join('transmission_types','transmissions.transmission_type_id','transmission_types.id')
        ->join('transmission_models','transmissions.transmission_model_id','transmission_models.id')
        ->join('provences','transmissions.provence_id','provences.id')
        ->select('transmission_types.transmissionTypeName as tname',
        'transmission_models.transmissionModelName as mname',
       'provences.provenceName as pname','transmissions.serialNo as sname')->where('companies.id',$id)->get();

    }

    public function edit($id){
         if($id!=null){
            $company=company::find($id);
            $companyType=companyType::all();
            $companyActiveType=companyActiveType::all();
            $citizenships=citizenship::all();
            $countries=country::all();
            $cid=$company->country_id;
            return response()->json(['cid'=>$cid,'countries'=>$countries,'citizenships'=>$citizenships,'company'=>$company,'companyType'=>$companyType,'companyActiveType'=>$companyActiveType]);
         }
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
        $cmp = Company::join('company_active_types', 'companies.company_active_type_id', 'company_active_types.id')
            ->join('company_types', 'companies.company_type_id', 'company_types.id')
            ->select('companies.*', 'company_active_types.companyName as aname', 'company_types.companyTypeName as tname')
            ->where('companies.id', $request->company_id)->first();
        return response()->json(['company' => $cmp, 'message' => 'د کمپنی معلومات په بریالیتوب سره تغیر شول!']);
    }

    public function DeActive($id)
    {
        $company = Company::where('id', $id)->first();
        $company->status = 0;
        $company->update();
        // return redirect()->route('list.company');
        return redirect()->back();
    }

    public function active($id)
    {
        $company = Company::where('id', $id)->first();
        $company->status = 1;
        $company->update();
        // return redirect()->route('list.company');
        return redirect()->back();
    }

    public function editLicense($id)
    {
        if($id!=null){

            $company = companyLicense::where('id', $id)->first()->company_id;
            $licenseTypeId = companyLicense::where('id', $id)->first()->license_type_id;
            $licenseType = licenseType::all();
            $companyLicense = companyLicense::find($id);
            return response()->json(['company' => $company, 'licenseTypeId' => $licenseTypeId, 'licenseType' => $licenseType, 'companyLicense' => $companyLicense]);
        }else{return response()->json(['message'=>'ستونزه ده']);}

    }

    public function updateLicese(Request $request)
    {
        if($request->ajax()){
            if($request!=null){
                $companyLicense = companyLicense::find($request->company_license_id);
                if($companyLicense!=null){
                    $companyLicense->license_type_id = $request->license_type_id;
                    $companyLicense->licenseNumber = $request->licenseNumber;
                    $companyLicense->issueDate = $request->issueDate;
                    $companyLicense->update();

                    $companylicense = Company::Join('company_licenses', 'companies.id', 'company_licenses.company_id')
                        ->join('license_types', 'company_licenses.license_type_id', 'license_types.id')
                        ->select('company_licenses.*', 'license_types.licenseTypeName as ltname', 'companies.companyName as cname')->where('company_licenses.id', $request->company_license_id)->first();
                    return response()->json(['companyLices' => $companylicense, 'message' => 'د کمپنی لیسانس په بریالیتوب سره تغیر شو!']);

                }else{return response()->json(['message'=>'ستونزه ده']);}

            }else{return response()->json(['message'=>'ستونزه ده']);}

        }else{return redirect()->back();}

    }

    public function deleteLicense(Request $request)
    {
        if (companyLicense::where('company_id', $request->cmpId)->count() == 1) {
            return response()->json(['status' => false, 'message' => 'د کمپنی وروستی جواز نشی پاکولی!!!']);
        } else {
            $cmp = companyLicense::find($request->id)->delete();
            $companylicense = Company::Join('company_licenses', 'companies.id', 'company_licenses.company_id')
                ->join('license_types', 'company_licenses.license_type_id', 'license_types.id')
                ->select('company_licenses.*', 'license_types.licenseTypeName as ltname')->where('companies.id', $request->cmpId)->get();
            return response()->json(['data' => $companylicense, 'message' => 'د کمپنی لیسانس په بریالیتوب سره پاک/حذف شو!']);
        }
    }


    public function addLicense(Request $request)
    {


        if (companyLicense::where('company_id', $request->company_id)->where('license_type_id', $request->license_type_id)->exists()) {
            return response()->json(['message' => 'دا لیسانس موجود ده کمپنی کی کولای شی تفیر یا هم حذف یی کړی', 'status' => false]);
        } else {
            $cmpLicense = new companyLicense();
            $cmpLicense->company_id = $request->company_id;
            $cmpLicense->license_type_id = $request->license_type_id;
            $cmpLicense->licenseNumber = $request->licenseNumber;
            $cmpLicense->issueDate = $request->issueDate;
            $cmpLicense->files = $request->file('files')->store(companyLicense::IMAGE_PATH);
            $cmpLicense->save();
            $clicense = companyLicense::join('companies', 'company_licenses.company_id', 'companies.id')
                ->join('license_types', 'company_licenses.license_type_id', 'license_types.id')
                ->select('companies.companyName as cname', 'license_types.licenseTypeName as lname', 'company_licenses.*')->where('company_licenses.id', $cmpLicense->id)->first();
            return response()->json(['message' => 'د کمپنی لیسانس په بریالیتوب سره اضافه کړل شو!', 'license' => $clicense, 'status' == True]);
        }
    }

    public function Search(Request $request)
    {
        $companys = Company::query()->join('company_active_types', 'companies.company_active_type_id', 'company_active_types.id')
            ->join('company_types', 'companies.company_type_id', 'company_types.id')
            ->select(
                'company_active_types.companyName as aname',
                'company_types.companyTypeName as tname',
                'companies.*'
            );
        $companys->when($request->company_name, function ($query) use ($request) {
            return $query->where('companies.companyName',  'like', '%' . ($request->company_name) . '%');
        });
        $companys->when($request->company_active_type_id != "د کمپنی د فعالیت ډول انتخاب کړی", function ($query) use ($request) {
            return $query->where('companies.company_active_type_id', ($request->company_active_type_id));
        });
        $companys->when($request->company_type_id != "د کمپنی نوعه انتخاب کړی", function ($query) use ($request) {
            return $query->where('companies.company_type_id', ($request->company_type_id));
        });
        $companys->when($request->ManagerName, function ($query) use ($request) {
            return $query->where('companies.companyManagerName', 'like', '%' . ($request->ManagerName) . '%');
        });

        return response()->json(['success' => $this->addcompanysearch($companys->paginate(5))], 200);
    }
    private function addcompanysearch($companys)
    {
        $companysearchcomponet = new companySearchComponent($companys);
        return $companysearchcomponet->resolveView()->render();
    }

    public function getCountry(){
        $country=country::all();
        return response()->json(['country'=>$country]);
    }
}
