<x-layout>
    <x-slot:title>{{ $post->title }}</x-slot:title>

    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="mb-6">
            <a href="/blog" class="text-indigo-600 hover:text-indigo-800">
                ← Back to all posts
            </a>
        </div>

        <article class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-4">
                <span class="text-sm text-gray-500">
                    {{ $post->created_at->format('M d, Y') }}
                </span>
                <span class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-xs font-medium">
                    User ID: {{ $post->author_id }}
                </span>
            </div>

            <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $post->title }}</h1>

            <div class="prose prose-lg prose-indigo max-w-none mb-8">
                {!! nl2br(e($post->body)) !!}
            </div>

            <div class="flex items-center mt-8 pt-8 border-t border-gray-100">
                <div class="flex-shrink-0">
                    <img class="h-12 w-12 rounded-full bg-gray-200 object-cover"
                         src="https://ui-avatars.com/api/?name={{ urlencode($post->author) }}&background=random"
                         alt="{{ $post->author }}">
                </div>
                <div class="ml-4">
                    <p class="text-base font-medium text-gray-900">{{ $post->author }}</p>
                    <div class="flex space-x-1 text-sm text-gray-500">
                        <time datetime="{{ $post->created_at->toIso8601String() }}">
                            Published {{ $post->created_at->diffForHumans() }}
                        </time>
                        @if($post->updated_at->gt($post->created_at))
                            <span aria-hidden="true">&middot;</span>
                            <time datetime="{{ $post->updated_at->toIso8601String() }}">
                                Updated {{ $post->updated_at->diffForHumans() }}
                            </time>
                        @endif
                    </div>
                </div>
            </div>
        </article>
    </div>
</x-layout>
