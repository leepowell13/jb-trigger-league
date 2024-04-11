<x-app-layout>
    <x-slot name="header">
        Player Statistics
    </x-slot>
    <table>
        <tr>
            <th>RANK</th>
            <th>NAME</th>
            <th>PLAYED</th>
            <th>WINS</th>
            <th>LOSSES</th>
            <th>WIN %</th>
            <th>+/-</th>
        </tr>
        @foreach ($players as $player)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $player->discord_id }}</td>
                <td>{{ $player->latestGameStats->played }}</td>
                <td>{{ $player->latestGameStats->wins }}</td>
                <td>{{ $player->latestGameStats->losses }}</td>
                <td>{{ $player->latestGameStats->win_percentage }}%</td>
                <td>{{ $player->latestGameStats->game_diff }}
            </tr>
        @endforeach
</x-app-layout>
