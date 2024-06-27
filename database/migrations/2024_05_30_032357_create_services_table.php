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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('client_car_id');
            $table->date('date');
            $table->time('time');
            $table->enum('type', ['BOOK', 'VISIT']);
            $table->string('vehicle_km');
            $table->string('additional_info');
            $table->string('address');
            $table->double('lat');
            $table->double('long');
            $table->string('service_type');
            $table->enum('status', ['WAITING', 'CONFIRMED', 'CANCELLED', 'DONE']);
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('client_car_id')->references('id')->on('client_cars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
