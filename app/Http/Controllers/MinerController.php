<?php

namespace App\Http\Controllers;

use App\Models\Miner;
use App\Models\Notify;
use App\Models\User;
use Illuminate\Http\Request;

class MinerController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'miners' => User::query()->where('user_type', 'miner')->get(),
            'notify' => Notify::query()->first(),
        ]);
    }
    public function add()
    {
        return view('add_miner');
    }

    public function store()
    {
        $data = request()->validate([
            'firstname'=>['string','required'],
            'lastname'=>['string','required'],
            'email'=>['email','required'],
            'phone_number'=>['required'],
        ]);
        $data['user_type'] = 'miner';
        $data['name'] = $data['firstname'] . ' ' . $data['lastname'];
        User::create($data);

        return redirect()->route('dashboard')->with('success', 'Miner Added Successfully!');
    }

    public function edit(User $miner)
    {
        return view('edit_miner', [
            'miner' => $miner,
        ]);
    }

    public function update(User $miner)
    {
        $data = request()->validate([
            'firstname'=>['string','required'],
            'lastname'=>['string','required'],
            'email'=>['email','required'],
            'phone_number'=>['required'],
        ]);
        $data['user_type'] = 'miner';
        $data['name'] = $data['firstname'] . ' ' . $data['lastname'];
        $miner->update($data);

        return redirect()->route('dashboard')->with('success', 'Miner Updated Successfully!');
    }
}
