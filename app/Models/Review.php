<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GasStationReview;
use App\Models\User;


class Review extends Model {
    use HasFactory;

    protected $table = 'reviews';
    protected $fillable = ['rating', 'content', 'GasStationId', 'UserId'];


    public function user() {
        return $this->belongsTo(User::class, 'UserId', 'id');
    }
    public function gasStation() {
        return $this->belongsTo(GasStation::class, 'GasStationId', 'id');
    }
}

