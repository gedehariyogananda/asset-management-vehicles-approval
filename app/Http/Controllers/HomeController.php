<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserVehicle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $dataset = UserVehicle::with('vehicle')
            ->get()
            ->groupBy('vehicle.name')
            ->map(function ($item) {
                return $item->count();
            });

        $vehicleNames = $dataset->keys();
        $borrowCounts = $dataset->values();

        return view('home', compact('vehicleNames', 'borrowCounts'));
    }
}
