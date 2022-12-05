<?php

namespace App\Http\Controllers;

use App\Http\Requests\LicenseExtensionRequest;
use App\Models\Company;
use App\Models\frequencey;
use App\Models\LicenseExtension;
use App\Models\order;
use App\Models\provence;
use Illuminate\Http\Request;

class LicenseExtensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(LicenseExtensionRequest $request, $id)
    {
        $licenseExt = new LicenseExtension();
        $licenseExt->frequencey_id = $request->frequency;
        $licenseExt->finance_recipt = $request->reciptNumber;
        $licenseExt->coming_date = $request->startDate;
        $licenseExt->licence_expiry_date = $request->frequenceyEndDate;
        $licenseExt->valid_upto = $request->ExtensionDate;
        $licenseExt->extension_doc_number = $request->reciptNumber;
        $licenseExt->extension_doc_date = $request->ExtensionDocDate;
        $licenseExt->save();
        return response()->json(['success' => route('licence.company', $id)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LicenseExtension  $licenseExtension
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $licensextesions=LicenseExtension::with('frequency','frequency.order')->where('company_id',$id)->get();
        // dd($licensextesions);
        $companies = Company::join('orders', 'companies.id', 'orders.company_id')
            ->join('frequenceys', 'orders.id', 'frequenceys.order_id')
            ->join('provences', 'provences.id', 'frequenceys.provence_id')
            ->select('provences.*')->where('companies.id', $id)->groupBy('frequenceys.provence_id')->get();
        // dd($companies);
        // selectRaw('provences.id provence_id,provences.provenceName province_name,orders.id as order_id')
        //$provinces = $companies->pluck('provence_id')->toArray();
       // $orders = $companies->pluck('order_id')->toArray();
        // dd($orders,$provinces);

       // $frequencies = frequencey::whereIn('provence_id',$provinces)->whereIn('order_id',$orders)->get();
        //dd($frequencies);


        $licenseExtensions = LicenseExtension::Join('frequenceys', 'license_extensions.frequencey_id', 'frequenceys.id')
            ->Join('orders', 'frequenceys.order_id', 'orders.id')
            ->join('provences', 'frequenceys.provence_id', 'provences.id')
            ->join('companies', 'orders.company_id', 'companies.id')
            ->select(
                'license_extensions.*',

                'frequenceys.frequenceyNo as frname',
                'frequenceys.provence_id as pId',
                'companies.companyName as cname',
                'provences.provenceName as pname'
            )
            ->where('orders.company_id', $id)
            ->get();
        //$frequencies=LicenseExtension::join('frequenceys','license_extensions.frequencey_id','frequenceys.id');
        // dd($licenseExtensions);


        return view('LicenseExtension.show', compact('licenseExtensions', 'companies', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LicenseExtension  $licenseExtension
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $licenseExtensions = LicenseExtension::find($id);
        return response()->json(['success' => $licenseExtensions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LicenseExtension  $licenseExtension
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $licExtId = $request->licenseExtId;

        $licenseExtensions = LicenseExtension::find($licExtId);
        $licenseExtensions->frequencey_id = $request->Extfrequency;
        $licenseExtensions->finance_recipt =  $request->financeNumber;
        $licenseExtensions->coming_date =  $request->startDate;
        $licenseExtensions->licence_expiry_date =  $request->frequenceyEndDate;
        $licenseExtensions->valid_upto =  $request->ExtensionDate;
        $licenseExtensions->extension_doc_number =  $request->reciptNumber;
        $licenseExtensions->extension_doc_date =  $request->ExtensionDocDate;
        $licenseExtensions->update();
        return response()->json(['success' => route('licence.company', $id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LicenseExtension  $licenseExtension
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $liceseExts = LicenseExtension::find($id);
        if (!$liceseExts) return response()->json(['success' => $id]);

        $liceseExts->delete();
        return response()->json(['success' => $id]);
    }
    public function frequencySearch($provinceId, $companyId)
    {

        $frequencies = order::join('frequenceys', 'orders.id', 'frequenceys.order_id')->select('frequenceys.id', 'frequenceys.frequenceyNo')
            ->where('frequenceys.provence_id', $provinceId)->where('orders.company_id', $companyId)->get();

        // $frequencies = frequencey::join('provences', 'frequenceys.provence_id', 'provences.id')
        //     ->select('frequenceys.*')->where('frequenceys.provence_id', $id)->get();

        return response()->json(['success' => $frequencies]);
    }
}
