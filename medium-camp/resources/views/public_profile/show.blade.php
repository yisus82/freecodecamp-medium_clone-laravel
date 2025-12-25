<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-gray-900 shadow sm:rounded-lg">
                <div class="flex flex-col-reverse md:flex-row px-8">
                    <div class="flex-1 p-4">
                        <h2 class="text-2xl font-semibold mb-6 text-gray-900 dark:text-white">
                            {{ "@" . $user->username }}'s
                            posts
                        </h2>
                        <div>
                            @forelse ($posts as $post)
                                <x-post-item :post="$post"></x-post-item>
                            @empty
                                <div class="text-center text-gray-400 py-16">No Posts Found</div>
                            @endforelse
                        </div>
                    </div>
                    <x-follow-ctr :user="$user">
                        <div class="flex gap-2">
                            <x-avatar :user="$user" size="w-24" />
                            <div class="flex flex-col gap-4">
                                <p class="text-white">{{ $user->name }} ({{ "@" . $user->username }})</p>
                                <p class="text-sm text-gray-500"><span x-text="followersCount"></span> followers</p>
                            </div>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg mt-8">
                            <h2 class="text-xl font-semibold mb-4">About {{ $user->name }}</h2>
                            <p class="text-gray-600 dark:text-gray-300">
                                {{ $user->bio ?? 'This user has not added a bio yet.' }}
                            </p>
                        </div>
                        @if (auth()->user() && auth()->user()->id !== $user->id)
                            <div class="mt-4">
                                <button @click="follow()" class="rounded-full px-4 py-2 text-white"
                                    x-text="following ? 'Unfollow' : 'Follow'"
                                    :class="following ? 'bg-red-600' : 'bg-emerald-600'"></button>
                            </div>
                        @endif
                    </x-follow-ctr>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>