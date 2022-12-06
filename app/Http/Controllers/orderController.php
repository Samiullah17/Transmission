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
use Yajra\DataTables\Facades\DataTables;

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

    public function getOrder($id){
        $order=order::join('companies','orders.company_id','companies.id')
        ->join('company_agents','orders.company_agent_id','company_agents.id')
        ->select('orders.*','companies.companyName as cname','company_agents.agentName as aname')->where('orders.company_id',$id)->get();

        return Datatables::of($order)->addIndexColumn()
            ->addColumn('action', function ($order) {
                $btn = '<a href="'.route('order.transmission',['id'=>$order->id]).'" class="btn btn-primary btn-sm">کتل</a>';
                return $btn;
            })
            ->addColumn('status', function ($order) {
                if($order->status == 0){
                    $btn = '<span class="badge badge-warning">د پروگرام په حال</span>';
                }else{
                    $btn = '<span class="badge badge-success">پروګرام شوی</span>';
                }
                return $btn;
            })
            ->rawColumns(['action','status'])
            ->make(true);

            return view('company.list');
    }

    public function program($id){
        $order=$id;
        $status=order::where('id',$id)->first()->status;

        $transmissinos = order::join('transmissions', 'orders.id', 'transmissions.order_id')
        ->join('transmission_types', 'transmissions.transmission_type_id', 'transmission_types.id')
        ->join('transmission_models', 'transmissions.transmission_model_id', 'transmission_models.id')
        ->join('provences', 'transmissions.provence_id', 'provences.id')
        ->select(
            'transmissions.serialNo as sNo',
            'transmission_types.transmissionTypeName as tname',
            'transmission_types.id as tid',
            'transmission_models.transmissionModelName as mname',
            'provences.provenceName as pname',
            'transmissions.id as id',
            'transmission_types.rate as rate'
        )->where('orders.id', $id)->get();
        $transmissionTypes=transmissionType::all();

        return view('transmittion.program',compact('transmissinos','order','transmissionTypes','status'));
    }
}
