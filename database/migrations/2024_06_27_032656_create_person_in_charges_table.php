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
        Schema::create('person_in_charges', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('name');
            $table->string('phone_number');
            $table->enum('sector', ['BOOK_SERVICE', 'VISIT_SERVICE', 'PICK_UP', 'FOOD_ORDER', 'FREE_DRINK', 'ICE_CREAM', 'USED_CAR', 'SPAREPART']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('person_in_charges');
    }
};
