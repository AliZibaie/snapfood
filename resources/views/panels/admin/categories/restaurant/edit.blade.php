<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('restaurant.update', $category) }}">
                        @csrf
                        @method('PATCH')
                        <div class="py-4">
                            <!--Type-->
                            <div>
                                <x-input-label for="type" :value="__('type')"  class="text-lg mt-6 " />
                                <x-text-input id="type" class="block mt-1 w-full" type="text" name="type" :value="$category->type"  autofocus autocomplete="type" />
                                <x-input-error :messages="$errors->get('type')" class="mt-2 text-xl" />
                            </div>
                        </div>


                        <div class="flex items-center justify-between mt-4">
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('restaurant.index') }}">
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
