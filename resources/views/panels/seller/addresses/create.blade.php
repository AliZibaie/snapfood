<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('addresses.store') }}">
                        @csrf

                        <div class="py-4">
                            <!--Title-->
                            <div>
                                <x-input-label for="title" :value="__('Title')"  class="text-lg mt-6 " />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"  autofocus autocomplete="title" />
                                <x-input-error :messages="$errors->get('title')" class="mt-2 text-xl" />
                            </div>
                            <!--Address-->
                            <div>
                                <x-input-label for="address" :value="__('Address')"  class="text-lg mt-6 " />
                                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"  autofocus autocomplete="address" />
                                <x-input-error :messages="$errors->get('address')" class="mt-2 text-xl" />
                            </div>
                            <!--Latitude-->
                            <div>
                                <x-input-label for="latitude" :value="__('Latitude')"  class="text-lg mt-6 " />
                                <x-text-input id="latitude" class="block mt-1 w-full" type="number" name="latitude" :value="old('latitude')"  autofocus autocomplete="latitude" />
                                <x-input-error :messages="$errors->get('latitude')" class="mt-2 text-xl" />
                            </div>
                            <!--Longitude-->
                            <div>
                                <x-input-label for="longitude" :value="__('Longitude')"  class="text-lg mt-6 " />
                                <x-text-input id="longitude" class="block mt-1 w-full" type="number" name="longitude" :value="old('longitude')"  autofocus autocomplete="longitude" />
                                <x-input-error :messages="$errors->get('longitude')" class="mt-2 text-xl" />
                            </div>
                        </div>


                        <div class="flex items-center justify-between mt-4">
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('addresses.index') }}">
                                {{ __('Back') }}
                            </a>

                            <x-primary-button class="ms-3">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
