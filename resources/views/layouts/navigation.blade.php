<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-md border-b border-purple-100/50 shadow-lg sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}" class="flex items-center space-x-3 group">
                        <div class="relative">
                            <div class="w-10 h-10 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-110">
                                <span class="text-white font-bold text-lg">💬</span>
                            </div>
                            <div class="absolute -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl blur opacity-25 group-hover:opacity-40 transition-opacity duration-300"></div>
                        </div>
                        <div class="hidden sm:block">
                            <h1 class="text-xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                                Comments System
                            </h1>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-2 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')" class="nav-link-modern">
                        <span class="flex items-center space-x-2">
                            <span>🏠</span>
                            <span>{{ __('Home') }}</span>
                        </span>
                    </x-nav-link>
                    @auth
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-link-modern">
                            <span class="flex items-center space-x-2">
                                <span>📊</span>
                                <span>{{ __('Dashboard') }}</span>
                            </span>
                        </x-nav-link>
                    @endauth
                    <x-nav-link :href="route('articles.index')" :active="request()->routeIs(['articles.index', 'article.show'])" class="nav-link-modern">
                        <span class="flex items-center space-x-2">
                            <span>📝</span>
                            <span>{{ __('Articles') }}</span>
                        </span>
                    </x-nav-link>
                    <x-nav-link :href="route('episodes.index')" :active="request()->routeIs(['episodes.index', 'episode.show'])" class="nav-link-modern">
                        <span class="flex items-center space-x-2">
                            <span>🎬</span>
                            <span>{{ __('Episodes') }}</span>
                        </span>
                    </x-nav-link>
                </div>
            </div>

            <!-- Right Side -->
            <div class="flex items-center space-x-4">
                <!-- Settings Dropdown -->
                @auth
                    <div class="hidden sm:flex sm:items-center">
                        <x-dropdown align="right" width="64">
                            <x-slot name="trigger">
                                <button class="group inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-xl text-gray-700 bg-white/60 hover:bg-white/80 hover:text-gray-900 focus:outline-none transition-all duration-300 hover:shadow-lg">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                                            {{ substr(Auth::user()->name, 0, 1) }}
                                        </div>
                                        <div class="text-left">
                                            <div class="font-semibold">{{ Auth::user()->name }}</div>
                                            <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
                                        </div>
                                    </div>
                                    <div class="ms-2">
                                        <svg class="fill-current h-4 w-4 transition-transform duration-200 group-hover:rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <div class="p-2">
                                    <x-dropdown-link :href="route('profile.edit')" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-50 transition-colors">
                                        <span>👤</span>
                                        <span>{{ __('Profile') }}</span>
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-red-50 text-red-600 transition-colors">
                                            <span>🚪</span>
                                            <span>{{ __('Log Out') }}</span>
                                        </x-dropdown-link>
                                    </form>
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endauth

                @guest
                    <div class="hidden sm:flex sm:items-center sm:space-x-3">
                        <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 border border-purple-300 rounded-xl text-purple-700 hover:bg-purple-50 hover:border-purple-400 transition-all duration-300 font-medium">
                            <span class="mr-2">🔑</span>
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-flex items-center px-6 py-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-xl hover:from-purple-700 hover:to-pink-700 transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:scale-105">
                                <span class="mr-2">✨</span>
                                Register
                            </a>
                        @endif
                    </div>
                @endguest

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden bg-white/95 backdrop-blur-md border-t border-purple-100/50">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <x-responsive-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')" class="flex items-center space-x-3 py-3 px-4 rounded-xl">
                <span>🏠</span>
                <span>{{ __('Home') }}</span>
            </x-responsive-nav-link>
            @auth
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center space-x-3 py-3 px-4 rounded-xl">
                    <span>📊</span>
                    <span>{{ __('Dashboard') }}</span>
                </x-responsive-nav-link>
            @endauth
            <x-responsive-nav-link :href="route('articles.index')" :active="request()->routeIs(['articles.index', 'article.show'])" class="flex items-center space-x-3 py-3 px-4 rounded-xl">
                <span>📝</span>
                <span>{{ __('Articles') }}</span>
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('episodes.index')" :active="request()->routeIs(['episodes.index', 'episode.show'])" class="flex items-center space-x-3 py-3 px-4 rounded-xl">
                <span>🎬</span>
                <span>{{ __('Episodes') }}</span>
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-1 border-t border-purple-100/50 bg-gradient-to-r from-purple-50/50 to-pink-50/50">
                <div class="px-4 mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div>
                            <div class="font-semibold text-base text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                </div>

                <div class="space-y-1 px-4">
                    <x-responsive-nav-link :href="route('profile.edit')" class="flex items-center space-x-3 py-3 px-4 rounded-xl">
                        <span>👤</span>
                        <span>{{ __('Profile') }}</span>
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center space-x-3 py-3 px-4 rounded-xl text-red-600">
                            <span>🚪</span>
                            <span>{{ __('Log Out') }}</span>
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth

        @guest
            <div class="pt-4 pb-1 border-t border-purple-100/50 bg-gradient-to-r from-purple-50/50 to-pink-50/50">
                <div class="space-y-3 px-4">
                    <a href="{{ route('login') }}" class="flex items-center justify-center space-x-3 py-3 px-4 border border-purple-300 rounded-xl text-purple-700 hover:bg-purple-50 transition-all duration-300 font-medium">
                        <span>🔑</span>
                        <span>{{ __('Login') }}</span>
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="flex items-center justify-center space-x-3 py-3 px-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-xl hover:from-purple-700 hover:to-pink-700 transition-all duration-300 font-medium shadow-lg">
                            <span>✨</span>
                            <span>{{ __('Register') }}</span>
                        </a>
                    @endif
                </div>
            </div>
        @endguest
    </div>
</nav>

<style>
    /* Custom Navigation Styles */
    .nav-link-modern {
        @apply px-4 py-2 rounded-xl font-medium transition-all duration-300 hover:bg-white/60 hover:shadow-md;
    }
    
    /* Active navigation link styles */
    .nav-link-modern.active {
        @apply bg-gradient-to-r from-purple-100 to-pink-100 text-purple-700 shadow-md;
    }
    
    /* Responsive navigation improvements */
    .responsive-nav-link {
        @apply transition-all duration-300 hover:bg-purple-50 hover:text-purple-700;
    }
    
    .responsive-nav-link.active {
        @apply bg-gradient-to-r from-purple-100 to-pink-100 text-purple-700;
    }
</style>
