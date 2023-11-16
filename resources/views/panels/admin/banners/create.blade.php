<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form method="POST" action="{{ route('banners.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="py-4">
                                <!--Title-->
                                <div>
                                    <x-input-label for="title" :value="__('title')"  class="text-xl mt-6 " />
                                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"  autofocus autocomplete="title" />
                                    <x-input-error :messages="$errors->get('title')" class="mt-2 text-xl" />
                                </div>

                                <!--Alt-->
                                <div>
                                    <x-input-label for="alt" :value="__('Alternative word')" class="text-xl mt-6 "  />
                                    <x-text-input id="alt" class="block mt-1 w-full" type="text" name="alt" :value="old('alt')"  autofocus autocomplete="alt" />
                                    <x-input-error :messages="$errors->get('alt')" class="mt-2 text-xl" />
                                </div>
                                <!--Image-->
                                <div>
                                    <x-input-label for="image" :value="__('Upload image')" class="text-xl mt-6 " />
                                    <x-text-input id="image" class="hidden mt-1 w-full" type="File" name="image" :value="old('image')"  autofocus autocomplete="image" />
                                    <x-input-error :messages="$errors->get('image')" class="mt-2  text-xl" />
                                </div>
                            </div>


                            <div class="flex items-center justify-between mt-4">
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('banners.index') }}">
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
