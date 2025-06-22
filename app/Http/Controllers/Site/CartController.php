<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\CartItem;

class CartController extends Controller
{

    public function index()
    {
        $data['cart'] = auth()->user()->cart()->with('items.book')->first();
        return view('Site.cart.cart')->with($data);
    }

    public function add(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'type' => 'required|in:pdf,paper+pdf',
        ]);

        $user = auth()->user();
        $cart = $user->cart;

        if (!auth()->check()) {
            return response()->json([
                'status' => 'error',
                'message' => 'يجب تسجيل الدخول أولاً'
            ], 401);
        }

        $book = Book::findOrFail($request->book_id);

        $price = $request->type === 'pdf'
            ? $book->pdf_price
            : $book->price + $book->pdf_price;

        $existing = $cart->items()->where('book_id', $request->book_id)->where('type', $request->type)->first();


        if ($existing) {
            $existing->quantity += 1;
            $existing->save();
        } else {
            $cart->items()->create([
                'book_id' => $book->id,
                'type' => $request->type,
                'price' => $price,
                'quantity' => 1,
            ]);
        }

        $cart->total_price = $cart->items->sum(function ($item) {
            return $item->price * $item->quantity;
        });
        $cart->save();

        return response()->json([
            'status' => 'success',
            'message' => __('Book added to your cart Successfully')
        ]);
    }

    public function remove(CartItem $item)
    {
        $cart = $item->cart;
        $item->delete();

        $total_price = $cart->items->sum(fn($i) => $i->price * $i->quantity);

        $cart->update(['total_price' => $total_price]);


        return response()->json([
            'status' => 'success',
            'total' => $total_price
        ]);
    }

    public function update(Request $request, CartItem $item)
    {
        if ($request->action === 'inc') {
            $item->quantity += 1;
        } elseif ($request->action === 'dec' && $item->quantity > 1) {
            $item->quantity -= 1;
        }
        $item->save();

        $cart = $item->cart;
        $totalCart = $cart ? $cart->items->sum(fn($i) => $i->price * $i->quantity) : 0;

        if ($cart) {
            $cart->update(['total_price' => $totalCart]);
        }


        return response()->json([
            'quantity' => $item->quantity,
            'total_item' => $item->quantity * $item->price,
            'total_cart' => $totalCart
        ]);
    }

    public function delete_all()
    {
        $cart = auth()->user()->cart;

        // Delete all items
        $cart->items()->delete();

        // Reset total
        $cart->update(['total_price' => 0]);

        return response()->json([
            'status' => 'success',
            'total' => 0,
        ]);
    }

}
