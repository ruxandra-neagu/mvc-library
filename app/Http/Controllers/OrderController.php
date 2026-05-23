<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function checkout()
    {
        $cartItems = CartItem::with('book')
            ->where('user_id', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Coșul tău este gol!');
        }

        $total = $cartItems->sum(fn($item) => $item->book->price * $item->quantity);

        return view('orders.checkout', compact('cartItems', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name'      => 'required|string|max:255',
            'phone'          => 'required|string|max:20',
            'address'        => 'required|string|max:255',
            'city'           => 'required|string|max:100',
            'county'         => 'required|string|max:100',
            'postal_code'    => 'required|string|max:10',
            'payment_method' => 'required|in:card,ramburs',
        ]);

        $cartItems = CartItem::with('book')
            ->where('user_id', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Coșul tău este gol!');
        }

        $total = $cartItems->sum(fn($item) => $item->book->price * $item->quantity);

        $order = Order::create([
            'user_id'        => Auth::id(),
            'full_name'      => $request->full_name,
            'phone'          => $request->phone,
            'address'        => $request->address,
            'city'           => $request->city,
            'county'         => $request->county,
            'postal_code'    => $request->postal_code,
            'payment_method' => $request->payment_method,
            'total'          => $total,
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'book_id'  => $item->book_id,
                'quantity' => $item->quantity,
                'price'    => $item->book->price,
            ]);
        }

        // Golește coșul
        CartItem::where('user_id', Auth::id())->delete();
        // Trimite email de confirmare
        try {
            Mail::to(Auth::user()->email)->send(new OrderConfirmation($order));
        } catch (\Exception $e) {
            \Log::error('Email error: ' . $e->getMessage());
        }

        return redirect()->route('orders.confirmation', $order)
            ->with('success', 'Comanda a fost plasată cu succes!');
    }

    public function confirmation(Order $order)
    {
        $order->load('items.book');
        return view('orders.confirmation', compact('order'));
    }

    public function cancel(Order $order)
{
    // Verifică dacă comanda aparține utilizatorului
    if ($order->user_id !== Auth::id()) {
        abort(403);
    }

    // Verifică dacă sunt în primele 15 minute
    if ($order->created_at->diffInMinutes(now()) > 15) {
        return redirect()->route('orders.index')
            ->with('error', 'Comanda nu mai poate fi anulată după 15 minute.');
    }

    // Verifică dacă nu e deja anulată sau livrată
    if (in_array($order->status, ['shipped', 'delivered'])) {
        return redirect()->route('orders.index')
            ->with('error', 'Comanda nu poate fi anulată în acest status.');
    }

    $order->update(['status' => 'cancelled']);

    return redirect()->route('orders.index')
        ->with('success', 'Comanda #' . $order->id . ' a fost anulată.');
}

    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->latest()
            ->get();
        return view('orders.index', compact('orders'));
    }
}