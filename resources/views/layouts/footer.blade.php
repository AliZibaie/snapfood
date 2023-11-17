@if(!Auth::user()->getRoleNames()->first())
    <div class="h-12 w-full absolute bottom-0 bg-gray-800 flex items-center p-8">
        <a class=" inline-flex items-center px-3 py-2 border border-transparent text-lg leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150" href="{{route('restaurants.create')}}">
            Are you seller?
        </a>
    </div>

@endif
