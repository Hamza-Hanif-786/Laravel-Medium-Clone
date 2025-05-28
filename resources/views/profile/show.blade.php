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
                    <div class="w-[25%] border-l pl-8" 
                    x-data="{ 
                        following: {{ $user->isFollowedBy(auth()->user()) ? 'true' : 'false' }},
                        followersCount: {{ $user->followers->count() }},
                        follow() {
                            this.following = !this.following;
                            axios.post('/follow/{{ $user->id }}').then(response => {
                                console.log(response.data)
                                this.followersCount = response.data.followers;
                            }).catch(error => {
                                console.error(error);
                            });
                        } 
                    }">
                        <x-user-avatar :user="$user" size="size-24" />
                        <h3 class="font-bold mt-4 text-lg">{{ $user->name }}</h3>
                        <p class="text-gray-500 mt-2 text-lg"><span x-text="followersCount"></span> Followers</p>
                        <p class="text-gray-800 mt-2 text-lg">
                            {{ $user->bio ?? 'No bio available' }}
                        </p>
                        @if (auth()->user() && auth()->user()->id !== $user->id)
                            <div class="mt-4">
                                <button x-text="following ? 'Unfollow' : 'Follow'" x-on:click="follow()" :class="following ? 'bg-emerald-800 hover:bg-emerald-900' : 'bg-emerald-600 hover:bg-emerald-700'"
                                    class="px-4 py-2 cursor-pointer bg-emerald-600 text-white rounded-full hover:bg-emerald-700 transition-colors">
                                </button> 
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>