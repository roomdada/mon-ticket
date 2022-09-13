<x-app-layout>
    <x-section-header title="Détails">
        <x-slot name="actions">
            <x-back url='tickets.index' />
        </x-slot>
    </x-section-header>
    <div class="bg-white px-6 py-12 rounded-md shadow-lg">
        <div class="grid grid-cols-8 gap-6">
            <div class="col-span-8">
                <div class="flex flex-col md:flex-row space-y-2 md:space-y-0">
                    <div class="w-full md:w-1/2">
                        <dt class="text-sm font-medium text-gray-500">Date</dt>
                        <dd class="text-sm font-normal text-gray-900">
                            {{ $ticket->created_at }}
                        </dd>
                    </div>
                    <div class="w-full md:w-1/2">
                        <dt class="text-sm font-medium text-gray-500">Identifiant</dt>
                        <dd class="text-sm font-normal text-gray-900">
                            {{ $ticket->identifier }}
                        </dd>
                    </div>

                </div>
            </div>
            <div class="col-span-8">
                <div class="flex flex-col md:flex-row space-y-2 md:space-y-0">
                    <div class="w-full md:w-1/2">
                        <dt class="text-sm font-medium text-gray-500">Statut</dt>
                        <dd class="text-sm font-normal text-gray-900">
                            {{ $ticket->state }}
                        </dd>
                    </div>

                    <div class="w-full md:w-1/2">
                        <dt class="text-sm font-medium text-gray-500">Date de fermerture</dt>
                        <dd class="text-sm font-normal text-gray-900">
                            {{ $ticket->closed_at ? $ticket->closed_at : 'Non defini' }}
                        </dd>
                    </div>
                </div>
            </div>
            <div class="col-span-8">
                <div class="flex flex-col md:flex-row space-y-2 md:space-y-0">
                    <div class="w-full md:w-1/2">
                        <dt class="text-sm font-medium text-gray-500">Client</dt>
                        <dd class="text-sm font-normal text-gray-900">
                            {{ $ticket->user->full_name }}
                        </dd>
                    </div>

                    <div class="w-full md:w-1/2">
                        <dt class="text-sm font-medium text-gray-500">Titre</dt>
                        <dd class="text-sm font-normal text-gray-900">
                            {{ $ticket->title }}
                        </dd>
                    </div>
                </div>
            </div>
            <div class="col-span-8">
                <div class="flex flex-col md:flex-row space-y-2 md:space-y-0">
                    <div class="w-full md:w-full">
                        <dt class="text-sm font-medium text-gray-500">Description</dt>
                        <dd class="text-sm font-normal text-gray-900">
                            {!! $ticket->description !!}
                        </dd>
                    </div>

                </div>
            </div>
            <!-- message list -->
            <div class="flex">
                @if (!auth()->user()->isAdmin() && $ticket->isOpen())
                    <a href="{{ route('tickets.close', $ticket) }}"
                        class="btn btn-sm  float-right bg-primary-900 border border-transparent rounded-md font-bold text-xs text-white uppercase tracking-widest px-4 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Fermé le ticket
                    </a>
                @endif
            </div>
        </div>
        <hr class='bg-green-500 w-full h-1 mt-4'>
        <h1 class='text-2xl font-bold mt-4'>Messages</h1>
        @forelse($ticket->comments as $comment)
            <div class='flex justify-between'>
                <div class="flex mt-4">
                    <span
                        class='rounded-full border-4 border-{{ !$comment->user->isAdmin() ? 'green' : 'blue' }}-500 py-2 px-2'>
                        <img class='w-8 h-8'
                            src='https://ui-avatars.com/api/?name={{ $comment->user->full_name }}?rounded=true'>
                    </span>
                    <span class='text-sm font-bold mt-2.5 mx-2'>{{ $comment->comment }}</span>
                </div>
            </div>
        @empty
            <div class='flex justify-between'>
                <!-- message list -->
                <div class="flex mt-4">
                    <span class='text-sm font-bold mt-2.5 mx-2'>Aucun message</span>
                </div>
            </div>
        @endforelse
    </div>
    @if ($ticket->isOpen())
        <div class="bg-white px-6 py-12 rounded-md shadow-lg">
            <livewire:forms.create.create-comment-form :ticket="$ticket" />
        </div>
    @endif


</x-app-layout>
