<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        return view('change_password');
    }
    public function update(User $user) {
        $data = request()->validate([
            'current_password' => ['required','confirmed'],
            'password' => ['required'],
            'password_confirmation' => ['required'],
        ]);

        if(!Hash::check($data['current_password'],$user->password)) {
            return redirect()->back()->with('error', 'Current password incorrect');
        }

        $user->update([
            'password' => Hash::make($data['password'])
        ]);

        return redirect()->back()->with('success', 'Password changed successfully');

    }
}
