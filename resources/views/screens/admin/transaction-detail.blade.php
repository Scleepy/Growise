@php
    $id = $transactionHeader->id;
    $name = $transactionHeader->user->FullName;
    $address = $transactionHeader->user->Address;

    $transactionDate = \Carbon\Carbon::parse($transactionHeader->TransactionDate);

    $date = $transactionDate->format('F d, Y');
    $time = $transactionDate->format('H:i');
    $deliveryStatus = $transactionHeader->shipmentStatus->status->StatusName;
    $total = app('App\Http\Controllers\TransactionHeaderController')->getTransactionTotal($transactionHeader);

    $buttonText = '';
    if ($deliveryStatus === 'Processing') {
        $buttonText = 'Change to Delivering';
    } elseif ($deliveryStatus === 'Delivering') {
        $buttonText = 'Change to Delivered';
    }
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

                <div class="flex flex-col gap-6 mt-8">
                    @foreach ($transactionDetails as $item)
                        <div class="flex flex-row justify-between w-full">
                            <div class="flex">
                                <img src="{{ asset('image/products/' . $item->product->ProductImage) }}"
                                    alt="{{ $item->product->ProductName }}" class="w-24 h-24 object-cover">
                                <div class="pl-4 flex flex-col gap-2 justify-center">
                                    <h1 class="leading-none text-lg">{{ $item->product->ProductName }}
                                    </h1>
                                    <p class="leading-none text-sm">Note: {{ $item->product->ProductName }}</p>
                                    <h1 class="text-secondary">Rp. {{ number_format($item->Subtotal) }}</h1>
                                </div>
                            </div>
                            <div class="flex w-[35px] flex-row justify-center items-center">
                                <h1 class="text-secondary text-xl">{{ $item->Quantity }}</h1>
                            </div>
                        </div>
                    @endforeach
                </div>
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
                            @if ($deliveryStatus === 'Under Process') text-red-600
                            @elseif($deliveryStatus === 'Delivering')
                                text-orange-500
                            @elseif($deliveryStatus === 'Delivered')
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
                            Rp {{ number_format($total, 0, ',', ',') }}
                        </h2>
                    </div>

                    {{-- Change status button --}}
                    @if ($buttonText)
                        <form method="POST" action="{{ route('admin.updateTransactionStatus', $id) }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-secondary w-full font-normal normal-case px-14 my-2 text-lg rounded-none">{{ $buttonText }}</button>
                        </form>
                    @endif
                </div>

            </div>

        </div>
    </div>
@endsection
