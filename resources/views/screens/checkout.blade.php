@extends('layout.main')

@section('content')
    <div class="flex gap-6 p-20">
        <div class="flex flex-col gap-4 w-[70%]">
            <h1 class="text-3xl">You're almost there...!</h1>

            <p class="text-xl">Delivery Address</p>
            <div class="flex flex-col gap-2 text-base-300 bg-white shadow-lg p-4 w-[40%]">
                <div class="flex justify-between">
                    <h1 class="text-black text-lg">Home</h1>
                    {{-- <button class="button">Edit</button> --}}
                </div>
                <p class="text-sm">{{ $user->Address }}</p>
                <p class="text-sm">Mobile Phone: {{ $user->PhoneNumber }}</p>
            </div>

            <p class="text-xl">Order Summary</p>
            @foreach ($cartItems as $item)
                <div class="flex gap-4 bg-white p-4 justify-start items-center w-auto shadow-lg">
                    <img src="{{ asset($item->product->ProductImage) }}" alt="{{ $item->product->ProductName }}"
                        class="w-28 h-28">

                    <div class="flex flex-col gap-1">
                        <h1 class="font-normal text-xl mb-[-0.5rem]">{{ $item->product->ProductName }}</h1>
                        <p class="text-secondary">{{ $item->Quantity }} x Rp. {{ $item->product->Price }}</p>
                        <h1 class="font-normal text-xl text-secondary">{{ number_format($item->Subtotal, 2) }}</h1>
                    </div>
                </div>
            @endforeach

            <p class="text-xl">Payment Detail</p>
            <div class="flex gap-4 bg-white shadow-lg items-center justify-start p-6">
                <img src="{{ asset('icon/owo_icon.svg') }}" alt="" class="w-12 h12">

                <div class="flex flex-col">
                    <p class="mb-[-0.3rem] text-lg">OWO Balance</p>
                    <p class="text-secondary">Rp. {{ number_format($user->OWOAccount->Balance, 2) }}</p>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-center h-full w-[25rem]">
            <div class="bg-white shadow-lg overflow-hidden w-full">
                <div class="p-4 flex flex-col gap-2">
                    <p class="mb-2 text-xl">Transaction Detail</p>

                    @foreach ($cartItems as $item)
                        <div class="flex justify-between items-center">
                            <p class="w-1/3">{{ $item->product->ProductName }}</p>
                            <p class="w-1/3 text-center">{{ $item->Quantity }}x</p>
                            <p class="w-1/3 text-right">Rp. {{ number_format($item->Subtotal, 2) }}</p>
                        </div>
                    @endforeach

                    <div class="flex justify-between items-center">
                        <p class="w-1/3">Delivery</p>
                        <p class="w-1/3 text-secondary text-right">Free</p>
                    </div>

                    <div class="bg-base-300 h-[0.1rem] w-full mt-2"></div>

                    <div class="flex justify-between items-center">
                        <p class="text-lg">Total Amount</p>
                        <p class="text-lg">Rp. {{ number_format($cart->TotalAmount, 2) }}</p>
                    </div>

                    <form action="{{ route('payment') }}" method="POST">
                        @csrf
                        <div class="w-full">
                            <button type="submit" class="bg-secondary button btn-secondary p-2 mt-5 text-white w-full">Pay</button>
                        </div>
                    </form>

                    @if (Session::has('success'))
                        <div class="bg-green-200 p-4 mt-4">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="bg-red-200 p-4 mt-4">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
