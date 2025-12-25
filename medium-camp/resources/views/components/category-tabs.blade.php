@if (count($categories))
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-4 text-gray-900 dark:text-gray-100">
            <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400 justify-center">
                <li class="me-2">
                    @if (Route::currentRouteNamed('posts.index'))
                        <a href="{{ route('posts.index') }}"
                            class="inline-block px-4 py-2 text-white bg-blue-600 rounded-lg">All</a>
                    @else
                        <a href="{{ route('posts.index') }}"
                            class="inline-block px-4 py-2 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">All</a>
                    @endif
                </li>
                @foreach ($categories as $category)
                    <li class="me-2">
                        @if (Route::currentRouteNamed('posts.byCategory') && request()->route('category')->id === $category->id)
                            <a href="{{ route('posts.byCategory', ['category' => $category->id]) }}"
                                class="inline-block px-4 py-2 text-white bg-blue-600 rounded-lg">{{ $category->name }}</a>
                        @else
                            <a href="{{ route('posts.byCategory', ['category' => $category->id]) }}"
                                class="inline-block px-4 py-2 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">{{ $category->name }}</a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif