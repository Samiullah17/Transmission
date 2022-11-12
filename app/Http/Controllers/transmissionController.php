<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\companyAgent;
use App\Models\transmission;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\frequencey;
use App\Models\orderDetails;
use App\Models\provence;
use App\Models\transmissionModel;
use App\Models\transmissionType;
class transmissionController extends Controller
{
    public function index()
    {
    }

    public function program()
    {
        $companies = Company::all();
        return view('transmittion.program', compact('companies'));
    }

    public function program1($id){
            $transmissinos=order::join('transmissions','orders.id','transmissions.order_id')
            ->join('transmission_types','transmissions.transmission_type_id','transmission_types.id')
            ->join('transmission_models','transmissions.transmission_model_id','transmission_models.id')
            ->join('provences','transmissions.provence_id','provences.id')
            ->select('transmissions.serialNo as sNo','transmission_types.transmissionTypeName as tname','transmission_models.transmissionModelName as mname',
            'provences.provenceName as pname','transmissions.id as id','transmission_types.rate as rate')->where('orders.id',$id)->get();

            $type=transmissionType::all();


            return response()->json(['orders'=>$transmissinos,'type'=>$type]);
        }


    public function changeRate(Request $request){

        $transmission=transmissionType::where('id',$request->tra)->first();
        

        return response()->json(['rate'=>$request->rate,'tra'=>$request->tra]);
    }

    public function changeStatus(Request $request)
    {
        // dd($request->all());
        if($request->status=='pdone'){
           $data = transmission::where('id', $request->id)->first();
           $data->status = 1;
           $tra=transmissionType::where('id',$data->transmission_type_id)->first()->rate;
           $data->rate=$tra;
           $data->save();
           return response()->json(['rate'=>$tra]);
        }

        else if($request->status=='pnotdone'){

            $data = transmission::where('id', $request->id)->first();
            $data->status = 0;
            $data->save();

        }

        if($request->status=='fails'){
            $data = transmission::where('id', $request->id)->first();
           $data->status = 0;
           $data->save();
        }

        if($request->status=='details'){
            $transmission=transmission::where('id',$request->id)->first()->transmission_type_id;
            $tra=transmissionType::where('id',$transmission)->first();
            $t=transmission::join('transmission_types','transmissions.transmission_type_id','transmission_types.id')
            ->join('transmission_models','transmissions.transmission_model_id','transmission_models.id')
            ->join('provences','transmissions.provence_id','provences.id')
            ->select('transmission_types.transmissionTypeName as tname','transmission_models.transmissionModelName as mname',
            'transmission_types.rate as rate','transmissions.serialNo as sname',
            'provences.provenceName as pname')->where('transmissions.id',$request->id)->first();

            return response()->json(['transmission'=>$t]);

        }
        return response()->json(['status'=>'Status Changed Successfuly']);


    }

    public function saveTransmission(Request $request){
        $order=order::where('company_agent_id',$request->agent_id)->first();

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

    public function addTransmittion_new_transmission(Request $request){
        $order=new order();
        $order->company_id=$request->company_id;
        $order->company_agent_id=$request->agent_id;
        $order->suggestion_file=$request->suggestion_file;
        $order->save();



        $provence=provence::all();
        $transmissionModel=transmissionModel::all();
        $transmissionType=transmissionType::all();
        return view('transmittion.add',compact('provence','transmissionModel','transmissionType','order'));

    }
}
