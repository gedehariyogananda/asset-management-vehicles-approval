<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserVehicle;
use App\Models\VehicleName;
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

        // $datasetCreatedat = UserVehicle::with('vehicle')->select('start_date')->get();

        // $vehicleNames = [];
        // $borrowCounts = [];

        // foreach ($dataset as $data) {
        //     $vehicleName = $data->vehicle->vehicleName->name_vehicle;
        //     if (!in_array($vehicleName, $vehicleNames)) {
        //         array_push($vehicleNames, $vehicleName);
        //         array_push($borrowCounts, 1);
        //     } else {
        //         $key = array_search($vehicleName, $vehicleNames);
        //         $borrowCounts[$key] += 1;
        //     }
        // }

        // foreach ($datasetCreatedat as $dataset) {
        //     $tanggal = date('Y-m-d');
        //     $dataset->start_date = $tanggal;
        // }

        // $dataUserBorrowMonth = [];
        // foreach (range(1, 12) as $month) {
        //     $dataUserBorrowMonth[$month] = UserVehicle::whereMonth('start_date', $month)->count();
        // }

        // // Get all vehicle names with their count, all vehicle, id count null yes null aja 
        // $vehicleNames = VehicleName::withCount('vehicles')->get();

        // return view('home', compact('dataUserBorrowMonth', 'vehicleNames'));

        $vehicleNames = VehicleName::withCount('vehicles')->get()->pluck('name_vehicle');
        $borrowCounts = VehicleName::withCount('vehicles')->get()->pluck('vehicles_count');

        // Data for user borrow per month
        $dataUserBorrowMonth = [];
        foreach (range(1, 12) as $month) {
            $dataUserBorrowMonth[] = UserVehicle::whereMonth('start_date', $month)->count();
        }

        return view('home', compact('vehicleNames', 'borrowCounts', 'dataUserBorrowMonth'));
    }
}
