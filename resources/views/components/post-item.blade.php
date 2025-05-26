<div class="bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
    <img class="rounded-t-lg w-full h-48 object-cover aspect-video" src={{ Storage::url($post->image) ?? "https://flowbite.com/docs/images/blog/image-1.jpg" }} alt="" />
    <div class="p-5">
        <div>
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
            </a>
            <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                {{ Str::words($post->content, 20) }}
            </div>
        </div>    
        <div class="flex items-center justify-between mb-3 w-full">
            <a href="#">
                <x-primary-button>
                    Read more
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </x-primary-button>
            </a>
            <div class="mt-2">
                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
            </div>
        </div>
    </div>
</div>