<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicle_name_id', 'license_plate', 'entry_date_vehicle', 'service_date_vehicle', 'service_month_vehicle', 'is_service', 'status_vehicle'
    ];

    public function vehicleName()
    {
        return $this->belongsTo(VehicleName::class);
    }

    public function userVehicles()
    {
        return $this->hasMany(UserVehicle::class);
    }
}
