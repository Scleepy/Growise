<a href=""
    class="w-full h-fit flex flex-row justify-between items-center p-4 border-b border-black bg-primary font-josefinsans hover:bg-primaryDark transition duration-400 cursor-pointer">

    <!-- Transaction Information -->
    <div class="w-full flex flex-col">

        <!-- Transaction Date and Transaction ID -->
        <div class="w-full flex flex-row gap-4 text-sm text-gray-500/[0.5]">
            <h4>{{ $transaction->TransactionDate }}</h4>
            <h4>#{{ $transaction->id }}</h4>
        </div>

        <!-- Transaction Information and Button -->
        <div class="w-full flex flex-row items-center justify-between">
            <!-- Transaction Information -->
            <div class="flex flex-col">
                <h3 class="text-2xl">{{ $transaction->user->FullName }}</h3>
                <h3 class="text-3xl text-secondary">Rp
                    {{ app('App\Http\Controllers\TransactionHeaderController')->getTransactionTotal($transaction) }}
                </h3>
            </div>

            <!-- Address -->
            <div class="flex flex-col text-center text-sm">
                <h4>{{ $transaction->user->Address }}</h4>
            </div>

            <!-- Transaction Status -->
            <div class="flex flex-col text-center">
                <h4>Deivery Status</h4>
                <h3
                    class="text-2xl
                @if ($transaction->shipmentStatus->status->StatusName === 'Processing') text-red-600
                    @elseif($transaction->shipmentStatus->status->StatusName === 'Delivering')
                        text-orange-500
                    @elseif($transaction->shipmentStatus->status->StatusName === 'Delivered')
                        text-green-600 @endif
                ">
                    {{ $transaction->shipmentStatus->status->StatusName }}</h3>
            </div>

            <!-- View Transaction Detail Button
            <a class="btn btn-secondary w-[250px] font-normal normal-case px-14 text-md rounded-none">View Transaction</a> -->
        </div>

    </div>
</a>
