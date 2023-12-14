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

    public function getAllTransactions()
    {

        $transactions = TransactionHeader::all();

        return $transactions;
    }

    public function getTransactionByID($id)
    {
        $transaction = TransactionHeader::findOrFail($id);

        return $transaction;
    }

    public function getTransactionTotal($transaction)
    {
        $total = $transaction->transactionDetails->sum('Subtotal');

        return $total;
    }

    public function updateTransactionStatus(Request $request, $id)
    {
        dd($request);

        $transactionHeader = TransactionHeader::findOrFail($id);

        $currentStatusID = $transactionHeader->ShipmentStatusID;

        switch ($currentStatusID) {
            case 1:
                $newStatusID = 2;
                break;
            case 2:
                $newStatusID = 3;
                break;
            default:
                $newStatusID = $currentStatusID;
                break;
        }

        $transactionHeader->update(['ShipmentStatusID' => $newStatusID]);

        $transactionDetails = $transactionHeader->transactionDetails;

        return view('screens.admin.transaction-detail', compact('transactionHeader', 'transactionDetails'));
    }
}
