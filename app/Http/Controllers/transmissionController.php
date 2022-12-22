<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\transmission;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\frequencey;
use App\Models\orderDetails;
use App\Models\provence;
use App\Models\transmissionModel;
use App\Models\transmissionType;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class transmissionController extends Controller
{
    public function index()
    {
    }

    public function program()
    {
        $companies = Company::all();
        return view('transmittion.program');
    }

    public function program1($id)
    {
        $transmissinos = order::join('transmissions', 'orders.id', 'transmissions.order_id')
            ->join('transmission_types', 'transmissions.transmission_type_id', 'transmission_types.id')
            ->join('transmission_models', 'transmissions.transmission_model_id', 'transmission_models.id')
            ->join('provences', 'transmissions.provence_id', 'provences.id')
            ->select(
                'transmissions.serialNo as sNo',
                'transmission_types.transmissionTypeName as tname',
                'transmission_models.transmissionModelName as mname',
                'provences.provenceName as pname',
                'transmissions.id as id',
                'transmission_types.rate as rate'
            )->where('orders.id', $id)->get();

        $type = transmissionType::all();


        return response()->json(['orders' => $transmissinos, 'type' => $type]);
    }


    public function changeRate(Request $request)
    {

        $order=order::find($request->order);
        if($order->status==0){
            $transmission = transmissionType::where('id', $request->tra)->first();
            if($transmission!=null){
                $totalRate = $transmission->rate - $request->rate;
                $transmission->rate = $totalRate;
                $transmission->save();
                return response()->json(['rate' => $totalRate,'message'=>'د مخابری قیمت په بریالیتوب سره تغیر شو','status'=>true]);
            }

            else{
                return response()->json(['message'=>'په مهربانی سره مخابری ته یو قیمت ورکړی او وروسته بیا کوشش وکړی','status'=>false]);


            }

        }else{
            return response()->json(['message'=>'دا غوښتنه پروګرام شوی تغیرات نشی پکی راوړلی که ستونزه وی په مهربانی سره غوښتنه له پروګرام حالت سخه وباسی او بیا کوښښ وکړی','status'=>false]);
        }
    }

    public function changeStatus(Request $request)
    {

        // dd($request->all());
        if($request->order){
            $order=order::find($request->order);
            if($order->status==0){

                if ($request->status == 'pdone') {

                    $data = transmission::where('id', $request->id)->first();
                    if($data->status==0){
                        $data->status = 1;
                        $tra = transmissionType::where('id', $data->transmission_type_id)->first()->rate;
                        $data->rate = $tra;
                        $data->save();
                        return response()->json(['rate' => $tra,'message'=>'پروګرام شوه','status'=>true]);

                    }else{
                        return response()->json(['message'=>'مخابره پروګرام شوی ده!!!','status'=>false]);
                    }

                } else if ($request->status == 'pnotdone') {

                    $data = transmission::where('id', $request->id)->first();
                    if($data->status==1){
                        $data->status = 0;
                        $data->rate = 0;
                        $data->save();
                        return response()->json(['rate' => 0,'message'=>'ستونزه لری!','status'=>true]);

                    }else{
                        return response()->json(['message'=>'مخابره مخکی پروګرام شوی!','status'=>false]);
                    }

                }

            }else{
                return response()->json(['message'=>'په دې غوښتنه کی موجودی مخابری پروګرام شوی که ستونزه وی غوښتنه له پروګرام حالت سخه وباسی او بیا کوښښ وکړی']);
            }

        }



        if ($request->status == 'details') {
            $transmission = transmission::where('id', $request->id)->first()->transmission_type_id;
            $tra = transmissionType::where('id', $transmission)->first();
            $t = transmission::join('transmission_types', 'transmissions.transmission_type_id', 'transmission_types.id')
                ->join('transmission_models', 'transmissions.transmission_model_id', 'transmission_models.id')
                ->join('provences', 'transmissions.provence_id', 'provences.id')
                ->select(
                    'transmission_types.transmissionTypeName as tname',
                    'transmission_models.transmissionModelName as mname',
                    'transmission_types.rate as rate',
                    'transmissions.serialNo as sname',
                    'provences.provenceName as pname'
                )->where('transmissions.id', $request->id)->first();

            return response()->json(['transmission' => $t]);
        }
        return response()->json(['status' => 'Status Changed Successfuly']);
    }

    public function saveTransmission(Request $request)
    {
        $order = order::where('company_agent_id', $request->agent_id)->first();

        for ($i = 0; $i < count($request->transmission_type_id); $i++) {
            $transmission = new transmission();
            $transmission->transmission_type_id  = $request->transmission_type_id[$i];
            $transmission->transmission_model_id = $request->transmission_model_id[$i];
            $transmission->serialNo = $request->serialNo[$i];
            $transmission->order_id = $order->id;
            $transmission->provence_id = $request->provence_id[$i];
            $transmission->save();
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

        if (count($request->freqNumber) > 0) {

            for ($i = 0; $i <= count($request->freqNumber); $i++) {
                $frequencey = new frequencey();
                $frequencey->frequenceyNo = $request->freqNumber[$i];
                $frequencey->autraLicenceNo = $request->afile[$i];
                $frequencey->provence_id = $request->fprovence[$i];
                $frequencey->order_id = $order->id;
                $frequencey->save();
            }
        }





        return redirect()->back();
    }


    public function listTransmission()
    {

        $order = order::join('companies', 'orders.company_id', 'companies.id')
            ->join('company_agents', 'orders.company_agent_id', 'company_agents.id')
            ->select('companies.companyName as cname', 'company_agents.agentName as aname', 'orders.*')->get();

        return Datatables::of($order)->addIndexColumn()
            ->addColumn('action', function ($order) {
                $btn = '<a href="' . route('order.transmission', ['id' => $order->id]) . '" class="btn btn-primary btn-sm">کتل</a>';
                return $btn;
            })
            ->addColumn('status', function ($order) {
                if ($order->status == 0) {
                    $btn = '<span class="badge badge-warning">د پروگرام په حال</span>';
                } else {
                    $btn = '<span class="badge badge-success">پروګرام شوی</span>';
                }
                return $btn;
            })
            ->rawColumns(['action', 'status'])
            ->make(true);

        return view('transmittion.list');
    }

    public function addTransmittion_new_transmission(Request $request)
    {
        $order = new order();
        $order->company_id = $request->company_id;
        $order->company_agent_id = $request->agent_id;
        $order->suggestion_file = $request->suggestion_file;
        $order->save();



        $provence = provence::all();
        $transmissionModel = transmissionModel::all();
        $transmissionType = transmissionType::all();
        return view('transmittion.add', compact('provence', 'transmissionModel', 'transmissionType', 'order'));
    }

    public function orderTransmissions($id)
    {
        $order = $id;
        $transmissions = transmission::join('transmission_types', 'transmissions.transmission_type_id', 'transmission_types.id')
            ->join('transmission_models', 'transmissions.transmission_model_id', 'transmission_models.id')
            ->join('provences', 'transmissions.provence_id', 'provences.id')
            ->join('orders', 'transmissions.order_id', 'orders.id')
            ->select(
                'transmissions.*',
                'transmission_types.transmissionTypeName as tname',
                'transmission_models.transmissionModelName as mname',
                'provences.provenceName as pname',
                'orders.status as ostatus'
            )->where('transmissions.order_id', $id)->get();

        $cid = order::where('id', $id)->first()->company_id;
        $cname = Company::where('id', $cid)->first()->companyName;


        $provence = provence::all();
        $transmissionModel = transmissionModel::all();
        $transmissionType = transmissionType::all();
        $company=Company::find($cid);
        return view('order.transmission', compact('company','transmissions', 'order', 'provence', 'transmissionModel', 'transmissionType', 'cname'));
    }

    public function delete(Request $request)
    {
        transmission::where('id', $request->id)->delete();
        orderDetails::where('order_id', $request->order)->decrement('transmissionQuantity');

        $transmissions = transmission::join('transmission_types', 'transmissions.transmission_type_id', 'transmission_types.id')
            ->join('transmission_models', 'transmissions.transmission_model_id', 'transmission_models.id')
            ->join('provences', 'transmissions.provence_id', 'provences.id')
            ->select(
                'transmissions.*',
                'transmission_types.transmissionTypeName as tname',
                'transmission_models.transmissionModelName as mname',
                'provences.provenceName as pname'
            )->where('transmissions.order_id', $request->order)->get();
        Alert::error('ریکارډ ډیلیټ شو', 'ریکارډ ډیلیټ شو');

        return response()->json(['data' => $transmissions, 'message' => 'Transmission Deleted Successfuly']);
    }

    public function edit(Request $request)
    {
        $tType = transmission::where('id', $request->id)->first()->transmission_type_id;
        $tModel = transmission::where('id', $request->id)->first()->transmission_model_id;
        $tProvence = transmission::where('id', $request->id)->first()->provence_id;
        $tSerial = transmission::where('id', $request->id)->first()->serialNo;

        $transmissionType = transmissionType::all();
        $transmissionModel = transmissionModel::all();
        $provences = provence::all();
        return response()->json(['tType' => $tType, 'tModel' => $tModel, 'tProvence' => $tProvence, 'tSerial' => $tSerial, 'tra' => $transmissionType, 'tram' => $transmissionModel, 'pro' => $provences]);
    }

    public function saveEdit(Request $request)
    {
        $transmission = transmission::find($request->transmission_id);
        if($transmission!=null){
            $transmission->transmission_type_id = $request->transmission_type_id;
            $transmission->transmission_model_id = $request->transmission_model_id;
            $transmission->serialNo = $request->serialNO;
            $transmission->provence_id = $request->provence_id;
            $transmission->update();
            return response()->json(['data' => $request->all(), 'message' => 'د مخابری معلومات په بریالیتوب سره تغیر شول','status'=>true]);
        }
        else{
            return response()->json([ 'message' => 'مخابره پیدا نشوله','status'=>false]);

        }


    }

    public function addNTransmission(Request $request)
    {
        $transmission = new transmission();
        $transmission->transmission_type_id = $request->transmission_type_id;
        $transmission->transmission_model_id = $request->transmission_model_id;
        $transmission->serialNo = $request->serialNO;
        $transmission->status = 0;
        $transmission->provence_id = $request->provence_id;
        $transmission->order_id = $request->order_id;
        $transmission->rate = 0;
        $transmission->save();
        $tra = transmission::join('transmission_models', 'transmissions.transmission_model_id', 'transmission_models.id')
            ->join('transmission_types', 'transmissions.transmission_type_id', 'transmission_types.id')
            ->join('provences', 'transmissions.provence_id', 'provences.id')
            ->select(
                'transmission_types.transmissionTypeName as tname',
                'transmission_models.transmissionModelName as mname',
                'provences.provenceName as pname',
                'transmissions.*'
            )->where('transmissions.id', $transmission->id)->first();

        $tr = transmission::where('id', $transmission->id)->first()->order_id;
        $order = order::where('id', $tr)->first()->status;


        return response()->json(['message' => 'مخابره په بریالیتوب سره ثبت شوه', 'tra' => $tra, 'order' => $order]);
    }

    public function show($id)
    {
        $transmissions = transmission::join('transmission_types', 'transmissions.transmission_type_id', 'transmission_types.id')
            ->join('transmission_models', 'transmissions.transmission_model_id', 'transmission_models.id')
            ->join('provences', 'transmissions.provence_id', 'provences.id')
            ->select(
                'transmissions.*',
                'transmission_types.transmissionTypeName as tname',
                'transmission_models.transmissionModelName as mname',
                'provences.provenceName as pname'
            )->where('transmissions.order_id', $id)->get();
        return response()->json(['message' => 'Data arived successfuly', 'data' => $transmissions]);
    }

    public function allTransmissino(Request $request)
    {

        if ($request->status == 'allTra') {

            $allTransmissions = order::join('companies', 'orders.company_id', 'companies.id')
                ->join('transmissions', 'transmissions.order_id', 'orders.id')
                ->join('transmission_types', 'transmissions.transmission_type_id', 'transmission_types.id')
                ->join('transmission_models', 'transmissions.transmission_model_id', 'transmission_models.id')
                ->join('provences', 'transmissions.provence_id', 'provences.id')
                ->select(
                    'transmissions.*',
                    'transmission_types.transmissionTypeName as tname',
                    'transmission_models.transmissionModelName as mname',
                    'provences.provenceName as pname'
                )->where('companies.id', $request->id)->get();
            return response()->json(['data' => $allTransmissions]);
        }

        if ($request->status == 'allOrders') {
            $orders = order::join('companies', 'companies.id', 'orders.company_id')
                ->join('order_details', 'order_details.order_id', 'orders.id')
                ->join('company_agents', 'orders.company_agent_id', 'company_agents.id')
                ->selectRaw('company_agents.agentName aname, orders.status status, companies.companyName company,orders.id `order`, orders.created_at created_at, SUM(order_details.transmissionQuantity) total_transmissions')
                ->where('orders.company_id', $request->id)
                ->groupByRaw('1,2,3,4')
                ->get();
            return response()->json(['data' => $orders]);
        }
    }
}
