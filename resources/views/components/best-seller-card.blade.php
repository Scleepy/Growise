@props(['category', 'title', 'originalPrice', 'discountedPrice', 'image', 'url'])

<a href="/{{$url}}">
    <div class="card rounded-none card-compact w-72 h-96 bg-base-100 shadow-xl flex flex-col">
        <figure class="h-80">
            <img src="{{ asset($image) }}" alt="{{ $title }}" class="object-cover w-full h-full" />
        </figure>
        <div class="card-body flex flex-col justify-between">
            <div>
                <h3 class="leading-none">{{ $category }}</h3>
                <h2 class="leading-none font-normal card-title">{{ $title }}</h2>
            </div>
            <div class="flex justify-between">
                <div>
                    <h3 class="leading-none text-base-300 line-through">{{ $originalPrice }}</h3>
                    <h2 class="leading-none text-xl">{{ $discountedPrice }}</h2>
                </div>
                <div class="bg-secondary w-8 h-8 flex items-center justify-center">
                    <img src="{{ asset('icon/bag_fill_white.svg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</a>
