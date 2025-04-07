<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        try {
            if (!Auth::check()) {
                return response()->json(['success' => false, 'message' => 'Bạn cần đăng nhập để đánh giá!'], 401);
            }

            $request->validate([
                'gasStationId' => 'required|exists:gas_stations,id',
                'rating' => 'required|integer|min:1|max:5',
                'content' => 'required|string|max:500',
            ]);

            $review = Review::create([
                'GasStationId' => $request->gasStationId,
                'UserId' => Auth::id(),
                'rating' => $request->rating,
                'content' => $request->content,
            ]);

            return response()->json(['success' => true, 'message' => 'Đánh giá đã được gửi thành công!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Có lỗi xảy ra: ' . $e->getMessage()], 500);
        }
    }
}
