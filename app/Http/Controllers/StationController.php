<?php

namespace App\Http\Controllers;

use App\Models\Notify;
use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function index()
    {
        return view('site_data', [
            "siteData" => Station::query()->latest('id')->first(),
            'notify' => Notify::query()->first(),
        ]);
    }

    public function deviceData(Request $request)
    {
        Station::create([
        'manager_id' => $request->manager,
         'carbon_doixide'=> $request->carbon_dioxide,
         'carbon_monoxide'=> $request->carbon_monoxide,
         'station_temperature'=> $request->temperature,
         'station_humidity'=> $request->humidity,
        ]);

        $notify = Notify::query()->first();
        $notify->update(['status' => $request->alert]);
 
        echo "Data Added";
    }
    public function ajax() {
        $data = Station::query()->latest('id')->first();

        return response()->json($data);
    }
}
