@extends('layout.main')

@section('content')
<div class="w-full min-h-screen flex flex-col items-center gap-4 px-24 py-10">
    <h1 class="text-6xl">New Product</h1>

    <!-- New Product Form -->
    <form action="" class="flex flex-col items-center gap-6 w-full h-fit font-josefinsans">
        <!-- Image Upload -->
        <div class="my-6 w-full flex flex-row justify-evenly">

            <!-- Main Product Image -->
            <div class="w-fit h-fit flex flex-col gap-2">
                <label>Product Image</label>
                <img src="{{ asset('image/toothbrush.png') }}" class="aspect-square w-1/2" />
                <input type="file" id="productImage" name="productImage" class="file-input file-input-bordered file-input-sm rounded-none" />
            </div>

            <!-- Gallery Images -->
            <div class="w-fit h-fit flex flex-col gap-2">
                <label>Gallery Images</label>
                <img src="{{ asset('image/toothbrush.png') }}" class="aspect-square w-1/2" />
                <input type="file" id="galleryImages" name="galleryImages" class="file-input file-input-bordered file-input-sm rounded-none" />
            </div>

        </div>

        <!-- Input Fields -->
        <div class="w-1/2 flex flex-col gap-4">
            <div class="flex flex-col">
                <label>Name</label>
                <input type="text" placeholder="Name" id="name" name="name" class="input input-bordered input-primary rounded-none input-md" />
            </div>

            <div class="flex flex-col">
                <label>Price</label>
                <input type="number" placeholder="Price" id="price" name="price" class="input input-bordered input-primary rounded-none input-md" />
            </div>

            <div class="flex flex-col">
                <label>Category</label>
                <select class="select w-full select-md rounded-none">
                    <option disabled selected>Select a product category</option>
                    <option>Reusable Items</option>
                    <option>Home Goods</option>
                    <option>Personal Care</option>
                    <option>Fashion</option>
                    <option>Energy Solutions</option>
                    <option>Up/Recycled Goods</option>
                    <option>Food</option>
                </select>
            </div>

            <div class="flex flex-col">
                <label>Stock</label>
                <input type="number" placeholder="Stock" id="stock" name="stock" class="input input-bordered input-primary rounded-none input-md" />
            </div>

            <div class="flex flex-col">
                <label>Product Description</label>
                <textarea class="textarea rounded-none" placeholder="Write the product description here..." id="productDescription" name="productDescription"></textarea>
            </div>

            <div class="flex flex-col">
                <label>Impact Towards Environment</label>
                <textarea class="textarea rounded-none" placeholder="Write its impact towards the environment here..." id="impact" name="impact"></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-secondary w-1/4 font-normal normal-case px-14 text-lg rounded-none">Create</button>
    </form>
</div>
@endsection