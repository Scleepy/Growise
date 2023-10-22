<div class="w-[225px] aspect-[3/4] flex flex-col bg-[#EAE5D5] border border-black">

    <!-- Product Image -->
    <img class="w-full h-1/2" src="{{ asset('image/toothbrush.png') }}" alt="Product Image" />

    <!-- Product Information -->
    <div class="w-full h-fit flex flex-row justify-between items-end p-4">

        <!-- Information -->
        <div class="flex flex-col">
            <h4 class="text-md">Personal Care</h4>
            <h3 class="text-xl">Brin Toothbrush</h3>
            <h3 class="line-through opacity-50">Rp. 55.000</h3>
            <h3 class="text-lg">Rp. 24.750</h3>
        </div>

        <!-- Add to Cart Button -->
        <a href="#" class="flex items-center justify-center bg-secondary w-8 h-8">
            <img src="<?= asset('icon/cart.svg') ?>" width="20" />
        </a>
    </div>
</div>