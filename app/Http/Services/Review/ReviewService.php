<?php
namespace App\Http\Services\Review;

use App\Models\Review;
use Request;

class ReviewService{
    public function store(Request $request,$id){
        $review = new Review();
        $review->fill($request->all());
        $review->UserId = $id;
        if($review->save()){
            return true;
        }
        return redirect()->back()->with('message', 'Không thể đáng giá');
    }
}
