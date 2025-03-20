<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->decimal('price', 10, 2);
            $table->date('start_date');
            $table->unsignedInteger('FuelTypeId');
            $table->unsignedInteger('CompanyId');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('prices');
    }
};
