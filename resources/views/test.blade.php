<x-app-layout>
    <x-slot name="header">
        Week 1 Test
    </x-slot>
    @foreach ($pairings as $pairing)
        <table>
            <tr>
                <td>{{ $pairing->teams[0]->name }}</td>
                <td>result 1</td>
                <td>result 2</td>
                <td>{{ $pairing->teams[1]->name }}</td>
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
        <br />
    @endforeach
</x-app-layout>
