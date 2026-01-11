<nav x-data="{ open: false }" class="fixed w-full z-50 transition-all duration-300 pt-6 px-4">
    <div
        class="max-w-7xl mx-auto bg-white/80 backdrop-blur-lg border border-white/50 rounded-full px-6 py-4 shadow-sm flex justify-between items-center">

        {{-- LOGO --}}
        <div class="flex items-center gap-2">
            <a href="{{ route('dashboard') }}">
                <span class="font-extrabold text-2xl tracking-tighter text-slate-900">
                    MEDIS<span class="text-mint-500">Z</span>.
                </span>
            </a>
        </div>

        {{-- MENU DESKTOP (Hanya Tampil Jika Login) --}}
        @auth
            <div class="hidden md:flex items-center gap-8 font-semibold text-sm">
                <a href="{{ route('dashboard') }}"
                    class="transition-colors duration-300 {{ request()->routeIs('dashboard') ? 'text-mint-500 font-bold' : 'text-slate-600 hover:text-mint-500' }}">
                    {{ __('Dashboard') }}
                </a>

                {{-- Menu Layanan (Opsional, aktifkan jika perlu) --}}
                {{--
            <a href="{{ route('layanan.index') }}"
                class="transition-colors duration-300 {{ request()->routeIs('layanan.*') ? 'text-mint-500 font-bold' : 'text-slate-600 hover:text-mint-500' }}">
                Layanan
            </a>
            --}}
            </div>
        @endauth

        {{-- USER DROPDOWN / LOGIN BUTTON --}}
        <div class="hidden md:flex items-center gap-4">
            @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center gap-2 px-3 py-1.5 bg-white border border-slate-200 rounded-full cursor-pointer hover:border-mint-500 hover:shadow-md transition-all duration-300 group">
                            <div
                                class="h-8 w-8 rounded-full bg-mint-100 flex items-center justify-center text-mint-600 font-bold border border-mint-200">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <div class="flex items-center gap-1">
                                <div class="text-sm font-bold text-slate-700 group-hover:text-mint-600 transition-colors">
                                    {{ Auth::user()->name }}
                                </div>
                                <svg class="fill-current h-4 w-4 text-slate-400 group-hover:text-mint-500 group-hover:rotate-180 transition-transform duration-300"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @else
                {{-- JIKA BELUM LOGIN: Tampilkan tombol Login saja --}}
                <a href="{{ route('login') }}"
                    class="text-sm font-bold text-slate-600 hover:text-mint-600 transition-colors">Log in</a>
            @endauth
        </div>

        {{-- MOBILE HAMBURGER --}}
        <div class="-me-2 flex items-center md:hidden">
            <button @click="open = ! open"
                class="inline-flex items-center justify-center p-2 rounded-full text-slate-600 hover:text-mint-500 hover:bg-slate-100 focus:outline-none transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    {{-- MOBILE MENU --}}
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden mt-2 max-w-7xl mx-auto">
        <div class="bg-white/90 backdrop-blur-xl border border-white/50 rounded-[2rem] shadow-lg overflow-hidden p-4">

            @auth
                <div class="space-y-1 pb-3 border-b border-slate-100">
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="rounded-xl">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>

                    {{--
                    <x-responsive-nav-link :href="route('layanan.index')" :active="request()->routeIs('layanan.*')" class="rounded-xl">
                        Layanan
                    </x-responsive-nav-link>
                    --}}
                </div>

                <div class="pt-4 pb-1">
                    <div class="px-4 mb-2">
                        <div class="font-bold text-base text-slate-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-slate-500">{{ Auth::user()->email }}</div>
                    </div>

                    <div class="space-y-1">
                        <x-responsive-nav-link :href="route('profile.edit')" class="rounded-xl">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="rounded-xl text-red-500 hover:text-red-600 hover:bg-red-50">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
            @else
                <div class="pt-4 pb-1 space-y-1">
                    <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')" class="rounded-xl">
                        {{ __('Log in') }}
                    </x-responsive-nav-link>
                </div>
            @endauth
        </div>
    </div>
</nav>
