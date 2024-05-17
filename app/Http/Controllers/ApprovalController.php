<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\User;
use App\Models\UserVehicle;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function index()
    {
        $datasetApproval = UserVehicle::with('karyawan', 'vehicle.vehicleName', 'vehicle', 'driver')->get();
        $superiors = User::where('role', 'superior')->get();
        $drivers = Driver::all();
        $datasetApprovalSuperior = UserVehicle::with('karyawan', 'vehicle.vehicleName', 'vehicle', 'driver')->where('superior_id', auth()->user()->id)->get();
        $datasetApprovalPegawai = UserVehicle::with('karyawan', 'vehicle.vehicleName', 'vehicle', 'driver')->where('karyawan_id', auth()->user()->id)->get();
        return view('approvals.index', compact('datasetApproval', 'superiors', 'drivers', 'datasetApprovalSuperior', 'datasetApprovalPegawai'));
    }

    public function updateApproval(Request $request, $id)
    {
        $request->validate([
            'superior_id' => 'required',
        ]);

        UserVehicle::where('id', $id)->update([
            'superior_id' => $request->superior_id,
            'status' => $request->status ? $request->status : 'pending',
            'driver_id' => $request->driver_id
        ]);

        if ($request->status == "already_done") {
            Vehicle::where('id', $request->vehicle_id)->update([
                'status_vehicle' => 'done_borrow',
            ]);
        }

        return back()->with('success', 'Approval updated successfully.');
    }

    public function updateApprovalSuperior(Request $request, $id)
    {

        UserVehicle::where('id', $id)->update([
            'status' => $request->status,
        ]);

        if ($request->status == "approved") {
            $userVehicle = UserVehicle::where('id', $id)->first();
            $userVehicle->vehicle->update([
                'status_vehicle' => 'borrowed',
            ]);
        }

        if ($request->status == "rejected") {
            $userVehicle = UserVehicle::where('id', $id)->first();
            $userVehicle->vehicle->update([
                'status_vehicle' => 'available',
            ]);
        }

        return back()->with('success', 'Approval updated successfully.');
    }
}
