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
                <ul class="flex gap-2">
                    <li><a href="/order" class="w-full border-b-2 border-accent text-accent">All</a></li>
                    <li><a href="/order/process">Processing</a></li>
                    <li><a href="/order/ship">Shipped</a></li>
                    <li><a href="/order/fulfill">Fulfilled</a></li>
                </ul>

                <div class="flex w-full gap-4 justify-center items-center">
                    <div class="relative flex justify-center items-center w-full">
                        <input type="text" name="search_order" placeholder="Search"
                            class="py-1 px-4 bg-white border-slate-950 border-2 outline-none w-full">

                        <div class="absolute right-3 top-1/2 transform -translate-y-1/2 w-4 h-4">
                            <a href="/"><img src="<?= asset('icon/search.svg') ?>" alt=""></a>
                        </div>
                    </div>

                    <div class="w-full">
                        <select
                            class="focus:outline-none border-2 rounded-none bg-transparent border-black select select-sm h-[2.3rem] w-full">
                            <option disabled selected>Select Category</option>
                            <option>Reusable Items</option>
                            <option>Home Goods</option>
                            <option>Personal Care</option>
                            <option>Fashion</option>
                            <option>Energy Solutions</option>
                            <option>Up/Recycled Goods</option>
                            <option>Food</option>
                        </select>
                    </div>

                    <div class="w-full">
                        <div class="relative">
                            <input type="date" name="dob" placeholder="Select transaction date"
                                class="py-1 px-4 bg-white border-slate-950 border-2 outline-none font-normal w-full">
                            <style>
                                input[type="date"]::-webkit-calendar-picker-indicator {
                                    filter: invert(100%);
                                }
                            </style>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-6 mt-8">
                    <div class="flex justify-around items-center">
                        <img src="{{ asset('image/toothbrush.png') }}" alt="" class="w-28 h-28">

                        <div class="flex flex-col gap-1">
                            <div class="flex gap-6 font-normal">
                                <div class="flex justify-center items-center gap-2">
                                    <img src="{{ asset('icon/date_icon.svg') }}" alt="">
                                    <p>22/10/2023</p>
                                </div>

                                <p class="text-base-300">OWO/4668510203330</p>
                            </div>

                            <h1 class="font-normal text-xl">Brin Toothbrush</h1>
                            <p class="text-green-800 text-xs">1 x Rp.24.750</p>

                            <h1>Total: <span class="text-green-800">Rp.24.750</span></h1>
                        </div>

                        <div class="w-44 bg-secondary p-2 justify-center items-center text-center">
                            <h1 class="text-white">Processing</h1>
                        </div>

                        <button class="text-secondary button">
                            View Transaction Detail
                        </button>
                    </div>

                    <div class="bg-base-300 h-[0.1rem] w-full"></div>

                    <div class="flex justify-around items-center">
                        <img src="{{ asset('image/toothbrush.png') }}" alt="" class="w-28 h-28">

                        <div class="flex flex-col gap-1">
                            <div class="flex gap-6 font-normal">
                                <div class="flex justify-center items-center gap-2">
                                    <img src="{{ asset('icon/date_icon.svg') }}" alt="">
                                    <p>22/10/2023</p>
                                </div>

                                <p class="text-base-300">OWO/4668510203330</p>
                            </div>

                            <h1 class="font-normal text-xl">Brin Toothbrush</h1>
                            <p class="text-green-800 text-xs">1 x Rp.24.750</p>

                            <h1>Total: <span class="text-green-800">Rp.24.750</span></h1>
                        </div>

                        <div class="w-44 bg-secondary p-2 justify-center items-center text-center">
                            <h1 class="text-white">Fullfilled</h1>
                        </div>

                        <button class="text-secondary button">
                            View Transaction Detail
                        </button>
                    </div>

                    <div class="bg-base-300 h-[0.1rem] w-full"></div>

                    <div class="flex justify-around items-center">
                        <img src="{{ asset('image/toothbrush.png') }}" alt="" class="w-28 h-28">

                        <div class="flex flex-col gap-1">
                            <div class="flex gap-6 font-normal">
                                <div class="flex justify-center items-center gap-2">
                                    <img src="{{ asset('icon/date_icon.svg') }}" alt="">
                                    <p>22/10/2023</p>
                                </div>

                                <p class="text-base-300">OWO/4668510203330</p>
                            </div>

                            <h1 class="font-normal text-xl">Brin Toothbrush</h1>
                            <p class="text-green-800 text-xs">1 x Rp.24.750</p>

                            <h1>Total: <span class="text-green-800">Rp.24.750</span></h1>
                        </div>

                        <div class="w-44 bg-secondary p-2 justify-center items-center text-center">
                            <h1 class="text-white">Shipped</h1>
                        </div>

                        <button class="text-secondary button">
                            View Transaction Detail
                        </button>
                    </div>
                </div>
                

                <div class="flex flex-row w-full justify-center mb-16 gap-2">
                    <div class="w-8 aspect-square rounded-full bg-secondary flex flex-row justify-center items-center group cursor-pointer">
                        <h3 class="text-white">1</h3>
                    </div>
            
                    <div class="w-8 aspect-square rounded-full bg-primaryDark flex flex-row justify-center items-center group hover:bg-secondary cursor-pointer">
                        <h3 class="text-black group-hover:text-white">2</h3>
                    </div>
            
                    <div class="w-8 aspect-square rounded-full bg-primaryDark flex flex-row justify-center items-center group hover:bg-secondary cursor-pointer">
                        <img src="<?= asset('icon/Expand_right.svg') ?>" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
