<?php

namespace App\Http\Controllers;

use App\Http\Requests\LicenseExtensionRequest;
use App\Models\Company;
use App\Models\frequencey;
use App\Models\LicenseExtension;
use App\Models\order;
use App\Models\provence;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class LicenseExtensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
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
            ->where('orders.company_id', $id)->whereIn('license_extensions.status', [3])
            ->get();
        //$frequencies=LicenseExtension::join('frequenceys','license_extensions.frequencey_id','frequenceys.id');
        // dd($licenseExtensions);


        return view('LicenseExtension.OldExt', compact('licenseExtensions','id'));
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
        
        $companies = Company::join('orders', 'companies.id', 'orders.company_id')
            ->join('frequenceys', 'orders.id', 'frequenceys.order_id')
            ->join('provences', 'provences.id', 'frequenceys.provence_id')
            ->select('provences.*')->where('companies.id', $id)->groupBy('frequenceys.provence_id')->get();


        $licenseExtensionss = LicenseExtension::Join('frequenceys', 'license_extensions.frequencey_id', 'frequenceys.id')
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
        foreach ($licenseExtensionss as $licenseExtension) {
            if (($licenseExtension->status == 0 || $licenseExtension->status == 1) && Jalalian::now()->format('Y-m-d') > Jalalian::fromFormat('Y-m-d', $licenseExtension->valid_upto)->format('Y-m-d')) {
                $licenseExtension->status = 1;
                $licenseExtension->update();
            }
        }


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
            ->where('orders.company_id', $id)->whereIn('license_extensions.status', [0, 1, 2])
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
        $licensExtension = LicenseExtension::find($id);
        $frequencyid = $licensExtension->frequencey_id;
        $licextenId =$licensExtension->id;
        $proviceid = LicenseExtension::join('frequenceys', 'license_extensions.frequencey_id', 'frequenceys.id')
            ->select('frequenceys.provence_id  as PID', 'frequenceys.frequenceyNo as freqNO')->where('license_extensions.frequencey_id', $frequencyid)->get();

        return response()->json(['frequencyID' => $frequencyid, 'provinceID' => $proviceid, 'licextenId' => $licextenId]);
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
        $licenseExtensions->status=3;
        $licenseExtensions->update();
        
        $licenseExtCreate= new LicenseExtension();
        $licenseExtCreate->frequencey_id = $request->extEditfrequencyid;
        $licenseExtCreate->finance_recipt =  $request->reciptNumber;
        $licenseExtCreate->coming_date =  $request->startDate;
        $licenseExtCreate->licence_expiry_date =  $request->frequenceyEndDate;
        $licenseExtCreate->valid_upto =  $request->ExtensionDate;
        $licenseExtCreate->status=0;
        $licenseExtCreate->extension_doc_number =  $request->reciptNumber;
        $licenseExtCreate->extension_doc_date =  $request->ExtensionDocDate;
        $licenseExtCreate->save();
        return response()->json(['success' => route('licence.company', $id)]);
    }
    public function Fine($id)
    {

        $licenseFine = LicenseExtension::find($id);
        $frequencyid =  $licenseFine->frequencey_id;
        $licextenId = $licenseFine->id;
        $proviceid = LicenseExtension::join('frequenceys', 'license_extensions.frequencey_id', 'frequenceys.id')
            ->select('frequenceys.provence_id  as PID', 'frequenceys.frequenceyNo as freqNO')->where('license_extensions.frequencey_id', $frequencyid)->get();

        return response()->json(['frequencyID' => $frequencyid, 'provinceID' => $proviceid, 'licextenId' => $licextenId]);
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
