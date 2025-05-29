@props(['user'])

<div x-data="{ 
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
    {{ $slot }}
</div>