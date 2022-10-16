<?php

namespace App\Http\Controllers;

use App\Models\Notify;
use Illuminate\Http\Request;

class NotifyController extends Controller
{
    public function index()
    {
        $notification = Notify::query()->first();

        echo $notification->status;
    }
    
    public function sendAlert(Notify $notify)
    {
        $notify->update(['status' => 1]);
        
        return redirect()->back()->with('success', 'Alert sent successfully!');
    }

    public function stopAlert(Notify $notify)
    {
        $notify->update(['status' => 0]);
        
        return redirect()->back()->with('success', 'Alert stopped successfully!');
    }
}
