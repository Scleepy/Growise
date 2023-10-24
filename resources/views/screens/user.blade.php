@extends('layout.main')

@section('content')
    <div class="px-20 py-10 font-josefinsans">
        <div class="flex gap-1">
            <a href="/" class="text-base-300 font-semibold">Home </a>
            /
            <a href="/user" class="font-semibold">Account</a>
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
                <div class="flex flex-col gap-4">
                    <p>My Profile</p>

                    <div class="flex gap-[3rem]">
                        <img src="{{ asset('icon/profile_icon.svg') }}" alt="" class="w-20 h-20">
                        <div class="flex flex-col justify-center">
                            <p class="font-bold">Max size: 5MB</p>
                            <p class="font-bold">Extensions: .PNG, .JPG, .JPEG</p>
                        </div>
                    </div>
                </div>

                <form action="">
                    <div class="flex flex-col gap-4 mt-4">
                        <p class="font-bold">Full Name</p>
                        <input type="text" name="name" placeholder="Mario Surya"
                            class="py-1 px-4 bg-white border-slate-950 border-2 outline-none font-normal">

                        <p class="font-bold">Email Address</p>
                        <input type="text" name="email" placeholder="mario.surya@gmail.com"
                            class="py-1 px-4 bg-white border-slate-950 border-2 outline-none font-normal">

                        <div class="flex gap-4">
                            <div class="w-full">
                                <p>Date of Birth</p>

                                <div class="relative">
                                    <input type="date" name="dob" placeholder=""
                                        class="py-1 px-4 bg-white border-slate-950 border-2 outline-none font-normal w-full">
                                    <style>
                                        input[type="date"]::-webkit-calendar-picker-indicator {
                                            filter: invert(100%);
                                        }
                                    </style>
                                </div>
                            </div>

                            <div class="w-full">
                                <p>Gender</p>
                                <select
                                    class="focus:outline-none border-2 rounded-none bg-transparent border-black select select-sm h-[2.3rem] w-full">
                                    <option disabled selected>Select Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>

                            <div class="w-full">
                                <p>Phone Number</p>
                                <input type="type" name="phone" placeholder="085280076262"
                                    class="py-1 px-4 h-[2.3rem] bg-white border-slate-950 border-2 outline-none font-normal w-full">
                            </div>
                        </div>

                        <p class="font-bold">Address</p>
                        <input type="text" name="address"
                            placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                            class="py-1 px-4 bg-white border-slate-950 border-2 outline-none font-normal text-wrap">

                        <p class="font-bold">OWO Account</p>
                        <input type="text" name="owo_account" placeholder="523498523984552345"
                            class="py-1 px-4 bg-white border-slate-950 border-2 outline-none font-normal">
                    </div>
                </form>

                <button class="btn btn-secondary w-[15%]">
                    Save Changes
                </button>
            </div>
        </div>
    </div>
@endsection
