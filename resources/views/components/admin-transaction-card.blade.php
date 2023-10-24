@props(['deliveryStatus' => 'Delivered', 'link' => '#'])

<a href="{{$link}}" class="w-full h-fit flex flex-row justify-between items-center p-4 border-b border-black bg-primary font-josefinsans hover:bg-primaryDark transition duration-400 cursor-pointer">

    <!-- Transaction Information -->
    <div class="w-full flex flex-col">

        <!-- Transaction Date and Transaction ID -->
        <div class="w-full flex flex-row gap-4 text-sm text-gray-500/[0.5]">
            <h4>22/10/2023</h4>
            <h4>#3719375920</h4>
        </div>

        <!-- Transaction Information and Button -->
        <div class="w-full flex flex-row items-center justify-between">
            <!-- Transaction Information -->
            <div class="flex flex-col">
                <h3 class="text-2xl">Daniel Yohanes</h3>
                <h4>3 item(s)</h4>
                <h3 class="text-3xl text-secondary">Rp 24,750</h3>
            </div>

            <!-- Address -->
            <div class="flex flex-col text-center text-sm">
                <h4>Jl. Mentas Selatan 1 no. 34</h4>
                <h4>Menteng Atas, Setiabudi</h4>
                <h4>Jakarta Selatan, DKI Jakarta</h4>
                <h4>12960</h4>
            </div>

            <!-- Transaction Status -->
            <div class="flex flex-col text-center">
                <h4>Deivery Status</h4>
                <h3 class="text-2xl
                @if($deliveryStatus === 'Under Process')
                        text-red-600
                    @elseif($deliveryStatus === 'Delivering')
                        text-orange-500
                    @elseif($deliveryStatus === 'Delivered')
                        text-green-600
                    @endif
                ">{{$deliveryStatus}}</h3>
            </div>

            <!-- View Transaction Detail Button
            <a class="btn btn-secondary w-[250px] font-normal normal-case px-14 text-md rounded-none">View Transaction</a> -->
        </div>

    </div>
</a>