@extends('layout.main')

@section('content')
    <div class="px-20 py-10 font-josefinsans">
        <div class="flex gap-1">
            <a href="/" class="text-base-300 font-semibold">Home </a>
            /
            <a href="/user" class="font-semibold">Account</a>
            /
            <a href="/order" class="font-semibold">Orders</a>
        </div>

        <div class="flex gap-8 mt-8">
            <div class="bg-white shadow-lg p-10 gap-4 flex flex-col w-[20%] flex-1 max-h-44">
                <div class="flex gap-4">
                    <img src="{{ asset('icon/profile_icon.svg') }}" alt="" class="w-10 h-10">
                    <div class="flex flex-col justify-center">
                        <p class="font-bold">Mario Surya</p>
                        <a href="/user" class="text-base-300 text-xs hover:text-opacity-60">View Profile</a>
                    </div>
                </div>

                <div class="w-full bg-base-300 h-[0.1rem]"></div>

                <ul class="flex menu mt-[-0.5rem] mb-[-2rem]">
                    <li><a href="/order" class="font-semibold">
                            <img src="{{ asset('icon/order_icon.svg') }}" alt="">My Orders</a></li>
                </ul>
            </div>

            <div class="bg-white shadow-lg p-10 gap-4 flex flex-col font-semibold w-[80%]">
                
            </div>
        </div>
    </div>
@endsection
