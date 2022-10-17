<?php

namespace App\Http\Controllers;

use App\Models\Helmet;
use Illuminate\Http\Request;

class HelmetController extends Controller
{
    public function index($miner)
    {
        $data = Helmet::query()->where('miner_id',$miner)->latest('id')->first();
        if($data) {
            return view('miner_data', [
                'minerData' => $data,
                'miner' => $miner
            ]);
        }
        return redirect()->route('dashboard')->with('error', 'There is no data for this miner');
    }

    public function add()
    {
        return view('add_miner');
    }

    public function ajax($miner) {
        $data = Helmet::query()->where('miner_id',$miner)->latest('id')->first();

        return response()->json($data);
    }

    public function deviceData(Request $request) {
       Helmet::create([
        'miner_id' => $request->miner,
        'carbon_doixide'=> $request->carbon_dioxide,
        'carbon_monoxide'=> $request->carbon_monoxide,
        'helmet_temperature'=> $request->temperature,
        'helmet_humidity'=> $request->humidity,
        'helmet_alert'=> $request->alert,
       ]);

       echo "Data Added";
    }
}
