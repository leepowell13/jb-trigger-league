<x-app-layout>
    <x-slot name="header">
        Teams
    </x-slot>
    <table>
        <tr>
            <th>Team Name</th>
            <th>Captain</th>
            @foreach ($teams as $team)
        <tr>
            <td>{{ $team->name }}</td>
            <td>{{ $team->captain->discord_id ?? 'No Captain' }}</td>
        </tr>
        @endforeach
</x-app-layout>
