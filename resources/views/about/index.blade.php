
<x-layout>
    <x-slot:title>{{ $title ?? 'Title Page' }}</x-slot:title>

    <div class="mt-6 px-4">{{$posts->links()}}</div>

    @foreach($teamMembers as $teamMember)
        <div> {{$teamMember['name'] }}</div>
    @endforeach



</x-layout>
