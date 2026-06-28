<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: {
                                DEFAULT: "#0ea5e9",
                                dark: "#0284c7",
                                light: "#38bdf8",
                            },
                        },
                        fontFamily: {
                            sans: ["Inter", "Cairo", "sans-serif"],
                        },
                    },
                },
            };
        </script>
        <title>{{ __('main.app_title') }}</title>
    </head>
    <body class="mb-48 font-sans bg-slate-50 text-slate-800 antialiased">
        <nav class="sticky top-0 z-40 bg-white/95 backdrop-blur-sm shadow-sm border-b border-slate-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            <a href="/" class="shrink-0">
                <img class="w-28 sm:w-32 h-auto object-contain" src="{{ asset('images/logo.png') }}" alt="{{ __('main.app_title') }}" />
            </a>

                <ul class="flex items-center gap-4 sm:gap-6 text-sm sm:text-base">
                    <li x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="hover:text-primary flex items-center gap-2 font-medium transition-colors">
                            <i class="fa-solid fa-globe"></i>
                            {{ app()->getLocale() == 'ar' ? __('main.arabic') : __('main.english') }}
                        </button>
                        <div
                            x-show="open"
                            @click.away="open = false"
                            x-transition
                            class="absolute end-0 mt-2 py-1 w-36 bg-white border border-slate-200 rounded-xl shadow-lg z-50 overflow-hidden"
                        >
                            <a href="{{ route('lang.switch', 'ar') }}" class="block px-4 py-2 hover:bg-sky-50 transition-colors">{{ __('main.arabic') }}</a>
                            <a href="{{ route('lang.switch', 'en') }}" class="block px-4 py-2 hover:bg-sky-50 transition-colors">{{ __('main.english') }}</a>
                        </div>
                    </li>

                    @auth
                        <li class="hidden sm:block">
                            <span class="font-semibold text-slate-700">{{ __('main.welcome', ['name' => auth()->user()->name]) }}</span>
                        </li>
                        <li>
                            <a href="/listings/manage" class="hover:text-primary flex items-center gap-2 font-medium transition-colors">
                                <i class="fa-solid fa-gear"></i>
                                <span class="hidden sm:inline">{{ __('main.manage') }}</span>
                            </a>
                        </li>
                        <li>
                            <form class="inline" method="POST" action="/logout">
                                @csrf
                                <button type="submit" class="hover:text-primary flex items-center gap-2 font-medium transition-colors">
                                    <i class="fa-solid fa-door-closed"></i>
                                    <span class="hidden sm:inline">{{ __('main.logout') }}</span>
                                </button>
                            </form>
                        </li>
                    @else
                        <li>
                            <a href="/register" class="hover:text-primary flex items-center gap-2 font-medium transition-colors">
                                <i class="fa-solid fa-user-plus"></i>
                                {{ __('main.register') }}
                            </a>
                        </li>
                        <li>
                            <a href="/login" class="inline-flex items-center gap-2 bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-xl font-medium shadow-sm transition-colors">
                                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                                {{ __('main.login') }}
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{ $slot }}
        </main>

        <footer class="fixed bottom-0 inset-x-0 flex items-center justify-between sm:justify-center font-semibold bg-primary text-white h-20 sm:h-24 shadow-lg">
            <p class="ms-4 sm:ms-0 text-sm sm:text-base">
                {!! __('main.footer_copyright') !!}
            </p>

            <a
                href="/listings/create"
                class="me-4 sm:absolute sm:top-1/2 sm:-translate-y-1/2 sm:end-10 bg-slate-900 hover:bg-slate-800 text-white py-2.5 px-5 rounded-xl shadow-md transition-colors text-sm sm:text-base"
            >
                {{ __('main.post_job') }}
            </a>
        </footer>

        <x-flash-message />
    </body>
</html>
