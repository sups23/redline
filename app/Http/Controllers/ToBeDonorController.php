<?php

namespace App\Http\Controllers;

use App\Models\ToBeDonors;
use Illuminate\Http\Request;

class ToBeDonorController extends Controller
{
    public function store(Request $request){
        
        $data = $request->all();

        $toBeDonor = new ToBeDonors();
        $toBeDonor->name = $data['name'];
        $toBeDonor->address = $data['address'];
        $toBeDonor->contact = $data['contact'];
        $toBeDonor->age = $data['age'];
        $toBeDonor->gender = $data['gender'];
        $toBeDonor->bloodgroup = $data['bloodgroup'];

        $toBeDonor->save();

        return redirect()->route('pages.live_update');
    }
}
