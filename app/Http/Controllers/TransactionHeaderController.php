<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionHeaderController extends Controller
{
    public function create()
    {
        $user = Auth::user();

        $cart = Cart::where('UserID', $user->id)->first();
        $deliveryFee = 0;

        $shipmentStatusController = new ShipmentStatusController();
        $shipmentStatus = $shipmentStatusController->create();

        $fields = [
            'TransactionDate' => now(),
            'TotalAmount' => $cart->TotalAmount + $deliveryFee,
            'UserID' => $user->id,
            'ShipmentStatusID' => $shipmentStatus->id,
        ];

        $th = TransactionHeader::create($fields);

        return $th;
    }
}
