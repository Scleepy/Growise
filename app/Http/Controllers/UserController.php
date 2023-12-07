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
            'password' => 'required|string|min:8',
            'confirm-password' => 'required|string|same:passwrd',
            'birth-date' => 'required|date',
            'gender' => ['required', Rule::in(['Male', 'Female'])],
            'address' => 'required|string|max:255',
            'owo-account' => 'required|string|min:8|max:15',
        ]);

        $userData = [
            'FullName' => $fields['name'],
            'Dob' => $fields['birth-date'],
            'Email' => $fields['email'],
            'Address' => $fields['address'],
        ];
        
        $user = User::create($userData);
    }
}
