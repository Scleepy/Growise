@props(['imgSrc' => '#', 'note' => '-', 'totalPrice' => 'Rp 79,500', 'quantity' => '3'])

<div class="w-full h-fit flex flex-row items-center justify-between font-josefinsans">

    <div class="flex flex-row items-center gap-4">
        <img src="{{$imgSrc}}" class="h-28 aspect-square object-cover" />

        <!-- TODO: Fix height (currently fixed with gap-2) -->
        <div class="w-fit h-full flex flex-col gap-2">
            <h3 class="text-3xl">Brin Toothbrush</h3>
            <h4 class="text-md">Note: {{$note}}</h4>
            <h3 class="text-2xl text-secondary">{{$totalPrice}}</h3>
        </div>
    </div>

    <h3 class="text-2xl -translate-x-3">{{$quantity}}</h3>
</div>