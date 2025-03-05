<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;
use App\Models\GasStation;

class Ward extends Model {
    use HasFactory;

    protected $table = 'wards';
    protected $fillable = ['name', 'DistrictId'];

    public function district() {
        return $this->belongsTo(District::class, 'DistrictId', 'id');
    }
    public function gasStation() {
        return $this->hasMany(GasStation::class, 'WardId', 'id');
    }
}