<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function home()
    {
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
        return view('screens.admin.product');
    }

    public function transactions()
    {
        return view('screens.admin.transaction');
    }

    public function transactionDetails()
    {
        return view('screens.admin.transaction-detail');
    }

    public function newProduct()
    {
        return view('screens.admin.newproduct');
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);

        return view('screens.admin.editproduct', compact('product'));
    }
}
