<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Answer comment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <form method="post" action="{{ route('comments.answer', $comment) }}" class="mt-6 space-y-6" >
                            <p class="text-blue-700 text-xl">{{$comment->message}}</p>
                            @csrf
                                <div class="">
                                    <x-input-label for="message" :value="__('Reply message')" />
                                    <x-text-input id="message" name="message" type="text" class="umt-1 block w-full " :value="old('message', $comment->comment->message ?? '')" required autofocus autocomplete="message" />
                                    <x-input-error class="mt-2" :messages="$errors->get('message')" />
                                </div>
                            @if(!$comment->comment)
                                <button type="submit" class="
                                inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150
                                ">Send</button>
                            @else

                                <p class="text-green-700 text-xl  inline">you have answered this comment before</p>
                            @endif
                            @if(session('success'))
                                <p class="text-xl text-center text-green-700">{{session('success')}}</p>
                            @endif
                            @if(session('fail'))
                                <p class="text-xl text-center text-red-700">{{session('fail')}}</p>
                            @endif
                        </form>
                    </section>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
