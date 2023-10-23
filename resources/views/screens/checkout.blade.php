@extends('layout.main')

@section('content')
    <div class="flex gap-6 p-20">
        <div class="flex flex-col gap-4 w-[70%]">
            <h1 class="text-3xl">You're almost there...!</h1>

            <p class="text-xl">Delivery Address</p>
            <div class="flex flex-col gap-2 text-base-300 bg-white shadow-lg p-4 w-[40%]">
                <div class="flex justify-between">
                    <h1 class="text-black text-lg">Home</h1>
                    <button class="button">Edit</button>
                </div>
                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                    ut labore et
                    dolore magna aliqua.</p>
                <p class="text-sm">Mobile Phone: 081239810232</p>
            </div>

            <p class="text-xl">Order Summary</p>
            <div class="flex gap-4 bg-white p-4 justify-start items-center w-auto shadow-lg">
                <img src="{{ asset('image/toothbrush.png') }}" alt="" class="w-28 h-28">

                <div class="flex flex-col gap-1">
                    <h1 class="font-normal text-xl mb-[-0.5rem]">Brin Toothbrush</h1>
                    <p class="text-secondary">4 x Rp.24.750</p>
                    <h1 class="font-normal text-xl text-secondary">Rp79.500</h1>
                </div>
            </div>

            <p class="text-xl">Payment Detail</p>
            <div class="flex gap-4 bg-white shadow-lg items-center justify-start p-6">
                <img src="{{ asset('icon/owo_icon.svg') }}" alt="" class="w-12 h12">

                <div class="flex flex-col">
                    <p class="mb-[-0.3rem] text-lg">OWO Balance</p>
                    <p class="text-secondary">Rp. 1.500.000</p>
                </div>
            </div>
        </div>

        <div class="bg-white shadow-lg p-4 flex flex-col gap-2 w-[30%] max-h-[16rem]">
            <p class="mb-2 text-xl">Transaction Detail</p>

            <div class="flex justify-between">
                <p>Brin Toothbrush</p>
                <p>4x</p>
                <p>Rp. 79.500</p>
            </div>

            <div class="flex justify-between">
                <p>Delivery</p>
                <p class="text-secondary">Free</p>
            </div>

            <div class="bg-base-300 h-[0.1rem] w-full mt-2"></div>

            <div class="flex justify-between">
                <p class="text-lg">Total Amount</p>
                <p class="text-lg">Rp. 318.000</p>
            </div>

            <button class="bg-secondary button btn-secondary p-2 mt-5">Continue Payment</button>
        </div>
    </div>
@endsection
