<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\TransactionDetails;
use App\Models\TransactionHeader;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function create()
    {
        $user = Auth::user();

        $cart = Cart::where('UserID', $user->id)->first();

        $cartFields = [
            'TotalAmount' => 0,
            'UserID' => $user->id
        ];

        if (!$cart) {
            $cart = Cart::create($cartFields);
        }

        return $cart;
    }

    public function checkout()
    {
        $user = Auth::user();

        $cart = Cart::where('UserID', $user->id)->first();
        $cartItem = CartItem::where('CartID', $cart->id)->get();

        return view('screens.checkout', ['user' => $user, 'cartItems' => $cartItem, 'cart' => $cart]);
    }

    public function payment()
    {
        $user = Auth::user();
        $balance = $user->OWOAccount->Balance;

        $cart = $cart = Cart::where('UserID', $user->id)->first();
        $cartItem = CartItem::where('CartID', $cart->id)->get();

        if ($balance < $cart->TotalAmount) {
            return redirect()->back()->with('error', 'Insufficient OWO Balance');
        }

        // TO-DO : ADD THE MODAL SCREENS
        // return view('screens.payment-modal');

        $thController = new TransactionHeaderController();
        $th = $thController->create();

        foreach ($cartItem as $item) {
            $fields = [
                'Quantity' => $item->Quantity,
                'Subtotal' => $item->Subtotal,
                'TransactionHeaderID' => $th->id,
                'ProductID' => $item->ProductID,
            ];

            TransactionDetails::create($fields);

            $product = Product::findOrFail($item->ProductID);
            if ($product) {
                $product->StockQuantity -= $item->Quantity;
                $product->save();
            }

            $item->delete();
        }

        $balance -= $cart->TotalAmount;

        $user->OWOAccount->update([
            'Balance' => $balance
        ]);

        $cart->update(['TotalAmount' => 0]);

        return redirect('/')->with('success', 'Payment Successfully');
    }
}
