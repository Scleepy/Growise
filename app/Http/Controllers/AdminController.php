<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function home()
    {
        if(auth()->user()->IsAdmin == false){
            abort(403, 'Unauthorized Action');
        }

        return view('screens.admin.dashboard');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function products()
    {
        if(auth()->user()->IsAdmin == false){
            abort(403, 'Unauthorized Action');
        }

        return view('screens.admin.product');
    }

    public function transactions()
    {
        if(auth()->user()->IsAdmin == false){
            abort(403, 'Unauthorized Action');
        }

        $thc = new TransactionHeaderController();

        $transactions = $thc->getAllTransactions();

        return view('screens.admin.transaction', compact('transactions'));
    }

    public function transactionDetails($id)
    {
        if(auth()->user()->IsAdmin == false){
            abort(403, 'Unauthorized Action');
        }

        $thc = new TransactionHeaderController();
        $tdc = new TransactionDetailsController();

        $transactionHeader = $thc->getTransactionByID($id);

        $transactionDetails = $tdc->getTransactionDetailsByID($id);

        return view('screens.admin.transaction-detail', compact('transactionHeader', 'transactionDetails'));
    }

    public function newProduct()
    {
        if(auth()->user()->IsAdmin == false){
            abort(403, 'Unauthorized Action');
        }

        return view('screens.admin.newproduct');
    }

    public function editProduct($id)
    {
        if(auth()->user()->IsAdmin == false){
            abort(403, 'Unauthorized Action');
        }

        $product = Product::findOrFail($id);

        return view('screens.admin.editproduct', compact('product'));
    }
}
