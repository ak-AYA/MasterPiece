<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Review;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function index()
    {
        
        $reviews = Review::with(['user', 'provider'])->get();
        $users = User::all(); 
        $providers = Provider::all(); 
        
        return view('admin.review.index', compact('reviews', 'users', 'providers'));
    }

  
    public function update(Request $request)
    {
        
        $review = Review::find($request->id);
        
        if (!$review) {
            return redirect()->back()->with('error', 'Review not found!');
        }

        
        $review->is_approved = $request->is_approved;
        $review->save();

        return redirect()->route('admin.reviews')->with('success', 'Review status updated successfully!');
    }
}
