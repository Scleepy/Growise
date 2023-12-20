<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartItemController extends Controller
{
    public function addToCartOrUpdateQuantity(Request $request)
    {
        if ($request->has('updateQuantity')) {
            return $this->updateQuantity($request);
        } else if($request->has('buyNow')){
            return $this->buyNow($request);
        } else {
            return $this->addToCart($request);
        }
    }

    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->input('product_id'));
        $cartContoller = new CartController();
        $cart = $cartContoller->create();

        $fields = $request->validate([
            'quantity' => 'required|numeric|min:1',
            'notes' => 'nullable|string',
        ]);

        if ($fields['quantity'] > $product->StockQuantity) {
            return redirect()->with('message', 'Out of limit');
        }

        $productData = [
            'Quantity' => $fields['quantity'],
            'ItemNotes' => $fields['notes'],
            'Subtotal' => $product->Price * $fields['quantity'],
            'CartID' => $cart->id,
            'ProductID' => $product->id,
        ];

        CartItem::create($productData);

        $this->updatePrice($cart);

        return back();
    }

    public function buyNow(Request $request){
        $product = Product::findOrFail($request->input('product_id'));
        $cartContoller = new CartController();
        $cart = $cartContoller->create();

        $fields = $request->validate([
            'quantity' => 'required|numeric|min:1',
            'notes' => 'nullable|string',
        ]);

        if ($fields['quantity'] > $product->StockQuantity) {
            return redirect()->with('message', 'Out of limit');
        }

        $productData = [
            'Quantity' => $fields['quantity'],
            'ItemNotes' => $fields['notes'],
            'Subtotal' => $product->Price * $fields['quantity'],
            'CartID' => $cart->id,
            'ProductID' => $product->id,
        ];

        CartItem::create($productData);

        $this->updatePrice($cart);

        return redirect('/cart');
    }

    private function updatePrice(Cart $cart)
    {
        $cartItems = $cart->cartItems;
        $totalPrice = 0;

        foreach ($cartItems as $item) {
            $totalPrice += $item->Subtotal;
        }

        $cart->update([
            'TotalAmount' => $totalPrice,
        ]);
    }

    public function getItemsByCartId()
    {
        $user = Auth::user();
        $cart = Cart::where('UserID', $user->id)->first();

        if (!$cart || $cart->TotalAmount == 0) {
            return view('screens.cart', ['cart' => $cart])->with('message', 'Cart is empty');
        }

        $items = CartItem::where('CartID', $cart->id)->get();

        return view('screens.cart', ['cartItem' => $items, 'cart' => $cart]);
    }

    public function updateQuantity(Request $request)
    {
        $user = Auth::user();
        $cartItem = CartItem::findOrFail($request->input('item_id'));
        $cart = Cart::where('UserID', $user->id)->first();

        if ($request->has('increment')) {
            $cartItem->update(['Quantity' => $cartItem->Quantity + 1, 'Subtotal' => ($cartItem->Quantity + 1) * $cartItem->product->Price]);
            $cart->update(['TotalAmount' => ($cart->TotalAmount + $cartItem->product->Price)]);
        } elseif ($request->has('decrement') && $cartItem->Quantity > 0) {
            $cartItem->update(['Quantity' => $cartItem->Quantity - 1, 'Subtotal' => ($cartItem->Quantity - 1) * $cartItem->product->Price]);
            $cart->update(['TotalAmount' => ($cart->TotalAmount - $cartItem->product->Price)]);
        }

        return redirect()->back();
    }


    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();
        $cartContoller = new CartController();
        $cart = $cartContoller->create();
        $this->updatePrice($cart);
        return redirect()->back();
    }
}
