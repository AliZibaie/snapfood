<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between">
            <div class="">
                {{ __('Banner management') }}
            </div>
            <x-nav-link :href="route('banners.create')">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none"><path d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z"/><path fill="currentColor" d="M10.5 20a1.5 1.5 0 0 0 3 0v-6.5H20a1.5 1.5 0 0 0 0-3h-6.5V4a1.5 1.5 0 0 0-3 0v6.5H4a1.5 1.5 0 0 0 0 3h6.5V20Z"/></g></svg>
                {{ __('Add') }}
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
                            <th>Banners list</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="space-y-4">
                            @forelse($banners as $banner)
                                <tr >
                                <td>
                                    <div class="relative">
                                            <img src="{{asset($banner->image->url)}}" alt="{{$banner->alt}}" class="w-full max-h-20">
                                            <p class="absolute top-5 left-60 text-black text-xl">{{$banner->title}}</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex justify-center">
                                        @can('banners.delete')
                                        <form action="{{route('banners.destroy', $banner)}}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <x-danger-button class="ms-3">
                                                {{ __('Delete') }}
                                            </x-danger-button>
                                        </form>
                                        @endcan
                                        @can('banners.edit')
                                        <form action="{{route('banners.update', $banner)}}" method="post">
                                            @csrf
                                            @method("PATCH")
                                            <x-primary-button class="ms-3">
                                                {{ __('Set') }}
                                            </x-primary-button>
                                        </form>
                                            @endcan

                                    </div>
                                </td>
                                </tr>
                            @empty
                                <tr>
                                <th class="text-center text-xl text-red-800">There is no banner yet!</th>
                                <th class="text-center text-xl text-red-800">And of course there is no action!</th>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{$banners->links()}}
</x-app-layout>
