<?php

namespace App\Http\Controllers;

use App\Http\Requests\companyFineReqeuest;
use App\Models\Company;
use App\Models\CompanyFine;
use Illuminate\Http\Request;

class CompanyFineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(companyFineReqeuest $request,$id)
    {
        $filePathFinanceDoc = $request->file('finacncefile')->store(Company::COMPANY_FILE_STORAGE_LOCATION);
        $filePathFinaceRecipt = $request->file('finacnceReciptfile')->store(Company::COMPANY_FILE_STORAGE_LOCATION);
        $fines=new CompanyFine();
        $fines->frequencey_id =$request->frequency;
        $fines->fine_date=$request->startDate;
        $fines->number_of_days=$request->FineDays;
        $fines->fine_fee = $request->totalFinefee;
        $fines->finance_fine_number=$request->financeNumber;
        $fines->finace_fine_date=$request->financetDate;
        $fines->fine_bill_number=$request->billNumber;
        $fines->fine_recipt_date=$request->recipttDate;
        $fines->fine_recipt_number= $request->reciptNumber;
        $fines->bank=$request->bank;
        $fines->fine_finance_document= $filePathFinanceDoc;
        $fines->fine_finance_recipt	=  $filePathFinaceRecipt;
        $fines->save();
        // dd(route('saveRight.company',$regRight->id));
        return response()->json(['success'=>route('fine.company',$id)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyFine  $companyFine
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companies=Company::join('orders','companies.id','orders.company_id')
        ->join('frequenceys','orders.id','frequenceys.order_id')
        ->join('provences','frequenceys.provence_id','provences.id')
        ->select('provences.*')->where('companies.id',$id)->groupBy('frequenceys.provence_id')->get();

        $companyfines=CompanyFine::Join('frequenceys','company_fines.frequencey_id','frequenceys.id')
        ->Join('orders','frequenceys.order_id','orders.id')
        ->join('provences','frequenceys.provence_id','provences.id')
        ->join('companies','orders.company_id','companies.id')
        ->select('company_fines.*','companies.companyName as cname','provences.provenceName as pname')
        ->where('orders.company_id',$id)->get();
        return view('Fine.show',compact('companyfines','companies','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyFine  $companyFine
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fines= CompanyFine::find($id);
        return response()->json(['success' => $fines]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyFine  $companyFine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $FineID=$request->ComFineId;
        $fines=CompanyFine::find($FineID);
        
        if( $request->finacncefile!=null)
        {
            $filePathFinanceDoc = $request->file('finacncefile')->store(Company::COMPANY_FILE_STORAGE_LOCATION);
            $fines->fine_finance_document=$filePathFinanceDoc;
        }
        if($request->finacnceReciptfile!=null){
            $filePathFinaceRecipt = $request->file('finacnceReciptfile')->store(Company::COMPANY_FILE_STORAGE_LOCATION);
            $fines->fine_finance_recipt= $filePathFinaceRecipt;
        }

        
        $fines->frequencey_id =$request->frequency;
        $fines->fine_date=$request->startDate;
        $fines->number_of_days=$request->FineDays;
        $fines->fine_fee = $request->totalFinefee;
        $fines->finance_fine_number=$request->financeNumber;
        $fines->finace_fine_date=$request->financetDate;
        $fines->fine_bill_number=$request->billNumber;
        $fines->fine_recipt_date=$request->recipttDate;
        $fines->fine_recipt_number= $request->reciptNumber;
        $fines->bank=$request->bank;
        $fines->update();
        return response()->json(['success'=>route('fine.company',$id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyFine  $companyFine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fines=CompanyFine::find($id);
        $fines->delete();
        return response()->json(['success'=>'deleted']);
    }
}
