<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRightRequest;
use App\Http\Requests\REgRightEditRequest;
use App\Models\Company;
use App\Models\RegistrationRight;
use App\View\Components\RegistrationRightModalComponent;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Morilog\Jalali\Jalalian;

class RegistrationRightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
    public function OldRight($id)
    {
          $regRights=RegistrationRight::join('companies','registration_rights.company_id','companies.id')
          ->select('registration_rights.*','companies.companyName as cname','companies.id as cid')
          ->where('registration_rights.company_id',$id)->where('registration_rights.status',3)->get();
          return view('Registration.oldright',compact(['regRights','id']));
    }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistrationRightRequest $request, $id)
    {


        $filePathFinanceDoc = $request->file('finacnceDocfile')->store(Company::COMPANY_FILE_STORAGE_LOCATION);
        $filePathFinaceRecipt = $request->file('finacnceReciptfile')->store(Company::COMPANY_FILE_STORAGE_LOCATION);
        $regRight = new RegistrationRight();
        $regRight->company_id = $id;
        $regRight->reg_year = $request->startDate;
        $regRight->ExpireREg_Year = $request->ExpireDate;
        $regRight->finance_number = $request->financeNumber;
        $regRight->finance_date = $request->financetDate;
        $regRight->bill_number = $request->billNumber;
        $regRight->recipt_number = $request->reciptNumber;
        $regRight->recipt_date = $request->recipttDate;
        $regRight->total_registration_fee = $request->totalfee;
        $regRight->bank = $request->bank;
        $regRight->finance_document = $filePathFinanceDoc;
        $regRight->finance_recipt = $filePathFinaceRecipt;
        $regRight->save();
        // dd(route('saveRight.company',$regRight->id));
        return response()->json(['success' => route('saveRight.company', $regRight->company_id)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegistrationRight  $registrationRight
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        //$registrationRights=RegistrationRight::with('Company')->where('company_id',$id)->get();
        // $registrationRights=RegistrationRight::all();
        //dd( $registrationRights);
        // dd(Jalalian::now());
        // if()

        // $issueDate = "1401-9-5";
        // dd( Jalalian::now()>$issueDate );
        //$expiryDate = "1401-10-04";
        // dd(Jalalian::fromDateTime(Carbon::createFromDate($expiryDate)));
        // dd(Jalalian::now()->addYears());
        // dd($expiryDate < Jalalian::now());
        // Jalalian::fromDateTime();

        $registrationRightss = RegistrationRight::Join('companies', 'registration_rights.company_id', 'companies.id')
            ->select('registration_rights.*', 'companies.companyName as cname', 'companies.id as cid')
            ->where('registration_rights.company_id', $id)->latest('id')->first();
        // dd($registrationRightss);
        // dd( $registrationRightss->get());

        if ($registrationRightss && $registrationRightss->status == 0 && Jalalian::now()->format('Y-m-d') > Jalalian::fromFormat('Y-m-d', $registrationRightss->ExpireREg_Year)->format('Y-m-d')) {
            $registrationRightss->status = 1;
            $registrationRightss->update();
        }

        $registrationRights = RegistrationRight::Join('companies', 'registration_rights.company_id', 'companies.id')
            ->select('registration_rights.*', 'companies.companyName as cname', 'companies.id as cid')
            ->where('registration_rights.company_id', $id)->whereIn('registration_rights.status', [0, 1])->get();





        return view('Registration.show', compact(['registrationRights', 'id']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegistrationRight  $registrationRight
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regRightEdit = RegistrationRight::find($id);

        return response()->json(['success' => $regRightEdit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegistrationRight  $registrationRight
     * @return \Illuminate\Http\Response
     */

    public function update(REgRightEditRequest  $request, $id)
    {
        $regid = $request->REgID;
        $RegistrationRights = RegistrationRight::find($regid);
        $RegistrationRights->status = 3;
        $RegistrationRights->update();
        //dd($RegistrationRights->get());

        $filePathFinanceDoc = $request->file('finacnceDocfile')->store(Company::COMPANY_FILE_STORAGE_LOCATION);
        $filePathFinaceRecipt = $request->file('finacnceReciptfile')->store(Company::COMPANY_FILE_STORAGE_LOCATION);
        $registrations = new RegistrationRight();
        $registrations->company_id = $id;
        $registrations->reg_year = $request->startDate;
        $registrations->ExpireREg_Year =  $request->ExpireDate;
        $registrations->finance_number = $request->financeNumber;
        $registrations->finance_date = $request->financetDate;
        $registrations->bill_number = $request->billNumber;
        $registrations->recipt_number = $request->reciptNumber;
        $registrations->recipt_date = $request->recipttDate;
        $registrations->total_registration_fee = $request->totalfee;
        $registrations->bank = $request->bank;
        $registrations->status = 0;
        $registrations->finance_document = $filePathFinanceDoc;
        $registrations->finance_recipt = $filePathFinaceRecipt;
        $registrations->save();

        return response()->json(['success' => route('saveRight.company', $id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegistrationRight  $registrationRight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $regestrationsRight = RegistrationRight::find($id);
        $regestrationsRight->delete();
        return response()->json(['success' => route('saveRight.company', $regestrationsRight->company_id)]);
    }
}
