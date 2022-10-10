<?php

namespace App\Http\Controllers;

use App\Models\citizenship;
use App\Models\Company;
use App\Models\companyActiveType;
use App\Models\companyType;
use App\Models\district;
use App\Models\provence;
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
        $companyType=companyType::all();
        $companyActiveType=companyActiveType::all();
        $citizenships=citizenship::all();
        return view('company.add',compact('companyType','companyActiveType','citizenships'));
    }


    public function saveCompnay(Request $request){
        $company=new Company();
        $company->companyName=$request->companyName;
        $company->companyId = $request->compnayID;
        $company->licenceNo = $request->licenseNumber;
        $company->company_type_id = $request->company_type_id;
        $company->company_active_type_id = $request->company_active_type_id;
        $company->companyManagerName = $request->companyManagerName;
        $company->citizenship_id = $request->citizenship_id;
        $company->save();
        return response()->json([
            'message' => 'company Added Successfuly ',
        ]);


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

         return view('company.details',compact('company','provence','district'));
    }
}
