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
}
