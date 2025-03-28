<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;

class City extends Model {
    use HasFactory;

    protected $table = 'cities';
    protected $fillable = ['name'];

    public function districts() {
        return $this->hasMany(District::class, 'CityId', 'id');
    }
}

