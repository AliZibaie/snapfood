<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between">
            <div class="">
                {{ __('Archives') }}
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(session('success'))
                        <p class="text-xl text-center text-green-700">{{session('success')}}</p>
                    @else
                        <p class="text-xl text-center text-red-700">{{session('fail')}}</p>

                    @endif
                    <table class="table-fixed w-full">
                        <thead>
                        <tr>
                            <th>Destination</th>
                            <th>Foods</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody class="space-y-4">
                        @forelse($orders as $order)
                            <tr>
                                <td class="text-gray-500 text-xl text-center py-4">
                                    {{$order['address']}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th class="text-center text-xl text-red-800">There is no address</th>
                                <th class="text-center text-xl text-red-800">And no status</th>
                                <th class="text-center text-xl text-red-800">And no action</th>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
