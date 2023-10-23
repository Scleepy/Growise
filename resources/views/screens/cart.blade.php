@extends('layout.main')

@section('content')
<div class="px-20 py-10 flex items-center justify-center">
    <div class="w-11/12 h-full">
        <h1 class="text-4xl w-full">Shopping Cart</h1>
        <div class="pt-4 w-full flex flex-row justify-between">
            <div class="p-8 shadow-xl bg-neutral w-[70%] min-h-[calc(100vh-20rem)] flex flex-col">
        
                <x-cart-card :title="'Brin Toothbrush'" :image="'image/toothbrush.png'" :note="'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam'" :price="'Rp79.500'" />
                <x-cart-card :title="'Brin Toothbrush'" :image="'image/toothbrush.png'" :note="'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam'" :price="'Rp79.500'" />
                <x-cart-card :title="'Brin Toothbrush'" :image="'image/toothbrush.png'" :note="'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam'" :price="'Rp79.500'" />
                <x-cart-card :title="'Brin Toothbrush'" :image="'image/toothbrush.png'" :note="'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam'" :price="'Rp79.500'" />
                <x-cart-card :title="'Brin Toothbrush'" :image="'image/toothbrush.png'" :note="'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam'" :price="'Rp79.500'" />
                <x-cart-card :title="'Brin Toothbrush'" :image="'image/toothbrush.png'" :note="'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam'" :price="'Rp79.500'" />

            </div>
            <div class="p-8 shadow-xl bg-neutral w-[25%] h-72 flex flex-col justify-between">
                <h1 class="font-bold text-lg">Promo Code</h1> 
                <div class="w-full flex justify-between">
                    <input type="text" placeholder="Email" class="focus:outline-none border-2 h-10 rounded-none border-base-300 bg-transparent input input-bordered w-[70%]" />
                    <button class="btn btn-secondary font-normal normal-case text-sm rounded-none h-[40px] min-h-full w-[25%] text-white">Apply</button>
                </div>
                <div class="bg-base-300 h-[0.1rem] w-full"></div>
                <div class="flex justify-between text-lg">
                    <h1 class="font-bold">Subtotal</h1>
                    <h1>Rp318,000</h1>
                </div>
                <div>
                    <button class="btn btn-secondary font-normal normal-case text-sm rounded-none h-10 min-h-full w-full text-white">Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection