<x-app-layout>
    <x-slot name="header">
        Trigger League Season {{ $season->id ?? '' }}
    </x-slot>
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto space-x-1 py-6 px-4 sm:px-6 lg:px-8">
            <x-primary-link-button>All</x-primary-link-button>
            @for ($i = 1; $i < $season->weeks - 1; $i++)
                <x-primary-link-button>Week {{ $i }}</x-primary-link-button>
            @endfor
            <x-primary-link-button>Playoffs</x-primary-link-button>
        </div>
    </div>
</x-app-layout>
