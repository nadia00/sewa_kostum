<?php

namespace App\Http\Controllers;

use App\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){
        $product_id = $request->product_id;
        $user_id = Auth::user()->id;
        $review_value = $request->rating;
        $shop_id = $request->shop_id;

        $product_review = new ProductReview;
        $product_review->product_id = $product_id;
        $product_review->user_id = $user_id;
        $product_review->shop_id = $shop_id;
        $product_review->review_value = $review_value;

        $product_review->save();

        return redirect()->back();
    }
}
