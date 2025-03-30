@props(['post'])
<div class="max-w-4xl mx-auto px-4 py-8">
    <article class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-100 transition-all hover:shadow-xl">
        <div class="p-6">
            <div class="flex items-center justify-between mb-4">
            <span class="text-sm text-gray-500">
                {{ $post->created_at->format('M d, Y') }}
            </span>
                <a href="{{ route('authors.show', $post->author_id) }}" class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-xs font-medium hover:bg-indigo-200">
                    Author ID: {{ $post->author_id }}
                </a>
            </div>

            <h2 class="text-2xl font-semibold text-gray-800 mb-3 hover:text-indigo-600">
                <a href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a>
            </h2>

            <div class="prose prose-indigo max-w-none mb-5 text-gray-600">
                {{ Str::limit($post->body, 200) }}
                @if(strlen($post->body) > 200)
                    <a href="/blog/{{ $post->id }}" class="text-indigo-600 hover:text-indigo-800 font-medium">Read more</a>
                @endif
            </div>

            <div class="flex items-center mt-6 pt-6 border-t border-gray-100">
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">
                        <a href="{{ route('authors.show', $post->author_id) }}" class="hover:text-indigo-600">
                            {{ $post->user->name ?? 'Unknown Author' }}
                        </a>
                    </p>
                    <div class="flex space-x-1 text-xs text-gray-500">
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
        </div>
    </article>
</div>
