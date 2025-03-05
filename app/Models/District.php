<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\Ward;

class District extends Model {
    use HasFactory;

    protected $table = 'districts';
    protected $fillable = ['name', 'CityId'];

    public function city() {
        return $this->belongsTo(City::class, 'CityId', 'id');
    }
    public function wards() {
        return $this->hasMany(Ward::class, 'DistrictId', 'id');
    }
}

