@extends('layout.main')

@php
    $user = session('user');
@endphp

@section('content')
    <div class="min-h-[75vh] px-24 py-10 flex flex-col items-center justify-center">
        <h1 class="text-5xl my-4">Welcome, {{ $user->FullName }}</h1>

        <!-- Buttons -->
        <div class="flex flex-col gap-4 my-4 font-josefinsans">
            <a href="/admin/product"
                class="btn btn-secondary w-[325px] font-normal normal-case px-14 text-lg rounded-none">Products</a>
            <a href="/admin/transaction"
                class="btn btn-secondary w-[325px] font-normal normal-case px-14 text-lg rounded-none">Transactions</a>
            <a href="/admin"
                class="btn btn-secondary w-[325px] font-normal normal-case px-14 text-lg rounded-none">Logout</a>
        </div>
    </div>
@endsection
