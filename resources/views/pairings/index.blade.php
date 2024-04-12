<x-app-layout>
    <x-slot name="header">
        Trigger League Pairings index
    </x-slot>
    <table>
        @foreach ($pairings as $pairing)
            <tr>
                <td>{{ $pairing->week }}</td>
                <td>{{ $pairing->stage->name }}</td>
                <td>{{ $pairing->team1 }} vs {{ $pairing->team2 }}</td>
            </tr>
        @endforeach
</x-app-layout>
