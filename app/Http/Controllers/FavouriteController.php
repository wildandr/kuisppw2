<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function store(Request $request, $book_id)
    {
        $user = Auth::user();
        $book = Book::findOrFail($book_id);

        $user->favouriteBooks()->syncWithoutDetaching([$book_id]);

        return response()->json(['message' => 'Book added to favourites']);
    }

    public function index()
    {
        $user = Auth::user();

        $favouriteBooks = $user->favouriteBooks()->get();

        return view('favourites.index', compact('favouriteBooks'));
    }
}
