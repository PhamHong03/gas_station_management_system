<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GasStationFuel;
use App\Models\Price;

class FuelType extends Model {
    use HasFactory;

    protected $table = 'fuel_types';
    protected $fillable = ['name'];

    public function gasStationFuels() {
        return $this->hasMany(GasStationFuel::class, 'FuelTypeId', 'id');
    }
    public function price() {
        return $this->hasMany(Price::class, 'FuelTypeId', 'id');
    }
}

