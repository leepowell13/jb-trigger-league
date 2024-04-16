<x-app-layout>
    <x-slot name="header">
        Trigger League Pairing show
    </x-slot>
    <table>
        <tr>
            <th>Team 1:{{ $pairing->team1 }}</th>
            <th colspan="2">Result</th>
            <th>Team 2:{{ $pairing->team2 }}</th>
        </tr>

        @foreach ($pairing->games as $game)
            <tr>
                <td>{{ $game->players[0]->discord_id }}</td>
                <td>{{ $game->players[0]->pivot->result_id }}</td>
                <td>{{ $game->players[1]->pivot->result_id }}</td>
                <td>{{ $game->players[1]->discord_id }}</td>
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td>{{ $pairing->teams[0]->pivot->game_wins }}</td>
            <td>{{ $pairing->teams[1]->pivot->game_wins }}</td>
            <td></td>
        </tr>
    </table>
</x-app-layout>

{{-- 
$team1 = $pairing->teams[0]->id
$player1team = $pairing->games[0]->players[0]->team_id
Make sure both match when outputting the pairings table 
--}}
