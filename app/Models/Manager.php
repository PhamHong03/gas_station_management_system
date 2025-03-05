<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Manager extends Model {
    use HasFactory;

    protected $table = 'managers';
    protected $fillable = ['name', 'phone', 'email', 'address'];

    public function companies() {
        return $this->hasMany(Company::class, 'ManagerId', 'id');
    }
}