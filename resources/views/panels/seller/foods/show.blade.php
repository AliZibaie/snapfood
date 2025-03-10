<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between">
            <div class="">
                {{ __('Food management') }}
            </div>
        </h2>
    </x-slot>
    <div class="flex flex-col justify-between items-start py-5 w-auto h-auto  px-8 bg-gray-800 rounded-lg md:flex-row mt-8 h-[70vh] w-[100vh] mx-auto">
        <div class="relative">
        <div class="flex justify-center items-center w-70 h-70 bg-gradient-to-r from-yellow-400 to-[red] rounded-lg hover:-translate-y-10 duration-700 hover:scale-125">
            <img src="{{asset($food->image->url ?? '')}}" alt=""  class="max-w-xs max-h-xs">

        </div>
        <a class="px-8 py-2 bg-green-600  rounded-md text-red-700 font-semibold shadow-xl shadow-blue-500/50 hover:ring-2 ring-blue-400 hover:scale-75 duration-500 absolute
        -bottom-60
        " href="{{route('foods.index')}}">back</a>
    </div>
        <div class=" h-auto space-y-3 relative">
            <div class="flex justify-center items-center sm:justify-between">
                <h2 class="text-blue-700 text-2xl font-bold tracking-widest">{{$food->name}}</h2>
            </div>
            <p class="text-md text-yellow-200">{{$food->raw_materials ?? ''}}</p>
            <ul>
                @foreach($food->foodCategories->pluck('type') as $type)
                    <li class="text-lg text-purple-600">{{$type}}</li>
                @endforeach
            </ul>
            <div class="flex gap-6 items-center justify-center ">
                @if($food->discount && $food->discount->label)
                    <p class="text-white font-bold text-lg">{{$food->discount->label}} OFF</p>
                    <p class="text-white font-bold text-lg">{{((int) $food->price * (100 - (int) $food->discount->label))/100 }}$</p>
                    <p class="text-gray-300 font-semibold text-sm line-through">{{$food->price}}</p>
                @else
                    <p class="text-green-600 font-bold text-lg">{{$food->price}}</p>
                @endif

            </div>
        </div>
        <div class="flex  my-2 absolute bottom-20 right-80  w-96">
            <form action="{{route('foods.assign', $food)}}" method="post" class="flex justify-between">
                @csrf
                @method('PATCH')
                <button type="submit" class="px-2 border-2 border-white p-1 rounded-md text-white font-semibold shadow-lg shadow-white hover:scale-75 duration-500">Assign discount</button>
                <div class="">

                    <select name="discount" id="" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" >
                        <option value="" selected disabled>Select discount</option>
                        @forelse($discounts as $discount)
                            <option value="{{$discount->id}}">{{$discount->label}}</option>
                        @empty
                            <option value="" disabled>There is no discount yet!</option>
                        @endforelse
                    </select>
                    @error('discount')
                    <p class="text-red-400">{{$message}}</p>
                    @enderror
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
