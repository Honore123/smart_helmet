<?php

namespace App\Http\Controllers;

use App\Models\Miner;
use Illuminate\Http\Request;

class MinerController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'miners' => Miner::all()
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

        Miner::create($data);

        return redirect()->route('dashboard')->with('success', 'Miner Added Successfully!');
    }

    public function edit(Miner $miner)
    {
        return view('edit_miner', [
            'miner' => $miner,
        ]);
    }

    public function update(Miner $miner)
    {
        $data = request()->validate([
            'firstname'=>['string','required'],
            'lastname'=>['string','required'],
            'email'=>['email','required'],
            'phone_number'=>['required'],
        ]);
        $miner->update($data);

        return redirect()->route('dashboard')->with('success', 'Miner Updated Successfully!');
    }
}
