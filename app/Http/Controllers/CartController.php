<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('book')
            ->where('user_id', Auth::id())
            ->get();

        $total = $cartItems->sum(fn($item) => $item->book->price * $item->quantity);

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Request $request, Book $book)
    {
        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('book_id', $book->id)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'book_id' => $book->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Carte adăugată în coș!');
    }

    public function remove(CartItem $cartItem)
    {
        $cartItem->delete();
        return redirect()->back()->with('success', 'Carte eliminată din coș!');
    }

    public function update(Request $request, CartItem $cartItem)
    {
        $cartItem->update(['quantity' => max(1, $request->quantity)]);
        return redirect()->back()->with('success', 'Coș actualizat!');
    }
}