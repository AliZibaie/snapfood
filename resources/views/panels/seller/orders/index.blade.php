<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between">
            <div class="">
                {{ __('Orders management') }}
            </div>
            <x-nav-link :href="route('archives.index')">
                {{ __('Archives') }}
            </x-nav-link>
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
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="space-y-4">
                        @forelse($orders as $order)
                            <tr>
                                <td class="text-gray-500 text-xl text-center py-4">
                                    {{$order['address']}}
                                </td>
                                <form action="{{route('orders.update', $order['id'])}}" method="post">
                                <td class="text-gray-500 text-xl text-center py-4">
                                    <label class="bg-gray-700">
                                        <select class="bg-gray-700" name="status">
                                            @foreach($order['status'] as $status)
                                            <option value="{{$status}}" class="bg-gray-700">{{$status}}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </td>
                                <td>
                                    <div class="flex justify-center space-x-4">

                                            @csrf
                                            @method("PATCH")
                                        <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-500 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Change</button>
                                </td>
                                </form>
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
