<x-app-layout>
    <!-- Auth Hero Background -->
    <div class="min-h-screen bg-gradient-to-br from-emerald-600 via-teal-600 to-cyan-600 relative overflow-hidden">
        <!-- Background decorations -->
        <div class="absolute inset-0">
            <div class="absolute top-20 right-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 left-20 w-48 h-48 bg-cyan-300/20 rounded-full blur-2xl"></div>
            <div class="absolute top-1/3 left-1/3 w-96 h-96 bg-emerald-300/10 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 flex items-center justify-center min-h-screen py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full">
                <!-- Logo/Brand Section -->
                <div class="text-center mb-8">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4 border border-white/30">
                        <span class="text-white text-3xl font-bold">🎯</span>
                    </div>
                    <h1 class="text-3xl font-bold text-white mb-2">Join Us Today!</h1>
                    <p class="text-emerald-100">Create your account and start your journey</p>
                </div>

                <!-- Register Form -->
                <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 border border-white/20 shadow-2xl">
                    <form method="POST" action="{{ route('register') }}" class="space-y-6">
                        @csrf

                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-semibold text-white mb-3">
                                <span class="flex items-center">
                                    <span class="mr-2">👤</span>
                                    Full Name
                                </span>
                            </label>
                            <input type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                autocomplete="name"
                                class="w-full px-4 py-3 bg-white/20 border border-white/30 rounded-xl text-white placeholder-white/70 focus:ring-4 focus:ring-white/20 focus:border-white/50 transition-all duration-300"
                                placeholder="Enter your full name">
                            @if($errors->get('name'))
                                <div class="mt-2 flex items-center text-red-300">
                                    <span class="mr-2">⚠️</span>
                                    <span class="text-sm">{{ $errors->first('name') }}</span>
                                </div>
                            @endif
                        </div>

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
                                autocomplete="new-password"
                                class="w-full px-4 py-3 bg-white/20 border border-white/30 rounded-xl text-white placeholder-white/70 focus:ring-4 focus:ring-white/20 focus:border-white/50 transition-all duration-300"
                                placeholder="Create a password">
                            @if($errors->get('password'))
                                <div class="mt-2 flex items-center text-red-300">
                                    <span class="mr-2">⚠️</span>
                                    <span class="text-sm">{{ $errors->first('password') }}</span>
                                </div>
                            @endif
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-semibold text-white mb-3">
                                <span class="flex items-center">
                                    <span class="mr-2">✅</span>
                                    Confirm Password
                                </span>
                            </label>
                            <input type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                class="w-full px-4 py-3 bg-white/20 border border-white/30 rounded-xl text-white placeholder-white/70 focus:ring-4 focus:ring-white/20 focus:border-white/50 transition-all duration-300"
                                placeholder="Confirm your password">
                            @if($errors->get('password_confirmation'))
                                <div class="mt-2 flex items-center text-red-300">
                                    <span class="mr-2">⚠️</span>
                                    <span class="text-sm">{{ $errors->first('password_confirmation') }}</span>
                                </div>
                            @endif
                        </div>

                        <!-- Password Requirements -->
                        <div class="bg-white/10 rounded-xl p-4 border border-white/20">
                            <h4 class="font-semibold text-white mb-3 flex items-center text-sm">
                                <span class="mr-2">🛡️</span>
                                Password Requirements
                            </h4>
                            <div class="grid grid-cols-1 gap-1 text-xs text-white/80">
                                <div class="flex items-center">
                                    <span class="mr-2">•</span>
                                    <span>At least 8 characters long</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="mr-2">•</span>
                                    <span>Include uppercase and lowercase letters</span>
                                </div>
                            </div>
                        </div>

                        <!-- Register Button -->
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center px-8 py-4 bg-white text-emerald-600 font-bold rounded-xl hover:bg-emerald-50 focus:outline-none focus:ring-4 focus:ring-white/30 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                            <span class="mr-2">🎉</span>
                            Create Account
                        </button>

                        <!-- Login Link -->
                        <div class="text-center pt-4">
                            <p class="text-white/80 text-sm">
                                Already have an account? 
                                <a href="{{ route('login') }}" class="text-white font-semibold hover:text-emerald-200 transition-colors duration-300">
                                    Sign in here
                                </a>
                            </p>
                        </div>
                    </form>
                </div>

                <!-- Footer -->
                <div class="text-center mt-8">
                    <p class="text-emerald-200 text-sm">
                        Join thousands of users worldwide
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
