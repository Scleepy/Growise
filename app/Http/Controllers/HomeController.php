<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('screens.index');
    }
    // public function aboutUs(){
    //     return redirect()->route('home')->withFragment('about-us');
    // }

    // public function contactUs(){
    //     return redirect()->route('home')->withFragment('contact-us');
    // }
}
