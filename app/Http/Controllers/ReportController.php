<?php

namespace App\Http\Controllers;

use App\Models\Helmet;
use App\Models\Station;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        return view('report', [
            'miners' => User::query()->where('user_type', 'miner')->get(),
        ]);
    }

    public function report(){
        $report = request()->validate([
            'report_type' => ['required'],
            'startDate' => ['required'],
            'endDate' => ['required'],
        ]);
        if($report['report_type'] == 'site') {
            return view('report', [
                'miners' => User::query()->where('user_type', 'miner')->get(),
                'report' => $report['report_type'],
                'start_date' => $report['startDate'],
                'end_date' => $report['endDate'],
                'datas' => Station::query()->where('created_at', '>=',$report['startDate'])->where('created_at', '<=',$report['endDate'])->get(),
            ])->with('success', 'Report fetched successfully');

        } else {
            return view('report', [
                'miners' => User::query()->where('user_type', 'miner')->get(),
                'report' => $report['report_type'],
                'start_date' => $report['startDate'],
                'end_date' => $report['endDate'],
                'datas' => Helmet::query()->where('id',$report['report_type'])->where('created_at', '>=',$report['startDate'])->where('created_at', '<=',$report['endDate'])->get(),
            ])->with('success', 'Report fetched successfully');
        } 

    }
}
