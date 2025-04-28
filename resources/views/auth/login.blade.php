<x-app-layout>
    <!-- Auth Hero Background -->
    <div class="min-h-screen bg-gradient-to-br from-purple-600 via-pink-600 to-rose-600 relative overflow-hidden">
        <!-- Background decorations -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-48 h-48 bg-pink-300/20 rounded-full blur-2xl"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-purple-300/10 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 flex items-center justify-center min-h-screen py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full">
                <!-- Logo/Brand Section -->
                <div class="text-center mb-8">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4 border border-white/30">
                        <span class="text-white text-3xl font-bold">🔐</span>
                    </div>
                    <h1 class="text-3xl font-bold text-white mb-2">Welcome Back!</h1>
                    <p class="text-purple-100">Sign in to your account to continue</p>
                </div>

                <!-- Login Form -->
                <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 border border-white/20 shadow-2xl">
                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="mb-6 p-4 bg-green-500/20 border border-green-400/30 rounded-xl">
                            <div class="flex items-center text-green-100">
                                <span class="mr-2">✅</span>
                                <span class="text-sm">{{ session('status') }}</span>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-white mb-3">
                                <span class="flex items-center">
                                    <span class="mr-2">📧</span>
                                    Email Address
                                </span>
                            </label>
                            <input type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="username"
                                class="w-full px-4 py-3 bg-white/20 border border-white/30 rounded-xl text-white placeholder-white/70 focus:ring-4 focus:ring-white/20 focus:border-white/50 transition-all duration-300"
                                placeholder="Enter your email">
                            @if($errors->get('email'))
                                <div class="mt-2 flex items-center text-red-300">
                                    <span class="mr-2">⚠️</span>
                                    <span class="text-sm">{{ $errors->first('email') }}</span>
                                </div>
                            @endif
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-white mb-3">
                                <span class="flex items-center">
                                    <span class="mr-2">🔒</span>
                                    Password
                                </span>
                            </label>
                            <input type="password"
                                id="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                class="w-full px-4 py-3 bg-white/20 border border-white/30 rounded-xl text-white placeholder-white/70 focus:ring-4 focus:ring-white/20 focus:border-white/50 transition-all duration-300"
                                placeholder="Enter your password">
                            @if($errors->get('password'))
                                <div class="mt-2 flex items-center text-red-300">
                                    <span class="mr-2">⚠️</span>
                                    <span class="text-sm">{{ $errors->first('password') }}</span>
                                </div>
                            @endif
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-white/30 bg-white/20 text-purple-600 shadow-sm focus:ring-white/20"
                                    name="remember">
                                <span class="ms-2 text-sm text-white">Remember me</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a class="text-sm text-white hover:text-purple-200 transition-colors duration-300"
                                    href="{{ route('password.request') }}">
                                    Forgot password?
                                </a>
                            @endif
                        </div>

                        <!-- Login Button -->
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center px-8 py-4 bg-white text-purple-600 font-bold rounded-xl hover:bg-purple-50 focus:outline-none focus:ring-4 focus:ring-white/30 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                            <span class="mr-2">🚀</span>
                            Sign In
                        </button>

                        <!-- Register Link -->
                        <div class="text-center pt-4">
                            <p class="text-white/80 text-sm">
                                Don't have an account? 
                                <a href="{{ route('register') }}" class="text-white font-semibold hover:text-purple-200 transition-colors duration-300">
                                    Create one here
                                </a>
                            </p>
                        </div>
                    </form>
                </div>

                <!-- Footer -->
                <div class="text-center mt-8">
                    <p class="text-purple-200 text-sm">
                        Secure authentication powered by Laravel
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
