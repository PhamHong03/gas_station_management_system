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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('phone', 15);
            $table->decimal('longitude', 10, 7);
            $table->decimal('latitude', 10, 7);
            $table->unsignedInteger('manager_id');
            $table->unsignedInteger('ward_id');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('companies');
    }
};
