<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between">
            <div class="">
                {{ __('Orders') }}
            </div>
            <div>
{{--                <form action="">--}}
{{--                    --}}
{{--                </form>--}}
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
                            <th>ordered by</th>
                            <th>status</th>
                            <th>income</th>
                            <th>ordered at</th>
                        </tr>
                        </thead>
                        <tbody class="space-y-4">
                        @forelse($orders as $order)
                            <tr>
                                <td class="text-gray-500 text-xl text-center py-4">
                                    {{$order->user->name}}
                                </td>

                                <td class="text-gray-500 text-xl text-center py-4">
                                    {{$order->status}}
                                </td>
                                <td class="text-gray-500 text-xl text-center py-4">
{{--                                    {{$order->total_price}}--}}
                                </td>
                                <td class="text-gray-500 text-xl text-center py-4">
                                    {{$order->created_at}}
                                </td>
                                <td>
{{--                                    <div class="flex justify-center space-x-4">--}}
{{--                                        <form action="{{route('schedules.destroy', $schedule)}}" method="post">--}}
{{--                                            @csrf--}}
{{--                                            @method("DELETE")--}}
{{--                                            <x-danger-button class="ms-3">--}}
{{--                                                {{ __('Delete') }}--}}
{{--                                            </x-danger-button>--}}
{{--                                        </form>--}}
{{--                                        <a class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-500 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellowed-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" href="{{ route('schedules.edit', $schedule) }}">--}}
{{--                                            {{ __('Edit') }}--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th class="text-center text-xl text-red-800">There is no open time</th>
                                <th class="text-center text-xl text-red-800">And no close time</th>
                                <th class="text-center text-xl text-red-800">No day</th>
                                <th class="text-center text-xl text-red-800">And no action</th>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="bg-gray-800 flex justify-center space-x-8">
                    <div class="flex text-xl text-blue-700">
                        <h1>total Orders : </h1>
                        <p>{{$orders->count()}}</p>
                    </div>
                    <div class="flex text-xl text-green-700">
                        <h1>total income : </h1>
                        <p>{{array_sum($orders->pluck('total_price')->toArray())}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
