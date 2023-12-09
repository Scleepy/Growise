@extends('layout.main-login-signup')

@section('content')
<div class="min-h-[calc(100vh+20rem)] w-full flex items-center justify-center">
    <div class="h-[1000px] w-[600px] bg-neutral shadow-xl p-20 flex flex-col items-center justify-evenly font-josefinsans">
        <div class="font-dmserif">
            <h2 class="leading-none text-2xl text-center">Signup</h2>
            <h1 class="leading-none text-6xl text-center -mt-4">Growise</h1>
        </div>
        <form method="POST" action="/users" class="w-full h-5/6 flex flex-col items-center justify-between">
            @csrf
            
            <div class="w-full">
                <input type="text" name="name" placeholder="Full Name" class="focus:outline-none border-2 rounded-none border-black h-10 bg-transparent input input-bordered w-full" value="{{old('name')}}"/>
            
                @error('name')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

            <div class="w-full">
                <input type="text" name="email" placeholder="Email" class="focus:outline-none border-2 rounded-none border-black h-10 bg-transparent input input-bordered w-full" value="{{old('email')}}"/>
            
                @error('email')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

            <div class="w-full">
                <input type="tel" name="phonenumber" placeholder="Phone Number" class="focus:outline-none border-2 rounded-none border-black h-10 bg-transparent input input-bordered w-full" value="{{old('phonenumber')}}"/>
            
                @error('phonenumber')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

            <div class="w-full">
                <input type="password" name="pass" placeholder="Password" class="focus:outline-none border-2 rounded-none border-black h-10 bg-transparent input input-bordered w-full" value="{{old('pass')}}"/>
            
                @error('pass')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

            <div class="w-full">
                <input type="password" name="confirm-password" placeholder="Confirm Password" class="focus:outline-none border-2 rounded-none border-black h-10 bg-transparent input input-bordered w-full" value="{{old('confirm-password')}}"/>
            
                @error('confirm-password')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            
            <div class="w-full">
               <div class="w-full flex justify-between">
                    <input type="date" name="birthDate" class="focus:outline-none border-2 rounded-none border-black bg-transparent input input-bordered w-[48%]" value="{{old('birthDate')}}"/>

                    <select name="gender" class="focus:outline-none border-2 rounded-none  bg-transparent border-black select select-bordered w-[48%]">
                        <option disabled selected>Select Gender</option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    </select> 
                </div>
                
                @error('birthDate')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                @error('gender')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full">
                <textarea placeholder="Address" name="address" class="focus:outline-none border-2 rounded-none h-20 border-black bg-transparent textarea textarea-bordered textarea-lg w-full">{{old('address')}}</textarea>
            
                @error('address')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

            <div class="w-full">
                <input type="tel" name="owo-account" placeholder="OWO AccountID" class="focus:outline-none border-2 rounded-none border-black h-10 bg-transparent input input-bordered w-full" value="{{old('owo-account')}}"/>            
            
                @error('owo-account')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            
            <div class="w-full pt-5">
                <button type="submit" class="focus:outline-none border-2 btn btn-secondary font-normal normal-case w-full text-neutral text-lg rounded-none">Sign Up</button>
                <p class="pt-3 text-center text-secondary text-sm">Already have an account? <a href="/login" class="font-bold">Log In</a></p>
            </div>
        </form>
    </div>
</div>
@endsection