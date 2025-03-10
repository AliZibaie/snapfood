<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between">
            <div class="">
                {{ __('orders') }}
            </div>
        </h2>
    </x-slot>
    @forelse($restaurants as $restaurant)
        <div class="mx-auto" style="width: 1000px">
            <p class="text-xl text-red-700 text-center">Restaurant name : {{$restaurant->name}}</p>
            @forelse($restaurant->orders as $order)
                <div class=" h-auto space-y-3 ">
                    <div class="flex justify-center items-center sm:justify-between ">
                        <h2 class="text-purple-700 text-2xl font-bold tracking-widest">Ordered by : {{$order->user->name}}</h2>
                        <h2 class="text-purple-700 text-2xl font-bold tracking-widest">Email: {{$order->user->email}}</h2>
                    </div>
                    <div class="flex justify-between w-2/3 items-center h-40">
                        <p class="text-xl text-green-700">Food name : {{$order->food->name}}</p>
                        <p class="text-xl text-green-700">Food price : {{$order->food->price}}</p>
                        <p class="text-xl text-green-700">Food count : {{$order->count}}</p>
                        @if($order->food->discount)
                            <p class="text-xl text-green-700">Food discount : {{$order->food->discount->label}}</p>
                        @endif
                        <p class="text-xl text-green-700">Total price : {{$order->total_price}}</p>
                    </div>

                </div>
            @empty
        </div>
            <p class="text-red-800 text-xl text-center">There is no order for this restaurant yet!</p>
        @endforelse
    @empty
        <p class="text-red-800 text-xl text-center">There is no restaurant yet!</p>
    @endforelse
{{--    {{$restaurants->links()}}--}}
</x-app-layout>
