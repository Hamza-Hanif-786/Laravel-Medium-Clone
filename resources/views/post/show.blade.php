<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xs sm:rounded-lg p-8">
                <h1 class="text-5xl mb-4 font-black">{{ $post->title }}</h1>

                {{-- User Avatar Section --}}
                <div class="flex items-center mb-4 gap-2">
                    @if ($post->user->image)
                        <img src="{{ $post->user->imageUrl() }}" alt="{{ $post->user->name }}" class="size-14 rounded-full mr-2">
                    @else
                        <img src="{{ asset('default_avatar.png') }}" alt="{{ $post->user->name }}" class="size-14 rounded-full mr-2">
                    @endif
                    <div>
                        <div class="flex gap-2">
                            <a href="{{ route('profile.show', $post->user) }}" class="hover:underline text-gray-800">
                                {{ $post->user->name }}
                            </a>
                            &middot;
                            <a href="#" class="text-emerald-600 hover:underline">Follow</a>
                        </div>
                        <div class="flex gap-2 text-gray-600 dark:text-gray-400">
                            {{ $post->readTime() }} min read
                            &middot;
                            {{ $post->created_at->format('M d, Y') }}
                        </div>
                    </div>
                </div>
                {{-- User Avatar Section --}}

                {{-- Clap Section --}}
                <div class="mt-8 p-4 border-t border-b">
                    <x-like-button />
                </div>
                {{-- Clap Section --}}

                {{-- Post Content Section --}}
                <div class="mt-8">
                    <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="rounded-lg">
                    <div class="mt-4 text-xl">
                        {{ $post->content }}
                    </div>
                </div>
                {{-- Post Content Section --}}

                {{-- Category Section --}}
                <div class="mt-8">
                    <span class="px-4 py-2 bg-gray-200 rounded-full text-lg text-gray-700 dark:text-gray-300">
                        {{ $post->category->name }}
                    </span>
                </div>
                {{-- Category Section --}}

                {{-- Clap Section --}}
                <div class="mt-8 p-4 border-t border-b">
                    <x-like-button />
                </div>
                {{-- Clap Section --}}
            </div>
        </div>
    </div>
</x-app-layout>