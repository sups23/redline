<?php

namespace App\Http\Controllers;

use App\Models\ToBeDonor;
use Illuminate\Http\Request;

class ToBeDonorController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact' => 'required|digits:10',
            'age' => 'required|integer|min:16|max:60',
            'gender' => 'required|in:male,female',
            'bloodgroup' => 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
        ]);
        
        $data = $request->all();

        ToBeDonor::create([
            'name' => $data['name'],
            'address' => $data['address'],
            'contact' => $data['contact'],
            'age' => $data['age'],
            'gender' => $data['gender'],
            'bloodgroup' => $data['bloodgroup'],
        ]);

        return redirect()->route('pages.live_update')->with('success', 'Donor Added.');
    }
}
