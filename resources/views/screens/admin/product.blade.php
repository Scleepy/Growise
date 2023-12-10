@extends('layout.main')

@section('content')
    <div class="flex flex-col">

        <!-- Catalog Section -->
        <div class="min-h-screen flex flex-row py-16">

            <!-- Filter -->
            <!-- TODO: Fix sticky positioning -->
            <div class="w-1/3 flex flex-col items-center select-none sticky top-50">

                <h3 class="w-fit text-4xl">Filter</h3>
                <form class="w-3/4 flex flex-col items-center gap-2 font-josefinsans" action="">

                    <!-- Search Term -->
                    <div class="w-full my-2 flex flex-col gap-2">
                        <label class="font-bold">Search</label>
                        <input class="input w-full h-10" type="text" id="searchTerm" name="searchTerm"
                            placeholder="e.g. Brin Toothbrush" />
                    </div>

                    <!-- By Category -->
                    <div class="w-full my-2 flex flex-col gap-2">
                        <h4 class="font-bold">Category</h4>
                        <div class="flex items-center gap-4">
                            <input class="checkbox" type="checkbox" id="reusableItem" name="reusableItem" />
                            <label>Reusable Item</label>
                        </div>
                        <div class="flex items-center gap-4">
                            <input class="checkbox" type="checkbox" id="homeGoods" name="homeGoods" />
                            <label>Home Goods</label>
                        </div>
                        <div class="flex items-center gap-4">
                            <input class="checkbox" type="checkbox" id="personalCare" name="personalCare" />
                            <label>Personal Care</label>
                        </div>
                        <div class="flex items-center gap-4">
                            <input class="checkbox" type="checkbox" id="fashion" name="fashion" />
                            <label>Fashion</label>
                        </div>
                        <div class="flex items-center gap-4">
                            <input class="checkbox" type="checkbox" id="energySolutions" name="energySolutions" />
                            <label>Energy Solutions</label>
                        </div>
                        <div class="flex items-center gap-4">
                            <input class="checkbox" type="checkbox" id="uprecycledGoods" name="uprecycledGoods" />
                            <label>Upcycled and Recycled Goods</label>
                        </div>
                        <div class="flex items-center gap-4">
                            <input class="checkbox" type="checkbox" id="food" name="food" />
                            <label>Food</label>
                        </div>
                    </div>

                    <!-- By Price -->
                    <div class="w-full flex flex-col gap-2">
                        <h4 class="font-bold">Price Range</h4>
                        <div class="flex flex-row justify-between items-center">
                            <input type="text"
                                class="w-40 h-8 bg-primaryDark border border-black outline-none text-center"
                                placeholder="Min. Price" />
                            <h4 class="font-extrabold">-</h4>
                            <input type="text"
                                class="w-40 h-8 bg-primaryDark border border-black outline-none text-center"
                                placeholder="Max. Price" />
                        </div>
                    </div>

                    <button type="submit"
                        class="btn btn-secondary w-28 font-normal normal-case px-14 my-2 text-lg rounded-none">Filter</button>
                </form>

                <a href="{{ route('admin.newProduct') }}"
                    class="btn btn-secondary w-[325px] font-normal normal-case my-3 px-14 text-lg rounded-none">New
                    Product</a>
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
                        <ul tabindex="0"
                            class="dropdown-content z-[1] menu p-2 shadow bg-base-100 w-52 font-josefinsans text-md">
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
                <div class="w-full flex flex-wrap gap-4">
                    @forelse ($products as $product)
                        <x-admin-product-card :product="$product" />
                    @empty
                        <p class="text-xl text-red-500">No products found.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Product Page Buttons -->
        <div class="flex flex-row w-full justify-center mb-16 gap-2">
            <!-- Number Button (Active Tab) -->
            <div
                class="w-8 aspect-square rounded-full bg-secondary flex flex-row justify-center items-center group cursor-pointer">
                <h3 class="text-white">1</h3>
            </div>

            <!-- Number Button -->
            <div
                class="w-8 aspect-square rounded-full bg-primaryDark flex flex-row justify-center items-center group hover:bg-secondary cursor-pointer">
                <h3 class="text-black group-hover:text-white">2</h3>
            </div>

            <!-- Next Button -->
            <div
                class="w-8 aspect-square rounded-full bg-primaryDark flex flex-row justify-center items-center group hover:bg-secondary cursor-pointer">
                <img src="<?= asset('icon/Expand_right.svg') ?>" />
            </div>
        </div>

    </div>
@endsection
