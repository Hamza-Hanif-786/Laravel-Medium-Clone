@props(['user', 'size' => 'size-14'])

{{-- User Avatar Component --}}
{{-- Displays the user's avatar with a default image if none is provided --}}
{{-- Usage: <x-user-avatar :user="$user" :size="size-28" /> --}}

@if ($user->image)
    <img src="{{ $user->imageUrl() }}" alt="{{ $user->name }}" class="{{ $size }} rounded-full">
@else
    <img src="{{ asset('default_avatar.png') }}" alt="{{ $user->name }}" class="{{ $size }} rounded-full">
@endif