<?php
namespace App\Http\Services\Review;

use App\Models\Review;
use Request;

class ReviewService{
    public function store(Request $request)
    {
        $review = new Review();
        $review->GasStationId = $request->gas_station_id;
        $review->UserId = auth()->id(); // Lấy UserId của người dùng
        $review->rating = $request->rating;
        $review->content = $request->review;
        $review->save();

        return $review;
    }
}
