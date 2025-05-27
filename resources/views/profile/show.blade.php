<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl sm:px-6 lg:px-8 mx-auto space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="flex w-full">
                    <div class="w-[75%] pr-8">
                        <h1 class="font-bold text-5xl">{{ $user->name }}</h1>
                        <div class="space-y-6 mt-8">
                            @forelse ($posts as $post)
                                <x-post-item :post="$post" />
                            @empty
                                <div class="col-span-4">
                                    <p class="text-center text-5xl text-gray-500 dark:text-gray-400">No posts found.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="w-[25%] border-l pl-8">
                        <x-user-avatar :user="$user" size="size-24" />
                        <h3 class="font-bold mt-4 text-lg">{{ $user->name }}</h3>
                        <p class="text-gray-500 mt-2 text-lg">26K Followers</p>
                        <p class="text-gray-800 mt-2 text-lg">
                            {{ $user->bio ?? 'No bio available' }}
                        </p>
                        <div class="mt-4">
                            <button class="px-4 py-2 bg-emerald-600 text-white rounded-full hover:bg-emerald-700 transition-colors">
                                Follow
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>