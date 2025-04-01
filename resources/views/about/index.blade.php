
<x-layout>
    <x-slot:title>{{ $title ?? 'Title Page' }}</x-slot:title>

    @foreach($teamMembers as $teamMember)
        <div> {{$teamMember['name'] }}</div>
    @endforeach

</x-layout>
