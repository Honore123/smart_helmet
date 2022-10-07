<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function index()
    {
        return view('site_data', [
            "siteData" => Station::query()->latest('id')->first(),
        ]);
    }

    public function deviceData(Request $request)
    {
        Station::create([
         'carbon_doixide'=> $request->carbon_dioxide,
         'carbon_monoxide'=> $request->carbon_monoxide,
         'helmet_temperature'=> $request->temperature,
         'helmet_humidity'=> $request->humidity,
        ]);
 
        echo "Data Added";
    }
}
