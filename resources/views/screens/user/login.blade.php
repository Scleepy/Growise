@extends('layout.main-login-signup')

@section('content')
<div class="min-h-[calc(100vh-5rem)] w-full flex items-center justify-center font-josefinsans">
    <div class="h-[570px] w-[550px] bg-neutral shadow-xl p-20 flex flex-col items-center justify-evenly">
        <div class="font-dmserif">
            <h2 class="leading-none text-2xl text-center">Login</h2>
            <h1 class="leading-none text-6xl text-center -mt-4">Growise</h1>
        </div>
        <form method="POST" action="/users/authenticate" class="w-full flex flex-col items-center justify-between">
            @csrf
            <div class="w-full">
                <input type="text" name="email" placeholder="Email" class="focus:outline-none border-2 rounded-none border-black h-10 bg-transparent input input-bordered w-full" value="{{old('email')}}"/>
            
                @error('email')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

            <div class="w-full">
                <input type="password" name="pass" placeholder="Password" class="focus:outline-none border-2 mt-5 rounded-none border-black h-10 bg-transparent input input-bordered w-full" value="{{old('pass')}}"/>
            
                @error('pass')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

            <p class="pt-2 text-secondary text-sm self-start">Forgot Password ?</p>
            <div class="form-control self-start">
                <label class="label cursor-pointer">
                  <input type="checkbox" name='rememberMe' class="checkbox mr-2 rounded-none h-5 w-5" />
                  <span class="label-text">Remember me</span> 
                </label>
            </div>
            <div class="w-full pt-5">
                <button class="btn btn-secondary font-normal normal-case w-full text-neutral text-lg rounded-none">Login</button>
                <p class="pt-3 text-center text-secondary text-sm">Don't have any account? <a href="/signup" class="font-bold">Sign Up</a></p>
            </div>
        </form>
    </div>
</div>
@endsection