<?php

namespace App\Http\Controllers;


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

class orderController extends Controller
{
    public function index(){

    }

    public function details($id){
        $order=order::where('id',$id)->first()->status;
        $company=order::where('id',$id)->first()->company_id;
        $name=Company::where('id',$company)->first()->companyName;
        if($order==0){


        $order = order::join('transmissions', 'orders.id', 'transmissions.order_id')
        ->join('transmission_types', 'transmissions.transmission_type_id', 'transmission_types.id')
        ->join('transmission_models', 'transmissions.transmission_model_id', 'transmission_models.id')
        ->join('provences', 'transmissions.provence_id', 'provences.id')
        ->select(
            'transmission_types.transmissionTypeName as tname',
            'transmission_types.rate as rate',
            'transmission_models.transmissionModelName as mname',
            'provences.provenceName as pname',
            'transmissions.*','orders.id as order'
        )->where('orders.id', $id)->get();


        return view('order.details',compact('order','name'));




        }
    }
}
