@extends('layout.main')

@section('content')
<div class="min-h-[75vh] px-24 py-10 flex flex-col items-center justify-center">

    <!-- Titles -->
    <div class="flex flex-col w-full h-fit items-center">
        <h1 class="text-6xl">Growise</h1>
        <h3 class="text-2xl font-josefinsans">Admin Panel</h3>
    </div>

    <!-- Login Form -->
    <form class="flex flex-col justify-center items-center gap-4 font-josefinsans" action="">
        <div class="flex flex-col w-fit">
            <label>Username</label>
            <input type="text" class="input w-[325px]" id="username" name="username">
        </div>

        <div class="flex flex-col w-fit">
            <label>Password</label>
            <input type="password" class="input w-[325px]" id="password" name="password">
        </div>

        <button type="submit" class="btn btn-secondary w-[325px] font-normal normal-case px-14 text-lg rounded-none">Login</button>
    </form>
</div>
@endsection