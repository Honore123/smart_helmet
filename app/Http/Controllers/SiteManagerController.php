<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiteManagerController extends Controller
{
    public function index() {
        return view('site_manager', [
            'managers' => User::query()->where('user_type', 'manager')->get(),
        ]);
    }

    public function add() {
        return view('add_manager');
    }

    public function store(){
        $data = request()->validate([
            'firstname'=>['string','required'],
            'lastname'=>['string','required'],
            'email'=>['email','required'],
            'phone_number'=>['required'],
        ]);
        $data['user_type'] = 'manager';
        $data['password'] = Hash::make('password');
        $data['name'] = $data['firstname'] . ' ' . $data['lastname'];
        User::create($data);

        return redirect()->route('site.managers')->with('success', 'Manager Added Successfully!');
    }
}
