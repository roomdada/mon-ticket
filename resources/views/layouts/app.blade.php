<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="default">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <style>
        [x-cloak] {
            display: none !important;
        }

        .customScroll::-webkit-scrollbar {
            width: 6px;
            /* width of the entire scrollbar */
        }

        .customScroll::-webkit-scrollbar-track {
            background: inherit;
            /* color of the tracking area */
        }

        .customScroll::-webkit-scrollbar-thumb {
            background-color: #f07d00;
            /* color of the scroll thumb */
            border-radius: 20px;
            /* roundness of the scroll thumb */
            border: 3px solid #f07d00;
            /* creates padding around scroll thumb */
        }
    </style>
    <livewire:styles />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css" />
    @stack('styles')
    @laravelViewsStyles(laravel - views)
    <!-- Scripts -->
    @stack('scripts')

    <title>{{ config('app.name', 'Ciprel Cantine') }}</title>
</head>

<body class="font-sans antialiased">
    <div @keydown.escape="showModal = false" x-cloak x-data="{ userDropdownOpen: false, mobileSidebarOpen: false, desktopSidebarOpen: true, 'showModal': false }"
        class="flex flex-col mx-auto w-full min-h-screen bg-stone-100"
        x-bind:class="{
            'lg:pl-72': desktopSidebarOpen
        }">
        <!-- Page Sidebar -->
        <nav id="page-sidebar"
            class="flex flex-col fixed top-0 left-0 bottom-0 w-full lg:w-72 h-full bg-primary-50 border-r border-gray-100 transform transition-transform duration-100 ease-out z-20"
            x-bind:class="{
                '-translate-x-full': !mobileSidebarOpen,
                'translate-x-0': mobileSidebarOpen,
                'lg:-translate-x-full': !desktopSidebarOpen,
                'lg:translate-x-0': desktopSidebarOpen,
            }"
            aria-label="Sidebar">
            <!-- Sidebar Header -->
            <div class="h-16 flex-none flex items-center justify-between lg:justify-center px-4 w-full">
                <!-- Brand -->
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center font-bold text-lg tracking-wide text-gray-600 hover:text-gray-500">
                    <x-application-logo class="h-12" />
                </a>
                <div class="lg:hidden">
                    <button type="button"
                        class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-transparent text-red-600 hover:text-red-400 focus:ring focus:ring-red-500 focus:ring-opacity-50 active:text-red-600"
                        x-on:click="mobileSidebarOpen = false">
                        <svg class="hi-solid hi-x inline-block w-4 h-4 -mx-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="overflow-y-auto customScroll">
                <div class="p-4 w-full">
                    <nav class="space-y-1">
                        <x-nav-link href="{{ route('dashboard') }}" icon="book" :active="request()->routeIs('dashboard')">
                            Tableau de bord
                        </x-nav-link>
                        <x-nav-link href="{{ route('users.index') }}" icon="users" :active="request()->routeIs('users.*')">
                          Utilisateurs
                      </x-nav-link>
                        <x-nav-link href="{{ route('tickets.index') }}" icon="question" :active="request()->routeIs('tickets.*')">
                            Tickets
                        </x-nav-link>
                        <x-nav-link href="{{ route('tickets-types.index') }}" icon="todo" :active="request()->routeIs('tickets-types.*')">
                            Type de tickets
                        </x-nav-link>
                    </nav>
                </div>
            </div>
            <!-- END Sidebar Navigation -->
        </nav>
        <!-- Page Sidebar -->
        <!-- Page Header -->
        <header id="page-header"
            class="flex flex-none items-center h-16 bg-white shadow fixed top-0 right-0 left-0 z-10"
            x-bind:class="{
                'lg:pl-72': desktopSidebarOpen
            }">
            <div class="flex justify-between max-w-10xl mx-auto px-4 lg:px-8 w-full">
                <!-- Left Section -->
                <div class="flex items-center space-x-2">
                    <!-- Toggle Sidebar on Desktop -->
                    <div class="hidden lg:block">
                        <button type="button"
                            class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-6 rounded border-gray-300 bg-grey-50 bg-opacity-50 text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none"
                            x-on:click="desktopSidebarOpen = !desktopSidebarOpen">
                            <svg class="hi-solid hi-menu-alt-1 inline-block w-5 h-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <!-- END Toggle Sidebar on Desktop -->
                    <!-- Toggle Sidebar on Mobile -->
                    <div class="lg:hidden">
                        <button type="button"
                            class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-6 rounded border-gray-300 bg-grey-50 bg-opacity-50 text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none"
                            x-on:click="mobileSidebarOpen = true">
                            <svg class="hi-solid hi-menu-alt-1 inline-block w-5 h-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- END Left Section -->
                <!-- Right Section -->
                <div class="flex items-center space-x-2">
                    <!-- User Dropdown -->
                    <div class="relative inline-block">
                        <!-- Dropdown Toggle Button -->
                        <button type="button"
                            class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-gray-300 bg-grey-50 bg-opacity-50 text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none"
                            id="tk-dropdown-layouts-user" aria-haspopup="true" x-bind:aria-expanded="userDropdownOpen"
                            x-on:click="userDropdownOpen = true">
                            <span>{{ Auth::user()->full_name }}</span>
                            <svg class="hi-solid hi-chevron-down inline-block w-5 h-5 opacity-50" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- END Dropdown Toggle Button -->
                        <!-- Dropdown -->
                        <div x-cloak x-show="userDropdownOpen" x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="transform opacity-0 scale-75"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-75"
                            x-on:click.outside="userDropdownOpen = false" role="menu"
                            aria-labelledby="tk-dropdown-layouts-user"
                            class="absolute right-0 origin-top-right mt-2 w-48 shadow-xl rounded z-1">
                            <div class="bg-white ring-1 ring-black ring-opacity-5 rounded divide-y divide-gray-100">
                                <div class="p-2 space-y-1">
                                    <a role="menuitem" href="{{ route('profile') }}"
                                        class="flex items-center space-x-2 rounded py-2 px-3 text-sm font-medium text-gray-600 hover:bg-primary-900 hover:text-gray-50 focus:outline-none focus:bg-gray-100 focus:text-gray-700">
                                        <svg class="hi-solid hi-user-circle inline-block w-5 h-5 opacity-50"
                                            fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>Mon Profil</span>
                                    </a>
                                </div>
                                <div class="p-2 space-y-1">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" role="menuitem"
                                            class="w-full text-left flex items-center space-x-2 rounded py-2 px-3 text-sm font-medium text-gray-600 hover:bg-primary-900 hover:text-gray-50 focus:outline-none focus:bg-gray-100 focus:text-gray-700">
                                            <svg class="hi-solid hi-lock-closed inline-block w-5 h-5 opacity-50"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span>Se déconnecter</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- END Dropdown -->
                    </div>
                    <!-- END User Dropdown -->
                </div>
                <!-- END Right Section -->
            </div>
        </header>
        <!-- END Page Header -->
        <!-- Page Content -->
        <main id="page-content" class="flex flex-auto flex-col bg-stone-100 max-w-full pt-16">
            <!-- Page Section -->
            <div class="max-w-10xl mx-auto p-4 lg:p-8 w-full">

                {{ $slot }}
            </div>
            <!-- END Page Section -->
        </main>
        <!-- END Page Content -->
    </div>
    <!-- END Page Container -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <livewire:scripts />
    @laravelViewsScripts(laravel - views)
    @yield('js')
</body>

</html>
