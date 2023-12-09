<div class="bg-secondary min-h-[30vh] flex flex-col pt-10 pb-4 gap-6 justify-center items-center">
    <div class="flex justify-around p-2 w-full">
        <div class="flex flex-col gap-4">
            <div>
                <h1 class="font-medium text-5xl text-bg">Growise</h1>
                <p class="font-medium text-xl text-bg">Greener choices, Better tomorrows</p>
            </div>

            <div class="flex gap-4">
                <a href=""><img src="<?= asset('icon/instagram.svg') ?>" alt="" class="w-8 h-8"></a>
                <a href=""><img src="<?= asset('icon/twitter.svg') ?>" alt="" class="w-8 h-8"></a>
                <a href=""><img src="<?= asset('icon/email.svg') ?>" alt="" class="w-8 h-8"></a>
            </div>
        </div>

        <div class="flex flex-col gap-2 text-bg">
            <h1 class="font-medium text-2xl">Explore:</h1>
            <div class="flex gap-8">
                <div>
                    <a href="/">
                        <p>Home</p>
                    </a>
                    <a href="/catalogue">
                        <p>Catalogue</p>
                    </a>
                </div>

                <div>
                    <a href="/contact">
                        <p>Contact us</p>
                    </a>
                    <a href="/about">
                        <p>About us</p>
                    </a>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-2 text-bg">
            <h1 class="font-medium text-2xl text-bg">More:</h1>
            <div class="flex flex-col gap-4">
                <a href="">
                    <p>Term of Service</p>
                </a>
                <a href="">
                    <p>Help Center</p>
                </a>
                <a href="">
                    <p>Privacy Policy</p>
                </a>
            </div>
        </div>

        <div class="flex flex-col gap-4 text-bg">
            <div class="flex flex-col gap-2">
                <p>Subscribe to Get Exclusive Updates and Offers</p>

                <div class="relative flex items-center gap-2">
                    <input type="text" name="email" placeholder="Email Address"
                        class="rounded-md py-1 px-4 bg-white outline-none text-black">
                    <a href=""><img src="<?= asset('icon/send.svg') ?>" alt=""></a>
                </div>
            </div>

            <div>
                <p>Certified by</p>
                <div class="relative bg-white p-5 rounded-md flex gap-4">
                    <img src="<?= asset("logo/bsn.svg") ?>" alt="">
                    <img src="<?= asset("logo/bpdlh.svg") ?>" alt="">
                    <img src="<?= asset("logo/pohon.svg") ?>" alt="">
                    <img src="<?= asset("logo/daun.svg") ?>" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white h-[0.1rem] w-full"></div>

    <div>
        <p class="font-medium text-bg">ⓒ Growise 2023 - All Rights Reserved</p>
    </div>
</div>
