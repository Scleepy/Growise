@props(['title', 'image', 'content'])

<div class="card card-compact w-72 h-80 border-2 border-black">
    <div class="card-body items-center justify-evenly">
        <h2 class="card-title text-secondary text-2xl font-normal">{{ $title }}</h2>
        <img src="{{ asset($image) }}" class="w-16" alt="">
        <p class="text-center w-11/12 overflow-y-auto max-h-36">
            {!! $content !!}
        </p>
    </div>
</div>
