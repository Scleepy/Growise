@extends('layout.main')

@section('content')
<div class="flex flex-col">

    <!-- Hero Section -->
    <div class="hero bg-hero min-h-[50vh]">
        <h1 class="text-6xl text-white">Catalogue Page</h1>
    </div>

    <!-- Catalog Section -->
    <div class="min-h-screen flex flex-row py-16">

        <!-- Filter -->
        <div class="w-1/3 bg-black">
            <h3>Filter</h3>
        </div>

        <!-- Products -->
        <div class="w-2/3 flex flex-col items-center px-6">

            <!-- Page Information -->
            <div class="w-full flex flex-row justify-between font-josefinsans pb-2">
                <h3>Showing 1 - 16 of 35 results</h3>

                <div class="dropdown dropdown-hover dropdown-end">
                    <a tabindex="0" class="inline-flex gap-2" href="/catalogue">Sort By
                        <img src="<?= asset('icon/drop_down.svg') ?>" alt="">
                    </a>
                    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 w-52 font-josefinsans text-md">
                        <li class="my-2">Price High to Low</li>
                        <li class="my-2">Price Low to High</li>
                        <li class="my-2">Stock High to Low</li>
                        <li class="my-2">Stock Low to High</li>
                        <li class="my-2">Popularity</li>
                        <li class="my-2">Alphabetical</li>
                    </ul>
                </div>
            </div>

            <!-- Product Cards -->
            <div class="w-full grid grid-cols-4 gap-y-6">
                <x-product-card />
                <x-product-card />
                <x-product-card />
                <x-product-card />
                <x-product-card />
                <x-product-card />
                <x-product-card />
                <x-product-card />
                <x-product-card />
                <x-product-card />
                <x-product-card />
                <x-product-card />
                <x-product-card />
                <x-product-card />
                <x-product-card />
                <x-product-card />
            </div>
        </div>
    </div>

    <!-- Product Page Buttons -->
    <div class="flex flex-row w-full justify-center mb-16 gap-2">
        <!-- Number Button (Active Tab) -->
        <div class="w-8 aspect-square rounded-full bg-secondary flex flex-row justify-center items-center group cursor-pointer">
            <h3 class="text-white">1</h3>
        </div>

        <!-- Number Button -->
        <div class="w-8 aspect-square rounded-full bg-primaryDark flex flex-row justify-center items-center group hover:bg-secondary cursor-pointer">
            <h3 class="text-black group-hover:text-white">2</h3>
        </div>

        <!-- Next Button -->
        <div class="w-8 aspect-square rounded-full bg-primaryDark flex flex-row justify-center items-center group hover:bg-secondary cursor-pointer">
            <img src="<?= asset('icon/Expand_right.svg') ?>" />
        </div>
    </div>

</div>
@endsection