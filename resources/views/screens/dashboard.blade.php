@extends('layout.main')

@section('content')
<div class="min-h-[75vh] px-24 py-10 flex flex-col items-center justify-center">
    <h1 class="text-5xl my-4">Welcome, (admin name here)</h1>

    <!-- Buttons -->
    <div class="flex flex-col gap-4 my-4 font-josefinsans">
        <a class="btn btn-secondary w-[325px] font-normal normal-case px-14 text-lg rounded-none">Products</a>
        <a class="btn btn-secondary w-[325px] font-normal normal-case px-14 text-lg rounded-none">Transactions</a>
        <a class="btn btn-secondary w-[325px] font-normal normal-case px-14 text-lg rounded-none">Logout</a>
    </div>
</div>
@endsection