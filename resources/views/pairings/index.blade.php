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

{{-- 
$team1 = $pairing->teams[0]->id
$player1team = $pairing->games[0]->players[0]->team_id
Make sure both match when outputting the pairings table 
--}}
