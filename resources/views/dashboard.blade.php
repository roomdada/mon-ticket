<x-app-layout>
    <x-section-header title='Tableau de bord' />
    <div class="bg-white px-6 py-8 rounded-md shadow-lg">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 lg:gap-8">
            @if (auth()->user()->isAdmin())
                <a href=''>
                    <x-statistics label="Tickets" value="{{ $tickets }}" icon="list" />
                </a>
                <a href=''>
                    <x-statistics label="Utilisateurs" value="{{ $users }}" icon="users" />
                </a>
                <a href=''>
                    <x-statistics label="Types de tickets" value="{{ $ticketTypes }}" icon="todo" />
                </a>
            @else
                <a href=''>
                    <x-statistics label="Tickets" value="{{ $allTickets }}" icon="list" />
                </a>
                <a href=''>
                    <x-statistics label="Tickets ouverts" value="{{ $openedTickets }}" icon="todo" />
                </a>
                <a href=''>
                    <x-statistics label="Tickets fermés" value="{{ $closedTickets }}" icon="todo" />
                </a>
            @endif
        </div>
    </div>
</x-app-layout>
