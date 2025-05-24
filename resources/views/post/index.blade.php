<x-app-layout>
    <div class="py-4">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xs sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    <x-category-tabs /> 
                </div>
            </div>
        </div>

        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
        
            <div class="mt-8 flex flex-col sm:flex-row items-center justify-between">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    <h2 class="text-3xl font-bold">Latest Posts</h2>
                </div>

            </div>

            <div class="mt-8">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        {{-- Loop through posts --}}
                        @forelse ($posts as $post)
                            <x-post-item :post="$post" />
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