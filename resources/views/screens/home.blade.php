@extends('layout.main')

@section('content')
<div>
    <div class="hero min-h-screen" style="background-image: url({{ asset('image/hero.png') }})">
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-lg">
                <h1 class="mb-5 text-5xl text-neutral">
                    GREENER CHOICES
                    BETTER TOMORROWS
                </h1>
                <a href="/catalogue" class="btn btn-secondary font-normal normal-case px-14 text-lg rounded-none">Explore Collection</a>
            </div>
        </div>
    </div>

    <div class="flex mx-auto flex-col w-full justify-center items-center max-w-screen-2xl min-h-[calc(100vh-15rem)]">
        <h1 class="text-5xl text-center">Browse Our Catalogue</h1>
        <p class="text-lg text-center">A diverse selection of eco-friendly goods and services</p>
        <div class="carousel space-x-6 pt-10">
            <a href="/catalogue">
                <div class="carousel-item flex-col">
                    <img src="{{ asset('image/home/catalogue_reusable_item.png') }}" alt="Reusable Items" width="164" />
                    <p class="text-center">Reusable Items</p>
                </div>
            </a>
            <a href="/catalogue">
                <div class="carousel-item flex-col">
                    <img src="{{ asset('image/home/catalogue_home_goods.png') }}" alt="Home Goods" width="164" />
                    <p class="text-center">Home Goods</p>
                </div>
            </a>
            <a href="/catalogue">
                <div class="carousel-item flex-col">
                    <img src="{{ asset('image/home/catalogue_personal_care.png') }}" alt="Personal Care" width="164" />
                    <p class="text-center">Personal Care</p>
                </div>
            </a>
            <a href="/catalogue">
                <div class="carousel-item flex-col">
                    <img src="{{ asset('image/home/catalogue_fashion.png') }}" alt="Fashion" width="164" />
                    <p class="text-center">Fashion</p>
                </div>
            </a>
            <a href="/catalogue">
                <div class="carousel-item flex-col">
                    <img src="{{ asset('image/home/catalogue_energy_solutions.png') }}" alt="Energy Solutions" width="164" />
                    <p class="text-center">Energy Solutions</p>
                </div>
            </a>
            <a href="/catalogue">
                <div class="carousel-item flex-col">
                    <img src="{{ asset('image/home/catalogue_uprecycled_goods.png') }}" alt="Up/Recycled Goods" width="164" />
                    <p class="text-center">Up/Recycled Goods</p>
                </div>
            </a>
            <a href="/catalogue">
                <div class="carousel-item flex-col">
                    <img src="{{ asset('image/home/catalogue_food.png') }}" alt="Food" width="164" />
                    <p class="text-center">Food</p>
                </div>
            </a>
        </div>
    </div>


    <div class="flex mx-auto w-full justify-center items-center max-w-screen-2xl min-h-screen">
        <div class="flex w-8/12 justify-between">
            <div class="w-6/12">
                <img src="{{ asset('image/home/farmer.png') }}" alt="Farmer" width="400" class="rounded-tl-[74px] relative z-10" />

                <div class="absolute bg-accent w-[650px] h-[85px] flex justify-center items-center z-20 -my-10 mx-80">
                    <div class="text-neutral w-1/3">
                        <p class="leading-none text-2xl text-center">8,500 tons</p>
                        <p class="leading-none text-[13px] text-center">plastics recycled</p>
                    </div>
                    <div class="text-neutral w-1/3">
                        <p class="leading-none text-2xl text-center">30,000 MWh</p>
                        <p class="leading-none text-[13px] text-center">clean energy</p>
                    </div>
                    <div class="text-neutral w-1/3">
                        <p class="leading-none text-2xl text-center">150000+</p>
                        <p class="leading-none text-[13px] text-center">Trees Planted</p>
                    </div>
                    <div class="text-neutral w-1/3">
                        <p class="leading-none text-2xl text-center">50 Million</p>
                        <p class="leading-none text-[13px] text-center">Gallons of Safe Water</p>
                    </div>
                </div>
            </div>

            <div class="w-7/12">
                <h1 class="text-5xl">Nurturing a Greener <br> Tomorrow Since 2023</h1>
                <p class="text-justify text-[15px] pt-5">
                    At Growise, we've been committed to shaping a more sustainable future since 2023. Our platform is not just about buying and selling; it's a thriving ecosystem where you can explore a diverse selection of eco-friendly goods and services that align with your values.
                    <br><br>
                    Our journey started with the belief that every small action contributes to a better world. We understood the importance of making sustainable choices in our everyday lives. Since our establishment, we've been on a mission to make those choices more accessible to everyone.
                    <br><br>
                    We're unwavering in our dedication to provide you with an array of sustainable options. From eco-conscious products to services that reduce your carbon footprint, our commitment to environmental responsibility is at the heart of everything we do.
                </p>
            </div>
        </div>
    </div>

    <div class="flex mx-auto bg-accent w-full justify-center items-center min-h-[calc(100vh-15rem)]">
        <div class="w-3/12">
            <h1 class="text-neutral text-5xl">Our Best Sellers</h1>
            <p class="text-neutral w-11/12 text-[15px] pt-5 pb-5 text-justify">
                Discover our top-rated, eco-friendly favorites in Our Best Sellers collection - products that lead the way in sustainability and quality, making a positive impact with every purchase.
                <br><br>
                From eco-conscious essentials to innovative green solutions, Our Best Sellers embody the essence of responsible living. Join the movement towards a more sustainable future today.
            </p>
            <button class="btn btn-secondary font-normal normal-case px-14 text-lg rounded-none">Explore Collection</button>
        </div>

        <div class="w-8/12 carousel carousel-center justify-evenly p-4 space-x-10">
            <x-best-seller-card :image="'image/home/best_seller_1.jpg'" :category="'Reusable Items'" :title="'Epic Totebag'" :originalPrice="'Rp. 75,000'" :discountedPrice="'Rp. 50,000'" :url="'catalogue'" />
            <x-best-seller-card :image="'image/home/best_seller_2.jpg'" :category="'Reusable Items'" :title="'Mario x Growise Bag'" :originalPrice="'Rp. 750,000'" :discountedPrice="'Rp. 550,000'" :url="'catalogue'" />
            <x-best-seller-card :image="'image/home/best_seller_3.png'" :category="'Personal Care'" :title="'Brin Toothbrush'" :originalPrice="'Rp. 55,000'" :discountedPrice="'Rp. 24,750'" :url="'catalogue'" />
        </div>
    </div>

    <div class="flex mx-auto flex-col w-full justify-center items-center max-w-screen-2xl min-h-[calc(100vh-10rem)]">
        <h1 class="text-5xl text-center">Why Choose Us?</h1>
        <p class="text-lg text-center">Elevating Everyday Choices for a Greener Tomorrow</p>
        <div class="carousel space-x-6 pt-10">
            <x-why-us-card :title="'Diverse Selection'" :image="'icon/why_us_1.svg'" :content="'Our commitment to sustainability goes hand-in-hand with our diverse product range. We offer an extensive selection of eco-friendly goods and services, making it easy for you to find everything you need in one place.'" />
            <x-why-us-card :title="'Quality Assurance'" :image="'icon/why_us_2.svg'" :content="'We prioritize quality and eco-consciousness. Every product and service we offer is carefully selected and scrutinized to ensure it meets our rigorous standards for sustainability, ethical production, and exceptional performance.'" />
            <x-why-us-card :title="'Sustainability at Heart'" :image="'icon/why_us_3.svg'" :content="'Sustainability isn\'t just a buzzword for us; it\'s our core principle. From our eco-conscious packaging to our responsible sourcing, we live and breathe sustainability, ensuring your choices align with your values.'" />
        </div>
    </div>
</div>
@endsection