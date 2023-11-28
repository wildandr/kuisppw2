<?php

namespace App\Http\Controllers\RatingController;

use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;

class RatingController extends Controller
{
    public function store(Request $request, $book_id)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $rating = Rating::create([
            'user_id' => Auth::id(),
            'book_id' => $book_id,
            'rating' => $validated['rating'],
        ]);

        return response()->json(['message' => 'Rating saved successfully', 'rating' => $rating], 200);
    }

    public function show($book_id)
{
    $book = Book::with('ratings')->findOrFail($book_id);
    $averageRating = $book->ratings()->avg('rating');

    return view('book.detail', compact('book', 'averageRating'));
}
}
