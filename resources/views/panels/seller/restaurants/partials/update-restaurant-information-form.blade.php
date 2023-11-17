<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Restaurant Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your restaurants information") }}
        </p>
    </header>
    <form method="post" action="{{ route('restaurants.update', Auth::user()->restaurant) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Restaurant name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', Auth::user()->restaurant->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="account_number" :value="__('Account number')" />
            <x-text-input id="account_number" name="account_number" type="number" class="mt-1 block w-full" :value="old('account_number', Auth::user()->restaurant->account_number)" required autocomplete="account_number" />
            <x-input-error class="mt-2" :messages="$errors->get('account_number')" />
        </div>

        <div>
            <x-input-label for="phone" :value="__('Phone number')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', Auth::user()->restaurant->phone)" required autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            <label for="" class="block font-medium text-sm text-gray-700 dark:text-gray-300">category</label>
            <select name="type[]" id="" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" multiple>
                <option value="" selected disabled>Select Restaurant category</option>
                    @forelse( Auth::user()->restaurant->restaurantCategories as $type)
                            <option value="{{$type->type}}" selected>{{$type->type}}</option>
                    @empty
                    @endforelse
                @forelse($categories as $category)
                    <option value="{{$category->type}}">{{$category->type}}</option>
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
