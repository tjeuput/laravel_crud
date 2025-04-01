<x-layout>
    <x-slot:title>{{ $title ?? 'Blog Page' }}</x-slot:title>

    <div class="space-y-0">

       <x-search-post/>

    @foreach($posts as $post)
            <x-post-card :post="$post"/>
        @endforeach
    </div>
</x-layout>
