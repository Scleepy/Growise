@extends('layout.main')

@section('content')
    <div class="px-20 py-10 flex items-center justify-center">
        <div class="w-11/12 h-full">
            <h1 class="text-4xl w-full">Shopping Cart</h1>
            <div class="pt-4 w-full flex flex-row justify-between">
                @if (!$cart || $cart->TotalAmount == 0)
                    <div class="bg-red-200 p-4 mt-4">
                        <p>{{ $message }}</p>
                    </div>
                @else
                    <div class="p-8 shadow-xl bg-neutral w-[70%] flex flex-col">
                        @foreach ($cartItem as $item)
                            <div class="p-5 w-full flex justify-between items-center">
                                <div class="flex w-[65%]">
                                    <img src="{{ asset($item->product->ProductImage) }}"
                                        alt="{{ $item->product->ProductName }}" class="w-20 h-20">
                                    <div class="pl-4 py-1 flex flex-col justify-between">
                                        <h1 class="leading-none text-lg">{{ $item->product->ProductName }}</h1>
                                        <p class="leading-none text-sm">Note: {{ $item->ItemNotes }}</p>
                                        <h1 class="text-secondary">Rp. {{ number_format($item->Subtotal) }}</h1>
                                    </div>
                                </div>

                                {{-- TODO: FIX THIS + AND - BEHAVIOR --}}
                                <div class="flex items-center w-20 justify-between">
                                    <form action="{{ route('addToCartOrUpdateQuantity') }}" method="POST" class="flex gap-4">
                                        @csrf
                                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                                        <input type="hidden" name="updateQuantity" value="true">
                                        <button type="submit" name="decrement"
                                            class="btn btn-secondary font-normal normal-case text-xl rounded-none w-[25px] h-[25px] min-h-[25px] text-white p-0 leading-none">-</button>
                                        <h1>{{ $item->Quantity }}</h1>
                                        <button type="submit" name="increment"
                                            class="btn btn-secondary font-normal normal-case text-xl rounded-none w-[25px] h-[25px] min-h-[25px] text-white p-0 leading-none">+</button>
                                    </form>
                                </div>


                                <form method="POST" action="{{ route('cartItemDestroy', ['cartItem' => $item->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="flex items-center justify-center">
                                        <button
                                            class="btn btn-base-200 font-normal normal-case text-xl rounded-full w-[40px] h-[40px] min-h-[40px] text-white p-0 leading-none">
                                            <img src="{{ asset('icon/trash_icon.svg') }}" alt="" class="w-15 h-6">
                                        </button>
                                    </div>
                                </form>

                            </div>
                        @endforeach
                    </div>
                    <div class="p-8 shadow-xl bg-neutral w-[25%] h-72 flex flex-col justify-between">
                        <h1 class="font-bold text-lg">Promo Code</h1>
                        <div class="w-full flex justify-between">
                            <input type="text" placeholder="Promo Code"
                                class="focus:outline-none border-2 h-10 rounded-none border-base-300 bg-transparent input input-bordered w-[70%]" />
                            <button
                                class="btn btn-secondary font-normal normal-case text-sm rounded-none h-[40px] min-h-full w-[25%] text-white">Apply</button>
                        </div>
                        <div class="bg-base-300 h-[0.1rem] w-full"></div>
                        <div class="flex justify-between text-lg">
                            <h1 class="font-bold">Subtotal</h1>
                            <h1>Rp. {{ number_format($cart->TotalAmount) }}</h1>
                        </div>
                        <div>
                            <a href="{{ route('checkout') }}"
                                class="btn btn-secondary font-normal normal-case text-sm rounded-none h-10 min-h-full w-full text-white">Checkout</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
