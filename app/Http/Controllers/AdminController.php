<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function home()
    {
        return view('screens.admin.dashboard');
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

    public function editProduct()
    {
        return view('screens.admin.editproduct');
    }
}
