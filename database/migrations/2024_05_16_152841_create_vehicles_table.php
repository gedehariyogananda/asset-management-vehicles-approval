<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_name_id')->constrained('vehicle_names')->cascadeOnDelete();
            $table->string('license_plate');
            $table->date('entry_date_vehicle');
            $table->date('service_date_vehicle');
            $table->integer('service_month_vehicle');
            $table->boolean('is_service')->default(false);
            $table->enum('status_vehicle', ['available', 'borrowed'])->default('available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
