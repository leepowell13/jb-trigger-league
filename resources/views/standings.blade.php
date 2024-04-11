<x-app-layout>
    <x-slot name="header">
        Standings
    </x-slot>
    <table>
        <tr>
            <th>PLAYED</th>
            <th>TEAM</th>
            <th>POINTS</th>
            <th colspan="3">RECORD (WLT)</th>
            <th colspan="2">GAME RECORD</th>
            <th>GAME DIFF</th>
        </tr>
        @foreach ($teams as $team)
            <tr>
                <td>{{ $team->latestPairingStats->pairings_played }}</td>
                <td>{{ $team->name }}</td>
                <td>{{ $team->latestPairingStats->points }}</td>
                <td>{{ $team->latestPairingStats->pairing_wins }}</td>
                <td>{{ $team->latestPairingStats->pairing_losses }}</td>
                <td>{{ $team->latestPairingStats->pairing_ties }}</td>
                <td>{{ $team->latestGameStats->wins }}</td>
                <td>{{ $team->latestGameStats->losses }}</td>
                <td>{{ $team->latestGameStats->wins - $team->latestGameStats->losses }}
            </tr>
        @endforeach
</x-app-layout>
