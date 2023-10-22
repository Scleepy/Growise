@extends('layout.main-login-signup')

@section('content')
<div class="min-h-[calc(100vh-5rem)] w-full flex items-center justify-center">
    <div class="h-[570px] w-[550px] bg-neutral shadow-xl p-20 flex flex-col items-center justify-evenly">
        <div>
            <h2 class="leading-none text-2xl text-center">Login</h2>
            <h1 class="leading-none text-6xl text-center -mt-4">Growise</h1>
        </div>
        <div class="w-full flex flex-col items-center justify-between">
            <input type="text" placeholder="Email" class="rounded-none font-josefinsans border-black h-10 bg-transparent input input-bordered w-full" />
            <input type="password" placeholder="Password" class="mt-5 rounded-none font-josefinsans border-black h-10 bg-transparent input input-bordered w-full" />
            <p class="pt-2 text-secondary text-sm font-josefinsans self-start">Forgot Password ?</p>
            <div class="form-control self-start">
                <label class="label cursor-pointer">
                  <input type="checkbox" class="checkbox mr-2 rounded-none h-5 w-5" />
                  <span class="label-text">Remember me</span> 
                </label>
            </div>
            <div class="w-full pt-5">
                <button class="btn btn-secondary font-normal font-josefinsans normal-case w-full text-neutral text-lg rounded-none">Login</button>
                <p class="pt-3 text-center text-secondary text-sm font-josefinsans">Don't have any account? <a href="/signup" class="font-bold">Sign Up</a></p>
            </div>
        </div>
    </div>
</div>
@endsection