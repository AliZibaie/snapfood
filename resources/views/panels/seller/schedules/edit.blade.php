<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('schedules.update', $schedule) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="py-4">
                            <!--Open time-->
                            <div>
                                <x-input-label for="open_time" :value="__('Open time')"  class="text-xl mt-6 " />
                                <x-text-input id="open_time" class="block mt-1 w-full" type="time" name="open_time" :value="old('open_time', $schedule->open_time)"  autofocus autocomplete="open_time" />
                                <x-input-error :messages="$errors->get('open_time')" class="mt-2 text-xl" />
                            </div>

                            <!--Close time-->
                            <div>
                                <x-input-label for="close_time" :value="__('Close time')"  class="text-xl mt-6 " />
                                <x-text-input id="close_time" class="block mt-1 w-full" type="time" name="close_time" :value="old('close_time', $schedule->close_time)"  autofocus autocomplete="close_time" />
                                <x-input-error :messages="$errors->get('close_time')" class="mt-2 text-xl" />
                            </div>




                        </div>


                        <div class="flex items-center justify-between mt-4">
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('schedules.index') }}">
                                {{ __('Back') }}
                            </a>

                            <x-primary-button class="ms-3">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
