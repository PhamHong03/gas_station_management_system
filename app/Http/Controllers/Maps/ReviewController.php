<?php
namespace App\Http\Controllers\Maps;

use App\Http\Controllers\Controller;
use App\Http\Services\Review\ReviewService;
use Request;

class ReviewController extends Controller{
    private $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        return $this->reviewService = $reviewService;
    }
    public function store(Request $request, $id){
        $this->reviewService->store($request,$id);
        return redirect()->back()->with('message', 'Thêm đánh giá thành công');
    }

}
