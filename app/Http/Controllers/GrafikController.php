<?php

namespace App\Http\Controllers;

use App\Models\UserVehicle;
use Illuminate\Http\Request;

class GrafikController extends Controller
{
    public function grafikBorrowVehicleUser()
    {
        $dataset = UserVehicle::with('vehicle')->get();
        return view('dashboard', compact('dataset'));
    }
}
