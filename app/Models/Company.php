<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Manager;
use App\Models\GasStation;
use App\Models\Price;

class Company extends Model {
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = ['name', 'address', 'phone', 'longitude', 'latitude', 'UserId' , 'ManagerId'];

    public function manager() {
        return $this->belongsTo(Manager::class, 'ManagerId', 'id');
    }
    public function gasStations() {
        return $this->hasMany(GasStation::class, 'CompanyId', 'id');
    }
    public function price()  {
        return $this->hasMany(Price::class, 'CompanyId', 'id');
    }
    public function user() {
        return $this->belongsTo(User::class, 'UserId', 'id');
    }
}
