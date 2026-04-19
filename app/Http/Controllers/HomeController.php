<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featured = Book::whereIn('title', [
            'Atomic Habits',
            'Dezumanizat',
            'Psihologia banilor',
            'Tată bogat, tată sărac'
        ])->get();

        return view('home', compact('featured'));
    }
}