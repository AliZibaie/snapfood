<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Food') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Food Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __("Update your food information") }}
                            </p>
                        </header>
                        <form method="post" action="{{ route('foods.update', $food) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div>
                                <x-input-label for="name" :value="__('Food name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $food->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                            <div>
                                <x-input-label for="raw_materials" :value="__('Raw materials')" />
                                <x-text-input id="raw_materials" name="raw_materials" type="text" class="mt-1 block w-full" :value="old('raw_materials', $food->raw_materials)" required autofocus autocomplete="raw_materials" />
                                <x-input-error class="mt-2" :messages="$errors->get('shipping_cost')" />
                            </div>
                            <div>
                                <x-input-label for="price" :value="__('Price')" />
                                <x-text-input id="price" name="price" type="number" class="mt-1 block w-full" :value="old('price', $food->price)" required autocomplete="price" />
                                <x-input-error class="mt-2" :messages="$errors->get('price')" />
                            </div>
                            <img src="{{asset($food->image->url ?? '')}}" alt="food image" class="w-full max-h-20">
                            <!--Image-->
                            <div>
                                <x-input-label for="image" :value="__('Upload image')" class="text-xl mt-6 " />
                                <x-text-input id="image" class="hidden mt-1 w-full" type="File" name="image" :value="old('image', $food->image)"  autofocus autocomplete="image" />
                                <x-input-error :messages="$errors->get('image')" class="mt-2  text-xl" />
                            </div>

                            <div>
                                <label for="" class="block font-medium text-sm text-gray-700 dark:text-gray-300">category</label>
                                <select name="type[]" id="" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" multiple>
                                    <option value="" selected disabled>Select Restaurant category</option>
                                    @forelse( $food->foodCategories as $foodCategory)
                                        <option value="{{$foodCategory->type}}" selected>{{$foodCategory->type}}</option>
                                    @empty
                                    @endforelse
                                    @forelse($unselectedTypes as $type)
                                        <option value="{{$type->type}}">{{$type->type}}</option>
                                    @empty
                                        <option value="" disabled>There is no category yet!</option>
                                    @endforelse
                                </select>
                                @error('type')
                                <p class="text-red-400">{{$message}}</p>
                                @enderror
                            </div>
                            @if(session('success'))
                                <p class="text-xl text-center text-green-700">{{session('success')}}</p>
                            @endif
                            @if(session('fail'))
                                <p class="text-xl text-center text-red-700">{{session('fail')}}</p>
                            @endif
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>

                                @if (session('status') === 'profile-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400"
                                    >{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>

                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
