<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionDetailsController extends Controller
{
    public function getTransactionDetailsByID($id)
    {
        $transactionDetails = TransactionDetails::where('TransactionHeaderID', $id)->get();

        return $transactionDetails;
    }
}
