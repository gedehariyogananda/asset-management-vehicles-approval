<?php

namespace App\Http\Controllers;

use App\Models\UserVehicle;
use App\Models\Vehicle;
use App\Models\VehicleName;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $dataset = VehicleName::with('vehicles')->get();
        return view('vehicles.index', compact('dataset'));
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_vehicle' => 'required',
            'type_vehicle' => 'required',
            'brand_vehicle' => 'required',
            'bbm_vehicle' => 'required',
        ]);

        VehicleName::create($request->all());

        return redirect()->route('vehicles.index')
            ->with('success', 'Vehicle created successfully.');
    }

    public function storeVehicle(Request $request)
    {
        $request->validate([
            'vehicle_name_id' => 'required',
            'license_plate' => 'required',
            'entry_date_vehicle' => 'required',
            'service_month_vehicle' => 'required',
        ]);

        $dateInit = date('Y-m-d', strtotime($request->entry_date_vehicle . ' + ' . $request->service_month_vehicle . ' months'));

        Vehicle::create([
            'vehicle_name_id' => $request->vehicle_name_id,
            'license_plate' => $request->license_plate,
            'entry_date_vehicle' => $request->entry_date_vehicle,
            'service_date_vehicle' => $dateInit,
            'service_month_vehicle' => $request->service_month_vehicle,
            'is_service' => $request->is_service ? true : false,
        ]);

        return back()->with('success', 'Vehicle created successfully.');
    }

    public function show($idVehicle)
    {
        $idVehicleInit = $idVehicle;
        $vehicles = Vehicle::with('userVehicles')->where('vehicle_name_id', $idVehicle)->get();

        return view('vehicles.show', compact('vehicles', 'idVehicleInit'));
    }

    public function history($idVehicle)
    {
        $userVehicles = UserVehicle::with('superior', 'karyawan', 'vehicle', 'driver')->where('vehicle_id', $idVehicle)->where('status', 'approved')->orWhere('status', 'done_borrow')->get();
        return view('vehicles.history', compact('userVehicles'));
    }



    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, $idVehicle)
    {
        $request->validate([
            'name_vehicle' => 'required',
            'type_vehicle' => 'required',
            'brand_vehicle' => 'required',
            'bbm_vehicle' => 'required',
        ]);

        VehicleName::where('id', $idVehicle)->update([
            'name_vehicle' => $request->name_vehicle,
            'type_vehicle' => $request->type_vehicle,
            'brand_vehicle' => $request->brand_vehicle,
            'bbm_vehicle' => $request->bbm_vehicle,
        ]);

        return redirect()->route('vehicles.index')
            ->with('success', 'Vehicle updated successfully');
    }

    public function updateVehicle(Request $request, $idVehicle)
    {

        $request->validate([
            'license_plate' => 'required',
            'entry_date_vehicle' => 'required',
            'service_month_vehicle' => 'required',
        ]);

        $dateInit = date('Y-m-d', strtotime($request->entry_date_vehicle . ' + ' . $request->service_month_vehicle . ' months'));

        Vehicle::where('id', $idVehicle)->update([
            'license_plate' => $request->license_plate,
            'entry_date_vehicle' => $request->entry_date_vehicle,
            'service_date_vehicle' => $dateInit,
            'service_month_vehicle' => $request->service_month_vehicle,
            'is_service' => $request->is_service ? true : false,
        ]);

        return back()->with('success', 'Vehicle updated successfully');
    }

    public function destroy($idVehicle)
    {
        VehicleName::where('id', $idVehicle)->delete();

        return back()->with('success', 'Vehicle deleted successfully');
    }

    public function destroyVehicle($idVehicle)
    {
        Vehicle::where('id', $idVehicle)->delete();

        return back()->with('success', 'Vehicle deleted successfully');
    }

    public function borrow(Request $request, $idVehicle)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        UserVehicle::create([
            'karyawan_id' => auth()->user()->id,
            'driver_id' => 0,
            'vehicle_id' => $idVehicle,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Vehicle borrowed successfully, please wait for approval. u can see details in history page');
    }
}
