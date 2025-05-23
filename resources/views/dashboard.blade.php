<x-app-layout>
    <div class="py-4">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xs sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    <ul class="flex flex-wrap justify-center text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                        <li class="me-2">
                            <a href="#" class="inline-block px-4 py-2 text-white bg-blue-600 rounded-lg active" aria-current="page">All</a>
                        </li>
                        
                        @foreach ($categories as $category)
                            <li class="me-2">
                                <a href="#" class="inline-block px-4 py-2 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
        
            <div class="mt-8 flex items-center justify-between">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    <h2 class="text-3xl font-bold">Latest Posts</h2>
                </div>

                {{-- Search Bar --}}

                <div class="p-4">
                    <form action="{{ route('dashboard') }}" method="GET" class="flex items-center">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search posts..." class="border border-gray-300 rounded-lg p-2 w-full" required>
                        <button type="submit" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded-lg cursor-pointer">Search</button>
                    </form>
                </div>
            </div>

            <div class="mt-8">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        {{-- Loop through posts --}}
                        @forelse ($posts as $post)
                            <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                <a href="#">
                                    <img class="rounded-t-lg" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="" />
                                </a>
                                <div class="p-5">
                                    <a href="#">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
                                    </a>
                                    <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                        {{ Str::words($post->content, 20) }}
                                    </div>
                                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Read more
                                         <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                        </svg>
                                    </a>
                                    <div class="mt-2">
                                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                            <div class="col-span-4">
                                <p class="text-center text-5xl text-gray-500 dark:text-gray-400">No posts found.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>


            <div class="mt-8">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>