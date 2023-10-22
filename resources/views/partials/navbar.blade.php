<div class="flex gap-6 justify-around items-center p-6 navbar">
    <a href="/">
        <h1 class="font-medium text-4xl">Growise</h1>
    </a>

    <ul class="flex gap-4">
        <li>
            <a href="/">Home</a>
        </li>
        <div class="dropdown dropdown-hover">
            <a tabindex="0" class="inline-flex gap-2" href="/catalogue">Catalogue
                <img src="<?= asset('icon/drop_down.svg') ?>" alt="">
            </a>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 w-52 font-josefinsans">
            <li><a href="/catalogue">Reusable Items</a></li>
            <li><a href="/catalogue">Home Goods</a></li>
            <li><a href="/catalogue">Personal Care</a></li>
            <li><a href="/catalogue">Fashion</a></li>
            <li><a href="/catalogue">Energy Solutions</a></li>
            <li><a href="/catalogue">Up/Recycled Goods</a></li>
            <li><a href="/catalogue">Food</a></li>
            </ul>
        </div>
        <li>
            <a href="/contact">Contact Us</a>
        </li>
        <li>
            <a href="/about">About Us</a>
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

    <div class="flex gap-10 justify-center items-center">
        <a href="/cart"><img src="<?= asset('icon/bag_fill.svg') ?>" alt=""></a>
        <a href="/user"><img src="<?= asset('icon/user_icon.svg') ?>" alt=""></a>
    </div>
</div>