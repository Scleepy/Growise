@php
    $id = $transactionHeader->id;
    $name = $transactionHeader->user->FullName;
    $address = $transactionHeader->user->Address;

    // Convert the string to a Carbon instance
    $transactionDate = \Carbon\Carbon::parse($transactionHeader->TransactionDate);

    $date = $transactionDate->format('F d, Y');
    $time = $transactionDate->format('H:i');
    $deliveryStatus = $transactionHeader->shipmentStatus->status->StatusName;
    $total = app('App\Http\Controllers\TransactionHeaderController')->getTransactionTotal($transactionHeader);
@endphp

@extends('layout.main')

@section('content')
    <div class="w-full min-h-screen flex flex-col gap-4 px-8 py-16">
        <h1 class="text-5xl">Order #{{ $id }}</h1>

        <!-- Transaction Details -->
        <div class="flex flex-row w-full min-h-[75vh]">

            <div class="w-2/3 flex flex-col border-2 py-6 px-10 bg-white shadow-sm">

                <div class="w-full h-6 mb-4 flex flex-row justify-between font-josefinsans">
                    <h4 class="text-xl">Item</h4>
                    <h4 class="text-xl">Qty</h4>
                </div>

                {{-- <x-item-card :imgSrc="$imgSrc" /> --}}
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
                                <h3>{{ $name }}</h3>
                            </div>

                            <div class="w-full flex flex-row justify-between">
                                <h3>Address</h3>
                                <h3 class="text-right">{{ $address }}</h3>
                            </div>

                            <div class="w-full flex flex-row justify-between">
                                <h3>Delivery Fee</h3>
                                <h3 class="text-green-600">Free</h3>
                            </div>


                            <div class="w-full flex flex-row justify-between">
                                <h3>Date/Time Ordered</h3>
                                <div class="text-right">
                                    <h3 class="">{{ $date }}</h3>
                                    <h3 class="">{{ $time }} WIB</h3>
                                </div>
                            </div>

                            <div class="w-full flex flex-row justify-between">
                                <h3>Delivery Status</h3>
                                <h3
                                    class="
                            @if ($transactionHeader->shipmentStatus->status->StatusName === 'Under Process') text-red-600
                            @elseif($transactionHeader->shipmentStatus->status->StatusName === 'Delivering')
                                text-orange-500
                            @elseif($transactionHeader->shipmentStatus->status->StatusName === 'Delivered')
                                text-green-600 @endif
                            ">
                                    {{ $transactionHeader->shipmentStatus->status->StatusName }}</h3>
                            </div>
                        </div>
                    </div>


                    <!-- Total Amount -->
                    <div class="w-full flex flex-row justify-between">
                        <h2 class="text-xl">Total Amount</h2>
                        <h2 class="text-xl text-secondary">
                            Rp {{ $total }}
                        </h2>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
