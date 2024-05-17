<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleName extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_vehicle', 'type_vehicle', 'brand_vehicle', 'bbm_vehicle'
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
