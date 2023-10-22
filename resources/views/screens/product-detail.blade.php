@extends('layout.main')

@section('content')
<div class="w-full min-h-screen flex flex-col gap-2 px-24 py-10">
    <h3 class="font-josefinsans"><span class="text-gray-600/[0.5] font-medium">Home /</span> Personal Care</h3>

    <!-- Product Details -->
    <div class="w-full h-full flex flex-row justify-between">

        <!-- Product Images -->
        <div class="w-1/3 h-screen flex flex-col">
            <img src="{{ asset('image/toothbrush.png') }}" class="w-full aspect-square" />

            <!-- Gallery Select -->
            <!-- TODO: Allow users to select pictures in gallery -->
            <div class="w-full flex flex-row justify-between my-2">
                <img src="{{ asset('image/toothbrush.png') }}" class="w-1/5 aspect-square" />
                <img src="{{ asset('image/toothbrush.png') }}" class="w-1/5 aspect-square" />
                <img src="{{ asset('image/toothbrush.png') }}" class="w-1/5 aspect-square" />
                <img src="{{ asset('image/toothbrush.png') }}" class="w-1/5 aspect-square" />
            </div>
        </div>

        <!-- Product Information -->
        <div class="w-1/3 h-fit flex flex-col gap-2 border">

            <!-- Deals -->
            <div class="w-full px-2 flex items-center bg-red-500">
                <p class="text-white font-josefinsans">Current Deal</p>
            </div>

            <h1 class="text-5xl">Brin Toothbrush</h1>

            <!-- Ratings and Amount Sold -->
            <div class="w-full flex flex-row items-center gap-2 font-josefinsans text-center">

                <h4 class="text-xl">5.0</h4>

                <!-- TODO: Disable rating -->
                <div class="rating rating-sm rating-hidden">
                    <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                    <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                    <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                    <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                    <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" checked />
                </div>

                <h4>(2 ratings)</h4>

                <h4 class="font-bold"> | </h4>

                <h4>12 sold</h4>
            </div>

            <!-- Price-related -->
            <div class="w-full flex flex-row gap-4 items-end font-josefinsans">
                <h1 class="text-red-500 text-4xl">Rp 24.750</h1>
                <h1 class="text-gray-500/[0.5] line-through text-xl">Rp 55.000</h1>
                <h1 class="text-red-500 text-xl">-45%</h1>
            </div>

            <!-- Descriptions -->
            <div class="flex flex-col gap-4">
                <div class="h-fit flex flex-col">
                    <h1 class="text-xl">Product Description</h1>
                    <p class="font-josefinsans">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, quae sed! Repudiandae quas, eaque animi ut amet necessitatibus est id, dolore aliquid provident itaque non voluptas, illum tenetur vitae nesciunt. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab dolore veritatis blanditiis fugiat dignissimos aperiam nisi, distinctio et quas! Quam explicabo voluptas laborum repudiandae perferendis, iure aut facere provident sunt? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident facere maxime voluptatum accusamus veniam, assumenda tenetur temporibus, eum consequuntur dignissimos aut cumque cupiditate magni sint earum animi et obcaecati maiores.</p>
                </div>
                <div class="h-fit flex flex-col">
                    <h1 class="text-xl">Impact Towards Environment</h1>
                    <p class="font-josefinsans">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, quae sed! Repudiandae quas, eaque animi ut amet necessitatibus est id, dolore aliquid provident itaque non voluptas, illum tenetur vitae nesciunt. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab dolore veritatis blanditiis fugiat dignissimos aperiam nisi, distinctio et quas! Quam explicabo voluptas laborum repudiandae perferendis, iure aut facere provident sunt? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident facere maxime voluptatum accusamus veniam, assumenda tenetur temporibus, eum consequuntur dignissimos aut cumque cupiditate magni sint earum animi et obcaecati maiores.</p>
                </div>
            </div>
        </div>

        <!-- Order Section -->
        <div class="w-1/4 h-screen flex flex-col font-josefinsans">

            <!-- Order Card -->
            <div class="w-full h-fit flex flex-col justify-evenly px-8 py-4 bg-[#FFFEFE] shadow-md">
                <h3 class="text-2xl my-2">Order Details</h3>

                <!-- TODO: Add horizontal line -->

                <form class="w-full h-fit flex flex-col text-lg gap-2" action="">
                    <div class="w-full flex flex-row justify-between">
                        <label>Quantity</label>
                        <input type="number" class="input bg-inherit border border-black rounded-none w-16 h-10 outline-none">
                    </div>

                    <div class="w-full flex flex-row justify-between">
                        <label>Discount</label>
                        <h3>45% (Rp 24,750)</h3>
                    </div>

                    <div class="w-full flex flex-row justify-between">
                        <label>Subtotal</label>
                        <h3>Rp 24,750</h3>
                    </div>

                    <div class="w-full flex flex-col justify-between">
                        <label>Notes</label>
                        <textarea class="textarea bg-inherit border border-black rounded-none outline-none" placeholder="Write your notes here..."></textarea>
                    </div>

                    <!-- Buttons -->
                    <div class="flex flex-col gap-2 mt-2">
                        <button type="submit" class="btn btn-secondary w-full font-normal normal-case px-14 text-lg rounded-none">Buy Now</button>
                        <button type="submit" class="btn btn-secondary w-full font-normal normal-case px-14 bg-inherit text-secondary hover:text-white text-lg rounded-none">Add to Cart</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- You May Also Like Section -->
    <div class="flex flex-col gap-4">
        <h1 class="text-4xl">You may also like</h1>

        <div class="flex flex-row justify-between">
            <x-product-card />
            <x-product-card />
            <x-product-card />
            <x-product-card />
            <x-product-card />
        </div>
    </div>
</div>
@endsection