@props(['user', 'size' => 'w-12 h-12'])

<div>
    <img class="{{ $size }} rounded-full object-cover" src="{{ $user->avatarUrl() }}" alt="{{ $user->name }}" />
</div>