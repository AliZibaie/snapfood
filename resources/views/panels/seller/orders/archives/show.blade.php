<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between">
            <div class="">
                {{ __('order Info') }}
            </div>
        </h2>
    </x-slot>
        <div class=" h-auto space-y-3  ">
            <div class="flex justify-center items-center sm:justify-between w-2/3">
                <h2 class="text-blue-700 text-2xl font-bold tracking-widest">Ordered by : {{$order->user->name}}</h2>
                <h2 class="text-blue-700 text-2xl font-bold tracking-widest">Email: {{$order->user->email}}</h2>
            </div>
            <div class="flex justify-between w-2/3 ">
                <p class="text-xl text-green-700">Food name : {{$order->food->name}}</p>
                <p class="text-xl text-green-700">Food price : {{$order->food->price}}</p>
                <p class="text-xl text-green-700">Food count : {{$order->count}}</p>
                @if($order->food->discount)
                    <p class="text-xl text-green-700">Food discount : {{$order->food->discount->label}}</p>
                @endif
                <p class="text-xl text-green-700">Total price : {{$order->total_price}}</p>
            </div>

        </div>
</x-app-layout>
