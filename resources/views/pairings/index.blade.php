<x-app-layout>
    <x-slot name="header">
        Trigger League Pairings index
    </x-slot>
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto space-x-1 py-6 px-4 sm:px-6 lg:px-8">
            <x-primary-link-button href="pairings">All</x-primary-link-button>
            @for ($i = 1; $i < $season->weeks - 1; $i++)
                <x-primary-link-button href="pairings?week={{ $i }}">Week
                    {{ $i }}</x-primary-link-button>
            @endfor
            <x-primary-link-button href="pairings">Playoffs</x-primary-link-button>
        </div>
    </div>
    <table>
        @foreach ($pairings as $pairing)
            <tr>
                <td>{{ $pairing->week }}</td>
                <td>{{ $pairing->stage->name }}</td>
                <td>{{ $pairing->team1 }} vs {{ $pairing->team2 }}</td>
            </tr>
        @endforeach
    </table>
</x-app-layout>
