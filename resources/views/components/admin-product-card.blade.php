<div class="w-[225px] aspect-[3/4] flex flex-col bg-[#EAE5D5] border border-black">

    <!-- Product Image -->
    <img class="w-full h-1/2 object-cover" src="{{ asset($product->ProductImage) }}" alt="Product Image" />

    <!-- Product Information -->
    <div class="w-full h-fit flex flex-row justify-between items-end p-4">

        <!-- Information -->
        <div class="flex flex-col">
            <h4 class="text-md">{{ $product->category->CategoryName }}</h4>
            <h3 class="text-xl">{{ $product->ProductName }}</h3>
            <h3 class="line-through opacity-50">Rp. {{ number_format($product->OriginalPrice, 2) }}</h3>
            <h3 class="text-lg">Rp. {{ number_format($product->Price, 2) }}</h3>
        </div>

        <!-- TODO: Change color scheme of hover -->
        <div class="flex flex-col items-end">
            <a href="{{ route('admin.editProduct', ['id' => $product->id]) }}" class="text-right hover:text-white">
                Edit
            </a>
            <form method="POST" action="{{ route('destroy', ['product' => $product->id]) }}">
                @csrf
                @method('DELETE')
                <button class="text-right hover:text-white">Remove</button>
            </form>
        </div>
    </div>
</div>
