<div class="flex gap-6 justify-around items-center p-6 navbar">
    @if (auth()->check())
        @if (auth()->user()->IsAdmin == true)
            <a href="/admin/dashboard">
                <h1 class="font-medium text-4xl">Growise</h1>
            </a>
        @else
            <a href="/">
                <h1 class="font-medium text-4xl">Growise</h1>
            </a>
        @endif
    @else
        <a href="/">
            <h1 class="font-medium text-4xl">Growise</h1>
        </a>
    @endif

    <ul class="flex gap-4">
        <li>
        @if (auth()->check())
            @if (auth()->user()->IsAdmin == true)
            <a href="/admin/dashboard">Home</a>
            @else
            <a href="/">Home</a>
            @endif
        @else
            <a href="/">Home</a>
        @endif
        </li>
        <div class="dropdown dropdown-hover">
            <a tabindex="0" class="inline-flex gap-2" href="{{ route('products') }}">Catalogue
                <img src="<?= asset('icon/drop_down.svg') ?>" alt="">
            </a>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 w-52 font-josefinsans">
                <li><a href="{{ route('getProductsBySlug', ['slug' => 'reusable-items']) }}">Reusable Items</a></li>
                <li><a href="{{ route('getProductsBySlug', ['slug' => 'home-goods']) }}">Home Goods</a></li>
                <li><a href="{{ route('getProductsBySlug', ['slug' => 'personal-care']) }}">Personal Care</a></li>
                <li><a href="{{ route('getProductsBySlug', ['slug' => 'fashion']) }}">Fashion</a></li>
                <li><a href="{{ route('getProductsBySlug', ['slug' => 'energy-solutions']) }}">Energy Solutions</a></li>
                <li><a href="{{ route('getProductsBySlug', ['slug' => 'up-recycled-goods']) }}">Up/Recycled Goods</a></li>
                <li><a href="{{ route('getProductsBySlug', ['slug' => 'food']) }}">Food</a></li>
            </ul>
        </div>
        <li>
            <a href="/#contact-us">Contact Us</a>
        </li>
        <li>
            <a href="/#about-us">About Us</a>
        </li>
    </ul>

    <form action="">
        <div class="relative flex justify-center items-center">
            <input type="text" name="search_product" placeholder="Search"
                class="rounded-xl py-1 px-4 bg-bg border-slate-950 border-2 outline-none">

            <div class="absolute right-3 top-1/2 transform -translate-y-1/2 w-4 h-4">
                <a href="/"><img src="<?= asset('icon/search.svg') ?>" alt=""></a>
            </div>
        </div>
    </form>

    <div class="flex gap-14 justify-center items-center">
        @auth
            <a href="/cart"><img src="<?= asset('icon/bag_fill.svg') ?>" alt=""></a>

            <div class="dropdown dropdown-end dropdown-hover">
                <a tabindex="0" class="inline-flex mt-[0.5rem]" href="/user">
                    <img src="<?= asset('icon/user_icon.svg') ?>" alt="">
                </a>
                <ul tabindex="0" class="dropdown-content z-[1] menu p-4 shadow bg-base-100 w-52 font-josefinsans gap-4">
                    <div class="flex gap-4">
                        <img src="{{ asset('icon/profile_icon.svg') }}" alt="" class="w-10 h-10">
                        <div class="flex flex-col justify-center">
                            <p class="font-bold">{{ auth()->user()->FullName }}</p>
                            <a href="/user" class="text-base-300 text-xs hover:text-opacity-60">View Profile</a>
                        </div>
                    </div>


                    <div class="flex flex-col gap-1">
                        <h1>OWO Balance</h1>
                        <div class="flex gap-4">
                            <img src="{{ asset('icon/owo_icon.svg') }}" alt="" class="w-10 h-10">

                            <div>
                                <p class="font-bold">
                                    Rp{{ number_format(auth()->user()->OWOAccount->Balance, 0, ',', '.') }}</p>
                                <a href="/user" class="text-base-300 text-xs hover:text-opacity-60">Topup Balance</a>
                            </div>
                        </div>
                    </div>

                    <div class="w-full bg-base-300 h-[0.1rem]"></div>

                    <div class="mt-[-0.5rem]">
                        <li><a href="{{ route('userGetHistoryTransaction') }}" class="font-semibold">My Orders</a></li>

                        <form id="logoutForm" method="POST" action="/logout">
                            @csrf
                            <li><a href="#" onclick="logoutForm.submit();"
                                    class="text-red-500 font-semibold hover:text-red-500">Logout</a></li>
                        </form>
                    </div>
                </ul>
            </div>
        @else
            <div class="w-full">
                <a href="/signup"
                    class="btn btn-outline btn-secondary font-normal btn-sm px-6 rounded-none normal-case">Sign Up</a>
                <a href="/login" class="btn btn-secondary font-normal btn-sm px-6 rounded-none normal-case">Log In</a>
            </div>
        @endauth
    </div>
</div>
