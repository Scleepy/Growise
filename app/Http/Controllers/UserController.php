<?php

namespace App\Http\Controllers;

use App\Models\ShipmentStatus;
use App\Models\TransactionDetails;
use App\Models\TransactionHeader;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function create()
    {
        return view('screens.user.signup');
    }

    public function login()
    {
        return view('screens.user.login');
    }

    public function store(Request $request)
    {

        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'phonenumber' => 'required|string|min:8|max:15',
            'pass' => 'required|string|min:8',
            'confirm-password' => 'required|string|same:pass',
            'birthDate' => 'required|date|before_or_equal:today',
            'gender' => ['required', Rule::in(['Male', 'Female'])],
            'address' => 'required|string|max:255',
            'owo-account' => ['required', 'string', 'size:12', Rule::exists('o_w_o_accounts', 'id'), Rule::unique('users', 'OWOAccountID')],
        ], [
            'pass.required' => 'The password field is required.',
            'confirm-password.required' => 'The confirm password field must match password.',
        ]);

        $userData = [
            'FullName' => $fields['name'],
            'Dob' => $fields['birthDate'],
            'Email' => $fields['email'],
            'Address' => $fields['address'],
            'PhoneNumber' => $fields['phonenumber'],
            'Gender' => $fields['gender'],
            'password' => $fields['pass'],
            'OWOAccountID' => $fields['owo-account'],
        ];

        $user = User::create($userData);

        auth()->login($user);

        return redirect('/')->with('message');
    }

    public function authenticate(Request $request)
    {
        $fields = $request->validate([
            'email' => ['required', 'email'],
            'pass' => ['required']
        ], [
            'pass.required' => 'The password field is required.',
        ]);

        $userData = [
            'email' => $fields['email'],
            'password' => $fields['pass'],
        ];

        $rememberMe = $request->has('rememberMe');

        if (auth()->attempt($userData, $rememberMe)) {
            $request->session()->regenerate();

            $user = auth()->user();

            if ($user->IsAdmin) {
                $request->session()->put('user', $user);
                return redirect('/admin/dashboard');
            }

            $request->session()->put('user', $user);
            return redirect('/');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function getHistoryTransaction($status = null)
    {
        $user = auth()->user();
        $query = TransactionHeader::where('UserID', $user->id)->orderBy('TransactionDate', 'desc');

        if ($status !== null) {
            $query->whereHas('shipmentStatus.status', function ($q) use ($status) {
                $q->where('StatusName', $status);
            });
        }

        $th = $query->get();
        $tdAll = [];

        foreach ($th as $item) {
            $td = TransactionDetails::where('TransactionHeaderID', $item->id)->get();
            $tdAll[$item->id] = $td;
        }

        return view('screens.order', ['user' => $user, 'th' => $th, 'td' => $tdAll]);
    }
}
