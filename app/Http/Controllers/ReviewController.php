<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // Store a new review
    public function store(Request $request, Product $product)
    {
        // Validate the request input
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        // Create a new review
        Review::create([
            'user_id' => Auth::id(), // Assuming the user is logged in
            'product_id' => $product->id,
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('products.show', $product->id)->with('success', 'Review submitted successfully!');
    }

    // Optionally, add more methods if you want to allow updating or deleting reviews
    public function update(Request $request, Review $review)
    {
        $this->authorize('update', $review); // Ensure user owns the review

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review->update([
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('products.show', $review->product_id)->with('success', 'Review updated successfully!');
    }

    public function destroy(Review $review)
    {
        $this->authorize('delete', $review); // Ensure user
