<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalActiveCompany =Company::where('status',0)->count();
        $totalDeactiveCompany =Company::where('status',1)->count();
        $totalNonOrders = order::where('status',0)->count();
        $totalOrders = order::count();
        $totalUnProgrameOrder = order::where('status',1)->count();
        // $totalProgramOrder= CarCodr::where('status',Car::UNDER_REPAIR)->count();
        // $totalUNProgramOrder = Balance::where('qty','<',5)->count();
        // $totalCompletedRepairingCars = CarCodr::where('status', Car::COMPLETE)->count();
        // $totalAvailableParts = Balance::sum('qty');
        return view('welcome',compact('totalOrders','totalNonOrders','totalUnProgrameOrder','totalActiveCompany','totalDeactiveCompany'));
    }
}
