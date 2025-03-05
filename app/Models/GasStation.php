<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\Ward;
use App\Models\Review;
use App\Models\GasStationFuel;

class GasStation extends Model {
    use HasFactory;

    protected $table = 'gas_stations';
    protected $fillable = ['name', 'address', 'phone', 'longitude', 'latitude', 'image', 'operation_time', 'CompanyId', 'WardId'];

    public function company() {
        return $this->belongsTo(Company::class, 'CompanyId', 'id');
    }
    public function ward() {
        return $this->belongsTo(Ward::class, 'WardId', 'id');
    }
    public function review() {
        return $this->hasMany(Review::class, 'GasStationId', 'id');
    }
    public function gasStationFuel() {
        return $this->hasMany(GasStationFuel::class, 'GasStationId', 'id');
    }

}
