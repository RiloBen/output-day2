<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ config('app.name', 'Laravel') }}</title>

        @if(file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
            @laravelPWA
        @endif

    </head>
    <body class="bg-slate-100 text-slate-900 dark:bg-slate-950 dark:text-slate-100">
        <div class="flex min-h-screen">
            <aside class="hidden md:block w-64 bg-slate-800 text-white p-6 dark:bg-slate-950" id="aside">
                <div>
                    <h1 class="text-x font-bold mb-6">
                        Smart Notes AI
                    </h1>

                    <nav>
                        <a href="/" class="block">Dashboard</a>
                        <a href="/notes" class="block">Notes</a>
                        <a href="/quiz" class="block">Quiz</a>
                    </nav>
                </div>
            </aside>

            <main class="flex-1 bg-slate-100 dark:bg-slate-950">
                <header class="bg-white border-b border-slate-200 px-6 py-4 flex justify-between dark:bg-slate-900 dark:border-slate-800">
                    <div class="flex gap-2">
                        <button class="md:hidden" id="menu-button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>

                        <h2 class="font-semibold">
                            Smart Notes AI
                        </h2>
                    </div>

                    <div class="flex items-center gap-4">
                        <button id="theme-toggle" aria-label="Toggle dark mode" class="p-2 rounded text-slate-700 hover:bg-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:text-slate-200 dark:hover:bg-slate-700" title="Toggle dark mode">
                            <svg id="theme-toggle-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                            </svg>
                        </button>

                        <span>Hello, {{ session('username') }}</span>
                    </div>
                </header>

                <div class="p-4">
                    @yield('content')
                </div>
            </main>
        </div>
    </body>
</html>
