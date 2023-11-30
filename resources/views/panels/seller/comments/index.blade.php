<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between">
            <div class="">
                {{ __('Comments management') }}
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(session('success'))
                        <p class="text-xl text-center text-green-700">{{session('success')}}</p>
                    @else
                        <p class="text-xl text-center text-red-700">{{session('fail')}}</p>

                    @endif
                    <table class="table-fixed w-full">
                        <thead>
                        <tr>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="space-y-4">
                        @forelse($comments as $comment)
                              <tr class="">
                                  <th class="text-center text-xl text-green-700">{{$comment->message}}</th>
                                  <th class="text-center  text-xl">
                                      <div class="flex justify-center space-x-4 my-2">
                                          <form action="{{route('comments.update', $comment->id)}}" method="post">
                                              @csrf
                                              @method('PUT')
                                              <button type="submit"
                                                      class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                                              >Accept</button>
                                          </form>
                                          <form action="{{route('comments.destroy', $comment->id)}}" method="post">
                                              @csrf
                                              @method("DELETE")
                                              <button type="submit"
                                                      class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                                              >Delete</button>
                                          </form>
                                      </div>
                                  </th>
                              </tr>
                        @empty
                            <tr>
                                <th class="text-center text-xl text-red-800">There is no message yet!</th>
                                <th class="text-center text-xl text-red-800">And no actions</th>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
{{--    {{ $comments->links()  }}--}}
</x-app-layout>
