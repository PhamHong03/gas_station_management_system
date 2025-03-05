<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\FuelType;

class Price extends Model {
    use HasFactory;

    protected $table = 'prices';
    protected $fillable = ['price', 'start_date', 'CompanyId', 'FuelTypeId'];

    public function company() {
        return $this->belongsTo(Company::class, 'CompanyId', 'id');
    }
    public function fuelType() {
        return $this->belongsTo(FuelType::class, 'FuelTypeId', 'id');
    }
}
