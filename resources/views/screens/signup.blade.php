@extends('layout.main-login-signup')

@section('content')
<div class="min-h-[calc(100vh+20rem)] w-full flex items-center justify-center">
    <div class="h-[890px] w-[600px] bg-neutral shadow-xl p-20 flex flex-col items-center justify-evenly font-josefinsans">
        <div class="font-dmserif">
            <h2 class="leading-none text-2xl text-center">Signup</h2>
            <h1 class="leading-none text-6xl text-center -mt-4">Growise</h1>
        </div>
        <div class="w-full h-5/6 flex flex-col items-center justify-between">
            <input type="text" placeholder="Full Name" class="focus:outline-none border-2 rounded-none border-black h-10 bg-transparent input input-bordered w-full" />
            <input type="text" placeholder="Email" class="focus:outline-none border-2 rounded-none border-black h-10 bg-transparent input input-bordered w-full" />
            <input type="tel" placeholder="Phone Number" class="focus:outline-none border-2 rounded-none border-black h-10 bg-transparent input input-bordered w-full" />
            <input type="password" placeholder="Password" class="focus:outline-none border-2 rounded-none border-black h-10 bg-transparent input input-bordered w-full" />

            <div class="w-full flex justify-between">
                <input type="date" class="focus:outline-none border-2 rounded-none border-black bg-transparent input input-bordered w-[48%]" />

                <select class="focus:outline-none border-2 rounded-none  bg-transparent border-black select select-bordered w-[48%]">
                    <option disabled selected>Select Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                </select> 
            </div>

            <textarea placeholder="Address" class="focus:outline-none border-2 rounded-none h-20 border-black bg-transparent textarea textarea-bordered textarea-lg w-full" ></textarea>

            <input type="number" placeholder="OWO AccountID" class="focus:outline-none border-2 rounded-none border-black h-10 bg-transparent input input-bordered w-full" />            
            
            <div class="w-full pt-5">
                <button class="focus:outline-none border-2 btn btn-secondary font-normal normal-case w-full text-neutral text-lg rounded-none">Sign Up</button>
                <p class="pt-3 text-center text-secondary text-sm">Already have an account? <a href="/login" class="font-bold">Log In</a></p>
            </div>
        </div>
    </div>
</div>
@endsection