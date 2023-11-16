<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('discounts.store') }}">
                        @csrf

                        <div class="py-4">
                            <!--Code-->
                            <div>
                                <x-input-label for="code" :value="__('code')"  class="text-lg mt-6 " />
                                <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')"  autofocus autocomplete="code" />
                                <x-input-error :messages="$errors->get('code')" class="mt-2 text-xl" />
                            </div>
                            <!--Amount-->
                            <div>
                                <x-input-label for="amount" :value="__('amount')"  class="text-lg mt-6 " />
                                <x-text-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount')"  autofocus autocomplete="amount" />
                                <x-input-error :messages="$errors->get('amount')" class="mt-2 text-xl" />
                            </div>
                            <!--Expires_at-->
                            <div>
                                <x-input-label for="expires_at" :value="__('expires_at')"  class="text-lg mt-6 " />
                                <x-text-input id="expires_at" class="block mt-1 w-full" type="date" name="expires_at" :value="old('expires_at')"  autofocus autocomplete="expires_at" />
                                <x-input-error :messages="$errors->get('expires_at')" class="mt-2 text-xl" />
                            </div>
                        </div>


                        <div class="flex items-center justify-between mt-4">
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('discounts.index') }}">
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
