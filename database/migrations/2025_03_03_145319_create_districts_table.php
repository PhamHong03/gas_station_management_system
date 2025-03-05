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
        Schema::create('districts', function (Blueprint $table) {
            $table->id('district_id');
            $table->string('name');
            $table->unsignedInteger('city_id');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('districts');
    }
};
