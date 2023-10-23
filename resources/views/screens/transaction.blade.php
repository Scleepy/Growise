@php
$deliveryStatus = 'Delivering';
@endphp

@extends('layout.main')

@section('content')

<div class="min-h-screen flex flex-row px-8 py-16">

    <!-- Date of Transaction Filter -->
    <div class="w-1/3 flex flex-col">
        <div class="w-full flex flex-col gap-2 font-josefinsans">
            <h3 class="font-bold text-xl">Transaction Date</h3>

            <!-- Date Picker -->
            <form class="w-80 flex flex-col justify-start gap-4" action="">
                <div class="flex flex-col">
                    <label>Min. Date</label>
                    <input type="date" name="minTransactionDate" placeholder="" class="py-1 px-4 bg-white border-slate-950 border-2 outline-none font-normal">
                    <style>
                        input[type="date"]::-webkit-calendar-picker-indicator {
                            filter: invert(100%);
                        }
                    </style>
                </div>
                <div class="flex flex-col">
                    <label>Max. Date</label>
                    <input type="date" name="maxTransactionDate" placeholder="" class="py-1 px-4 bg-white border-slate-950 border-2 outline-none font-normal">
                    <style>
                        input[type="date"]::-webkit-calendar-picker-indicator {
                            filter: invert(100%);
                        }
                    </style>
                </div>

                <button type="submit" class="btn btn-secondary w-28 font-normal normal-case px-14 my-2 text-lg rounded-none">Filter</button>
            </form>
        </div>
    </div>


    <!-- Transactions -->
    <div class="w-full h-full flex flex-col overflow-y-auto max-h-[75vh] no-scrollbar">
        <x-admin-transaction-card :deliveryStatus="$deliveryStatus" />
        <x-admin-transaction-card :deliveryStatus="$deliveryStatus" />
        <x-admin-transaction-card :deliveryStatus="$deliveryStatus" />
        <x-admin-transaction-card :deliveryStatus="$deliveryStatus" />
        <x-admin-transaction-card :deliveryStatus="$deliveryStatus" />
        <x-admin-transaction-card :deliveryStatus="$deliveryStatus" />
        <x-admin-transaction-card :deliveryStatus="$deliveryStatus" />
        <x-admin-transaction-card :deliveryStatus="$deliveryStatus" />
    </div>
</div>
@endsection