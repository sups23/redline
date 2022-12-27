<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Donor;

class UserController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');

        $users = Donor::where('name', 'like', "%{$search}%")
            ->pluck('name', 'id');

        return response()->json($users);
    }
}
