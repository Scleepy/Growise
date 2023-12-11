@php
$imgSrc = asset('image/toothbrush.png');
$deliveryStatus = 'Delivered';
$totalAmount = 'Rp 238,500';
@endphp

@extends('layout.main')

@section('content')
<div class="w-full min-h-screen flex flex-col gap-4 px-8 py-16">
    <h1 class="text-5xl">Order #3719375920</h1>

    <!-- Transaction Details -->
    <div class="flex flex-row w-full min-h-[75vh]">

        <div class="w-2/3 flex flex-col border-2 py-6 px-10 bg-white shadow-sm">

            <div class="w-full h-6 mb-4 flex flex-row justify-between font-josefinsans">
                <h4 class="text-xl">Item</h4>
                <h4 class="text-xl">Qty</h4>
            </div>

            <x-item-card :imgSrc="$imgSrc" />
        </div>

        <div class="w-1/3 flex items-start justify-center">

            <!-- Transaction Detail Box -->
            <div class="w-4/5 min-h-[500px] flex flex-col justify-between p-6 bg-white shadow-sm font-josefinsans">

                <div class="flex flex-col gap-2">
                    <h2 class="text-2xl">Transaction Detail</h2>

                    <!-- Details -->
                    <div class="w-full h-full flex flex-col gap-3">
                        <div class="w-full flex flex-row justify-between">
                            <h3>Buyer</h3>
                            <h3>Daniel Yohanes</h3>
                        </div>

                        <div class="w-full flex flex-row justify-between">
                            <h3>Address</h3>
                            <h3 class="text-right">Jl. Mentas Selatan 1 no. 34<br />
                                Menteng Atas, Setiabudi<br />
                                Jakarta Selatan, DKI Jakarta<br />
                                12960</h3>
                        </div>

                        <div class="w-full flex flex-row justify-between">
                            <h3>Delivery Fee</h3>
                            <h3 class="text-green-600">Free</h3>
                        </div>


                        <div class="w-full flex flex-row justify-between">
                            <h3>Date/Time Ordered</h3>
                            <div class="text-right">
                                <h3 class="">October 23, 2023</h3>
                                <h3 class="">20:51 WIB</h3>
                            </div>
                        </div>

                        <div class="w-full flex flex-row justify-between">
                            <h3>Delivery Status</h3>
                            <h3 class="
                            @if($deliveryStatus === 'Under Process')
                                text-red-600
                            @elseif($deliveryStatus === 'Delivering')
                                text-orange-500
                            @elseif($deliveryStatus === 'Delivered')
                                text-green-600
                            @endif
                            ">{{$deliveryStatus}}</h3>
                        </div>
                    </div>
                </div>


                <!-- Total Amount -->
                <div class="w-full flex flex-row justify-between">
                    <h2 class="text-xl">Total Amount</h2>
                    <h2 class="text-xl text-secondary">{{$totalAmount}}</h2>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection