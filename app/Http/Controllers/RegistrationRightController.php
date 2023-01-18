<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRightRequest;
use App\Http\Requests\REgRightEditRequest;
use App\Models\Company;
use App\Models\RegistrationRight;
use Illuminate\Http\Request;
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
        $regRights = RegistrationRight::join('companies', 'registration_rights.company_id', 'companies.id')
            ->select('registration_rights.*', 'companies.companyName as cname', 'companies.id as cid')
            ->where('registration_rights.company_id', $id)->where('registration_rights.status', 3)->get();
        return view('Registration.oldright', compact(['regRights', 'id']));
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




        $registrationRightss = RegistrationRight::Join('companies', 'registration_rights.company_id', 'companies.id')
            ->select('registration_rights.*', 'companies.companyName as cname', 'companies.id as cid')
            ->where('registration_rights.company_id', $id)->latest('id')->first();


        if ($registrationRightss && $registrationRightss->status == 0 && Jalalian::now()->format('Y-m-d') > Jalalian::fromFormat('Y-m-d', $registrationRightss->ExpireREg_year)->format('Y-m-d')) {
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
    public function print($id)
    {

        //    $invoiceItems=invoice_item::with('purchase','good.good_Cetegory','good.good_unit','good.goodType','good.stock')->where('purchase_id',$id)->get();
        $registrationRights = RegistrationRight::Join('companies', 'registration_rights.company_id', 'companies.id')
            ->select('registration_rights.*', 'companies.companyName as cname','companies.company_unique_id as CUID', 'companies.id as cid')
            ->where('registration_rights.id', $id)->whereIn('registration_rights.status', [0])->first();
           $billDate=Jalalian::now()->format('Y-m-d');
        $fileName = 'orderReports.pdf';
        $mpdf = new \Mpdf\Mpdf(['mode' => 'UTF-8','format' => [100, 236], 'autoScriptToLang' => true, 'autoLangToFont' => true]);
       
        $mpdf->allow_charset_conversion = true;
        $mpdf->SetDirectionality('rtl');


        //return view('test',compact("employee",'employees'));

        //    $html = view('invoice.print', compact('invoiceItems'))->render();
        $html = view('Registration.Rightprint',compact('registrationRights','billDate'))->render();
        $mpdf->WriteHTML("");
        $mpdf->WriteHTML($html);
        $mpdf->SetFont('freeserif', '', 10);
        $mpdf->Output($fileName, 'I');
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
