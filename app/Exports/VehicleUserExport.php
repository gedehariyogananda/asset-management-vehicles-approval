<?php

namespace App\Exports;

use App\Models\UserVehicle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VehicleUserExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;

    protected $data;

    public function __construct()
    {
        $userVehicles = UserVehicle::with('vehicle.vehicleName', 'karyawan', 'superior', 'driver')->get();

        $this->data = $userVehicles->map(function ($datasUser) {
            return [
                'Nama Karyawan' => $datasUser->karyawan->name,
                'Nama Atasan' => $datasUser->superior ? $datasUser->superior->name : '',
                'Nama Kendaraan' => $datasUser->vehicle->vehicleName->name_vehicle,
                'Plat Nomor' => $datasUser->vehicle->license_plate,
                'Mulai' => $datasUser->start_date,
                'Selesai' => $datasUser->end_date,
                'Status' => $datasUser->status,
                'Catatan' => $datasUser->notes,
                'Driver' => $datasUser->driver ? $datasUser->driver->name : '',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama Karyawan',
            'Nama Atasan',
            'Nama Kendaraan',
            'Plat Nomor',
            'Mulai',
            'Selesai',
            'Status',
            'Catatan',
            'Driver',
        ];
    }

    public function collection()
    {
        return $this->data;
    }
}
