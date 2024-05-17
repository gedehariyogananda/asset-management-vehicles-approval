<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\User;
use App\Models\UserVehicle;
use App\Models\Vehicle;
use App\Models\VehicleName;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => "admin1",
            'email' => "admin@gmail.com",
            'password' => "$2y$10$8P2sLWqZf/qfWEoFKOhENugQSpwFxurctvBxCOqAAlkHx0iDwUuHC",
            'role' => 'admin',
            'position' => 'IT Admin'
        ]);

        User::create([
            'name' => "Pegawai1",
            'email' => "pegawai@gmail.com",
            'password' => "$2y$10$8P2sLWqZf/qfWEoFKOhENugQSpwFxurctvBxCOqAAlkHx0iDwUuHC",
            'role' => 'pegawai',
            'position' => 'Marketing'
        ]);

        User::create([
            'name' => "Pegawai2",
            'email' => "pegawai2@gmail.com",
            'password' => "$2y$10$8P2sLWqZf/qfWEoFKOhENugQSpwFxurctvBxCOqAAlkHx0iDwUuHC",
            'role' => 'pegawai',
            'position' => 'Sales'
        ]);

        User::create([
            'name' => "Superior1",
            'email' => "superior@gmail.com",
            'password' => "$2y$10$8P2sLWqZf/qfWEoFKOhENugQSpwFxurctvBxCOqAAlkHx0iDwUuHC",
            'role' => 'superior',
            'position' => 'Manager'
        ]);

        User::create([
            'name' => "Superior2",
            'email' => "superior2@gmail.com",
            'password' => "$2y$10$8P2sLWqZf/qfWEoFKOhENugQSpwFxurctvBxCOqAAlkHx0iDwUuHC",
            'role' => 'superior',
            'position' => 'Manager'
        ]);

        VehicleName::create([
            'name_vehicle' => 'Avanza 2023',
            'type_vehicle' => 'Mobil Angkutan Orang',
            'brand_vehicle' => 'Toyota',
            'bbm_vehicle' => '12,6'
        ]);

        VehicleName::create([
            'name_vehicle' => 'Xpander 2023',
            'type_vehicle' => 'Mobil Angkutan Orang',
            'brand_vehicle' => 'Mitsubishi',
            'bbm_vehicle' => '12,6'
        ]);

        VehicleName::create([
            'name_vehicle' => 'Elf 4WD',
            'type_vehicle' => 'Mobil Angkutan Orang',
            'brand_vehicle' => 'Mitsubishi',
            'bbm_vehicle' => '12,6'
        ]);

        VehicleName::create([
            'name_vehicle' => 'Pickup L300',
            'type_vehicle' => 'Mobil Angkutan Barang',
            'brand_vehicle' => 'Toyota',
            'bbm_vehicle' => '20,6'
        ]);

        VehicleName::create([
            'name_vehicle' => 'Hino 725C',
            'type_vehicle' => 'Mobil Angkutan Barang',
            'brand_vehicle' => 'Hino',
            'bbm_vehicle' => '20,6'
        ]);

        VehicleName::create([
            'name_vehicle' => 'BMW COSTA 1',
            'type_vehicle' => 'Mobil Sewa',
            'brand_vehicle' => 'BMW',
            'bbm_vehicle' => '12,6'
        ]);

        Vehicle::create([
            'vehicle_name_id' => 1,
            'license_plate' => 'A 1234 ABC',
            'entry_date_vehicle' => '2024-05-16',
            'service_date_vehicle' => '2024-06-16',
            'service_month_vehicle' => 1,
            'is_service' => false,
            'status_vehicle' => 'borrowed'
        ]);

        Vehicle::create([
            'vehicle_name_id' => 1,
            'license_plate' => 'B 123 ABC',
            'entry_date_vehicle' => '2024-05-16',
            'service_date_vehicle' => '2024-06-16',
            'service_month_vehicle' => 1,
            'is_service' => false,
            'status_vehicle' => 'available'
        ]);

        Vehicle::create([
            'vehicle_name_id' => 2,
            'license_plate' => 'C 123 ABC',
            'entry_date_vehicle' => '2024-05-16',
            'service_date_vehicle' => '2024-06-16',
            'service_month_vehicle' => 1,
            'is_service' => false,
            'status_vehicle' => 'available'
        ]);

        Vehicle::create([
            'vehicle_name_id' => 2,
            'license_plate' => 'D 123 ABC',
            'entry_date_vehicle' => '2024-05-16',
            'service_date_vehicle' => '2024-06-16',
            'service_month_vehicle' => 1,
            'is_service' => false,
            'status_vehicle' => 'available'
        ]);

        Vehicle::create([
            'vehicle_name_id' => 3,
            'license_plate' => 'E 123 ABC',
            'entry_date_vehicle' => '2024-05-16',
            'service_date_vehicle' => '2024-06-16',
            'service_month_vehicle' => 1,
            'is_service' => false,
            'status_vehicle' => 'available'
        ]);

        Vehicle::create([
            'vehicle_name_id' => 4,
            'license_plate' => 'G 123 ABC',
            'entry_date_vehicle' => '2024-05-16',
            'service_date_vehicle' => '2024-06-16',
            'service_month_vehicle' => 1,
            'is_service' => false,
            'status_vehicle' => 'available'
        ]);

        Vehicle::create([
            'vehicle_name_id' => 4,
            'license_plate' => 'H 123 ABC',
            'entry_date_vehicle' => '2024-05-16',
            'service_date_vehicle' => '2024-06-16',
            'service_month_vehicle' => 1,
            'is_service' => false,
            'status_vehicle' => 'available'
        ]);

        Vehicle::create([
            'vehicle_name_id' => 5,
            'license_plate' => 'I 123 ABC',
            'entry_date_vehicle' => '2024-05-16',
            'service_date_vehicle' => '2024-06-16',
            'service_month_vehicle' => 1,
            'is_service' => false,
            'status_vehicle' => 'available'
        ]);

        Vehicle::create([
            'vehicle_name_id' => 5,
            'license_plate' => 'J 123 ABC',
            'entry_date_vehicle' => '2024-05-16',
            'service_date_vehicle' => '2024-06-16',
            'service_month_vehicle' => 1,
            'is_service' => false,
            'status_vehicle' => 'available'
        ]);

        Vehicle::create([
            'vehicle_name_id' => 6,
            'license_plate' => 'K 123 ABC',
            'entry_date_vehicle' => '2024-05-16',
            'service_date_vehicle' => '2024-06-16',
            'service_month_vehicle' => 1,
            'is_service' => false,
            'status_vehicle' => 'available'
        ]);

        Vehicle::create([
            'vehicle_name_id' => 6,
            'license_plate' => 'L 123 ABC',
            'entry_date_vehicle' => '2024-05-16',
            'service_date_vehicle' => '2024-06-16',
            'service_month_vehicle' => 1,
            'is_service' => false,
            'status_vehicle' => 'available'
        ]);

        Driver::create([
            'name_driver' => 'Budi'
        ]);

        Driver::create([
            'name_driver' => 'Joko'
        ]);

        Driver::create([
            'name_driver' => 'Susi'
        ]);

        Driver::create([
            'name_driver' => 'Rudi'
        ]);

        Driver::create([
            'name_driver' => 'Rina'
        ]);

        Driver::create([
            'name_driver' => 'Roni'
        ]);

        Driver::create([
            'name_driver' => 'Rina'
        ]);

        Driver::create([
            'name_driver' => 'Roni'
        ]);

        UserVehicle::create([
            'karyawan_id' => 2,
            'superior_id' => 4,
            'vehicle_id' => 1,
            'start_date' => '2024-05-16',
            'end_date' => '2024-05-17',
            'status' => 'approved',
            'notes' => 'Pulang Kampung',
            'driver_id' => 1,
        ]);

        UserVehicle::create([
            'karyawan_id' => 3,
            'superior_id' => 4,
            'vehicle_id' => 2,
            'start_date' => '2024-04-16',
            'end_date' => '2024-04-17',
            'status' => 'approved',
            'notes' => 'Pulang Kampung',
            'driver_id' => 2,
        ]);

        UserVehicle::create([
            'karyawan_id' => 3,
            'superior_id' => 4,
            'vehicle_id' => 4,
            'start_date' => '2024-03-16',
            'end_date' => '2024-03-17',
            'status' => 'approved',
            'notes' => 'Pulang Kampung',
            'driver_id' => 2,
        ]);

        UserVehicle::create([
            'karyawan_id' => 3,
            'superior_id' => 4,
            'vehicle_id' => 5,
            'start_date' => '2024-03-16',
            'end_date' => '2024-03-17',
            'status' => 'approved',
            'notes' => 'Pulang Kampung',
            'driver_id' => 3,
        ]);
    }
}
