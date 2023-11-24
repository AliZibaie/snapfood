<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('foods.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="py-4">
                            <!--Name-->
                            <div>
                                <x-input-label for="name" :value="__('Name')"  class="text-xl mt-6 " />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2 text-xl" />
                            </div>

                            <!--Raw materials-->
                            <div>
                                <x-input-label for="raw_materials" :value="__('Raw materials')" class="text-xl mt-6 "  />
                                <x-text-input id="raw_materials" class="block mt-1 w-full" type="text" name="raw_materials" :value="old('raw_materials')"  autofocus autocomplete="raw_materials" />
                                <x-input-error :messages="$errors->get('raw_materials')" class="mt-2 text-xl" />
                            </div>

                            <!--Price-->
                            <div>
                                <x-input-label for="price" :value="__('Price')" class="text-xl mt-6 "  />
                                <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')"  autofocus autocomplete="price"  />
                                <x-input-error :messages="$errors->get('price')" class="mt-2 text-xl" />
                            </div>

                            <div>
                                <label for="" class="block font-medium text-xl text-gray-700 dark:text-gray-300">category</label>
                                <select name="type[]" id="" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" multiple>
                                    <option value="" selected disabled>Select Food category</option>
                                    @forelse($foodCategories as $foodCategory)
                                        <option value="{{$foodCategory->type}}">{{$foodCategory->type}}</option>
                                    @empty
                                        <option value="" disabled>There is no category yet!</option>
                                    @endforelse
                                </select>
                                @error('type')
                                <p class="text-red-400">{{$message}}</p>
                                @enderror
                            </div>
                            <!--Image-->
                            <div>
                                <x-input-label for="image" :value="__('Upload image')" class="text-xl mt-6 " />
                                <x-text-input id="image" class="hidden mt-1 w-full" type="File" name="image" :value="old('image')"  autofocus autocomplete="image" />
                                <x-input-error :messages="$errors->get('image')" class="mt-2  text-xl" />
                            </div>
                        </div>


                        <div class="flex items-center justify-between mt-4">
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('foods.index') }}">
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
