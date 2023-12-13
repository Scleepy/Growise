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
                        <p class="font-bold">{{ $user->FullName }}</p>
                        <a href="/user" class="text-base-300 text-xs hover:text-opacity-60">View Profile</a>
                    </div>
                </div>

                <div class="w-full bg-base-300 h-[0.1rem]"></div>

                <ul class="flex menu mt-[-0.5rem] mb-[-2rem]">
                    <li><a href="{{ route('userGetHistoryTransaction') }}" class="font-semibold">
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
                    @foreach ($th as $item)
                        <div class="flex justify-between items-center w-full gap-10">
                            <div class="flex flex-col justify-center items-start">
                                <h1 class="text-xl">Transaction Header</h1>

                                <p class="text-base-300 font-normal">OWO/0{{ $user->OWOAccount->id }}</p>

                                <div class="flex gap-2 justify-center items-center">
                                    <img src="{{ asset('icon/date_icon.svg') }}" alt="">
                                    <p class="font-normal text-base mt-1">{{ $item->TransactionDate }}</p>
                                </div>
                            </div>

                            <div class="w-44 bg-secondary p-2 justify-center items-center text-center">
                                <h1 class="text-white">{{ $item->shipmentStatus->status->StatusName }}</h1>
                            </div>
                        </div>

                        <div class="p-6 border-2 border-base-300 shadow-lg">
                            @foreach ($td[$item->id] as $tdItem)
                                <div class="flex flex-col gap-6">
                                    <div class="flex">
                                        <img src="{{ asset($tdItem->product->ProductImage) }}"
                                            alt="{{ $tdItem->product->ProductName }}" class="w-24 h-24 object-cover">
                                        <div class="pl-4 flex flex-col gap-2 justify-center">
                                            <h1 class="leading-none text-lg">{{ $tdItem->product->ProductName }}
                                            </h1>
                                            <p class="leading-none text-sm">{{ $tdItem->Quantity }} x Rp.
                                                {{ number_format($tdItem->product->Price) }}</p>
                                            <h1 class="text-secondary">Rp. {{ number_format($tdItem->Subtotal) }}
                                            </h1>
                                        </div>
                                    </div>

                                    <div></div>
                                </div>
                            @endforeach

                            <div>
                                <p class="text-xl">Total Price</p>
                                <h1 class="text-secondary text-xl">Rp. {{ number_format($item->TotalAmount) }}
                                </h1>
                            </div>
                        </div>

                        <div class="bg-base-300 h-[0.1rem] w-full"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
