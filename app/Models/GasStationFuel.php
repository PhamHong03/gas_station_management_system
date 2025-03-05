<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GasStation;
use App\Models\FuelType;

class GasStationFuel extends Model
{
    use HasFactory;
    protected $table = 'gastation_fuel_type';
    protected $fillable = ['GasStationId', 'FuelTypeId'];

    public function gasStation() {
        return $this->belongsTo(GasStation::class, 'GasStationId', 'id');
    }
    public function fuelType() {
        return $this->belongsTo(FuelType::class, 'FuelTypeId', 'id');
    }
}
