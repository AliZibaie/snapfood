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
                            <th>Food</th>
                            <th>count</th>
                            <th>income</th>
                            <th>ordered by</th>
                            <th>More details</th>
                        </tr>
                        </thead>
                        <tbody class="space-y-4">
                        @forelse($orders as $order)
                            <tr>
                                <td class="text-gray-500 text-xl text-center py-4">
                                    {{$order->food->name}}
                                </td>
                                <td class="text-gray-500 text-xl text-center py-4">
                                    {{$order->count}}
                                </td>
                                <td class="text-gray-500 text-xl text-center py-4">
                                    {{$order->total_price}}
                                </td>
                                <td class="text-gray-500 text-xl text-center py-4">
                                    {{$order->user->name}}
                                </td>
                                <td>
                                    <a class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-yellowed-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" href="{{ route('archives.show', $order) }}">
                                        {{ __('Info') }}
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th class="text-center text-xl text-red-800">There is no food</th>
                                <th class="text-center text-xl text-red-800">And no count</th>
                                <th class="text-center text-xl text-red-800">And no total price</th>
                                <th class="text-center text-xl text-red-800">And no user name</th>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
