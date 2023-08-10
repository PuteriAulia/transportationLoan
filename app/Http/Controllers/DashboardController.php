<?php

namespace App\Http\Controllers;

use App\Charts\TransportationUsingChart;
use App\Models\FuelRefil;
use App\Models\Service;
use App\Models\Transportation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(TransportationUsingChart $chart){
        $companyLoc = Auth::user()->employee->companyloc->id;
        $transportation = Transportation::where('company_loc_id',$companyLoc)->where('active','active')->get();
        $countTransportation = count($transportation);

        $comp_loc = Auth::user()->employee->companyloc->id;
        $costService = Service::where('company_loc_id',$comp_loc)->sum('cost');
        $costFuelRefil = FuelRefil::where('company_loc_id',$comp_loc)->sum('cost');

        return view('dashboard',[
            'transport' => $countTransportation,
            'costService'=> $costService,
            'costFuelRefil' => $costFuelRefil,
            'chart'     => $chart->build(),
        ]);
    }
}
