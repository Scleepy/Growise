@props(['title', 'note', 'price', 'image'])

<div class="p-5 w-full flex justify-between">
    <div class="flex w-[65%]">
        <img src="{{ asset('image/toothbrush.png') }}" alt="" class="w-20 h-20">
        <div class="pl-4 py-1 flex flex-col justify-between">
            <h1 class="leading-none text-lg font-bold">{{ $title }}</h1>
            <p class="leading-none text-sm">Note: {{ $note }}</p>
            <h1 class="font-bold text-secondary" >{{$price}}</h1>
        </div>
    </div>

    <div class="flex items-center w-20 justify-between">
        <button class="btn btn-secondary font-normal normal-case text-xl rounded-none w-[25px] h-[25px] min-h-[25px] text-white p-0 leading-none">-</button>
        <h1>0</h1>
        <button class="btn btn-secondary font-normal normal-case text-xl rounded-none w-[25px] h-[25px] min-h-[25px] text-white p-0 leading-none">+</button>
    </div>

    <div class="flex items-center justify-center">
        <button class="btn btn-base-200 font-normal normal-case text-xl rounded-full w-[40px] h-[40px] min-h-[40px] text-white p-0 leading-none">
            <img src="{{ asset('icon/trash_icon.svg') }}" alt="" class="w-15 h-6">
        </button>
    </div>
</div>