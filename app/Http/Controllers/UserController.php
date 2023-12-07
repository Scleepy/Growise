<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function create(){
        return view('screens.users.signup');
    }

    public function store(Request $request){

        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'phonenumber' => 'required|string|min:8|max:15',
            'pass' => 'required|string|min:8',
            'confirm-password' => 'required|string|same:pass',
            'birthDate' => 'required|date|before_or_equal:today',
            'gender' => ['required', Rule::in(['Male', 'Female'])],
            'address' => 'required|string|max:255',
            'owo-account' => 'required|string|min:8|max:15',
        ]);

        $userData = [
            'FullName' => $fields['name'],
            'Dob' => $fields['birthDate'],
            'Email' => $fields['email'],
            'Address' => $fields['address'],
            'PhoneNumber' => $fields['phonenumber'],
            'Gender' => $fields['gender'],
            'password' => $fields['pass'],
        ];

        $user = User::create($userData);

        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }
}
