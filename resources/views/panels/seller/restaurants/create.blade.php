<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('restaurants.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="py-4">
                            <!--Name-->
                            <div>
                                <x-input-label for="name" :value="__('Name')"  class="text-xl mt-6 " />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="Auth::user()->name"  autofocus autocomplete="name" disabled/>
                                <x-input-error :messages="$errors->get('name')" class="mt-2 text-xl" />
                            </div>

                            <!--Email-->
                            <div>
                                <x-input-label for="email" :value="__('Email')" class="text-xl mt-6 "  />
                                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="Auth::user()->email"  autofocus autocomplete="email"  disabled/>
                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-xl" />
                            </div>
                            <!--Phone number-->
                            <div>
                                <x-input-label for="phone" :value="__('Phone number')" class="text-xl mt-6 " />
                                <x-text-input id="phone" class=" mt-1 w-full" type="text" name="phone" :value="old('phone')"  autofocus autocomplete="phone"  />
                                <x-input-error :messages="$errors->get('phone')" class="mt-2  text-xl" />
                            </div>
                            <!--Account number-->
                            <div>
                                <x-input-label for="account_number" :value="__('Account number')" class="text-xl mt-6 " />
                                <x-text-input id="account_number" class=" mt-1 w-full" type="text" name="account_number" :value="old('account_number')"  autofocus autocomplete="account_number" />
                                <x-input-error :messages="$errors->get('account_number')" class="mt-2  text-xl" />
                            </div>
                        </div>


                        <div class="flex items-center justify-between mt-4">
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('dashboard') }}">
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
