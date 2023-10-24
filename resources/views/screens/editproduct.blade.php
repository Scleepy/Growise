@php
$name = 'Brin Toothbrush';
$price = 28750;
$category = 'Personal Care';
$stock = 100;
$productDescription = 'Lorem ipsum blabliblabli';
$impact = 'Lorem ipsum blabliblabli';
@endphp

@extends('layout.main')

@section('content')
<div class="w-full min-h-screen flex flex-col items-center gap-4 px-24 py-10">
    <h1 class="text-6xl">Edit Product</h1>

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
                <input type="text" placeholder="{{$name}}" id="name" name="name" class="input input-bordered input-primary rounded-none input-md" />
            </div>

            <div class="flex flex-col">
                <label>Price</label>
                <input type="number" placeholder="{{$price}}" id="price" name="price" class="input input-bordered input-primary rounded-none input-md" />
            </div>

            <div class="flex flex-col">
                <label>Category</label>
                <select class="select w-full select-md rounded-none">
                    <option disabled selected>Select a product category</option>
                    <option @if($category=='Reusable Items' ) selected @endif>Reusable Items</option>
                    <option @if($category=='Home Goods' ) selected @endif>Home Goods</option>
                    <option @if($category=='Personal Care' ) selected @endif>Personal Care</option>
                    <option @if($category=='Fashion' ) selected @endif>Fashion</option>
                    <option @if($category=='Energy Solutions' ) selected @endif>Energy Solutions</option>
                    <option @if($category=='Up/Recycled Goods' ) selected @endif>Up/Recycled Goods</option>
                    <option @if($category=='Food' ) selected @endif>Food</option>
                </select>
            </div>

            <div class="flex flex-col">
                <label>Stock</label>
                <input type="number" placeholder="{{$stock}}" id="stock" name="stock" class="input input-bordered input-primary rounded-none input-md" />
            </div>

            <div class="flex flex-col">
                <label>Product Description</label>
                <textarea class="textarea rounded-none" placeholder="{{$productDescription}}" id="productDescription" name="productDescription"></textarea>
            </div>

            <div class="flex flex-col">
                <label>Impact Towards Environment</label>
                <textarea class="textarea rounded-none" placeholder="{{$impact}}" id="impact" name="impact"></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-secondary w-1/4 font-normal normal-case px-14 text-lg rounded-none">Save</button>
    </form>
</div>
@endsection