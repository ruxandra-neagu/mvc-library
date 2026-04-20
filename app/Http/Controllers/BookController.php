<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();

        // Filtrare după categorie
        if ($request->category) {
            $query->where('category', $request->category);
        }

        // Căutare după titlu/autor
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('author', 'like', '%' . $request->search . '%');
            });
        }

        $books = $query->paginate(8);
        $categories = Book::distinct()->pluck('category');

        return view('books.index', compact('books', 'categories'));
    }

public function show(Book $book)
{
    $similar = Book::where('category', $book->category)
                ->where('id', '!=', $book->id)
                ->limit(4)
                ->get();

    return view('books.show', compact('book', 'similar'));
}
}