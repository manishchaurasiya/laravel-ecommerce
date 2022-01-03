<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function review($product_id, $order_id)
    {
        // dd($pid,$oid);
        return view('review', compact('product_id', 'order_id'));
    }

    public function saveReview(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'rating' => 'required|numeric|between:0,5',
            'review' => 'required',
        ]);

        $reviews = Product::with('Review')->get();
        // dd($reviews->toArray());
        $response = Product_review::updateOrCreate(
            ['product_id' => $request->product_id,
            'order_id' => $request->order_id ],
            ['user_id' => auth()->user()->id,
            'rating' => $request->rating,
            'review' => $request->review,]
        );
        return redirect('/');
    }
}
