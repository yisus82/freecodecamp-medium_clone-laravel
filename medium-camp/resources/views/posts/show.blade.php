<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h1 class="text-2xl mb-4">{{ $post->title }}</h1>

                <!-- Author Section -->
                <div class="flex gap-4">
                    <x-avatar :user="$post->user" />
                    <div>
                        <x-follow-ctr :user="$post->user" class="flex gap-2">
                            <a href="{{ route('public_profile.show', $post->user) }}">
                                <p class="font-semibold">{{ $post->user->name }}</p>
                            </a>
                            @if (auth()->user() && auth()->user()->id !== $post->user->id)
                                <span class="font-semibold">•</span>
                                <button x-text="following ? 'Unfollow' : 'Follow'"
                                    :class="following ? 'text-red-600' : 'text-emerald-600'" @click="follow()"></button>
                            @endif
                        </x-follow-ctr>

                        <div class="flex gap-2 text-sm text-gray-500">
                            {{ $post->readTime() }} min. read
                            <span class="font-semibold">•</span>
                            {{ $post->published_at ? $post->published_at->format('F j, Y, g:i a') : 'Unpublished' }}
                        </div>
                    </div>
                </div>

                <!-- Interaction Section -->
                <x-interaction-section :post="$post" />

                <!-- Content Section -->
                <div class="mt-8">
                    <img class="w-full h-auto object-cover rounded-lg" src="{{ $post->imageUrl() }}"
                        alt="{{ $post->title }}" />

                    <div class="mt-4">
                        {{ $post->content }}
                    </div>
                </div>

                <!-- Category Section -->
                <div class="mt-8">
                    <span class="px-4 py-2 bg-gray-200 rounded-2xl">
                        {{ $post->category->name }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>