<x-layout>
    <x-slot:title>{{ $title ?? 'Blog Page' }}</x-slot:title>

    <div class="space-y-0">

       <x-search-post/>

            @foreach($posts as $post)
            <x-post-card :post="$post"/>
            @endforeach

        <div class="max-w-4xl mx-auto mb-2 px-4 py-4"> {{ $posts->links() }} </div>






        </div>


</x-layout>
