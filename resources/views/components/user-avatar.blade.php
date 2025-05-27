@props(['user'])

@if ($user->image)
    <img src="{{ $user->imageUrl() }}" alt="{{ $user->name }}" class="size-14 rounded-full mr-2">
@else
    <img src="{{ asset('default_avatar.png') }}" alt="{{ $user->name }}" class="size-14 rounded-full mr-2">
@endif