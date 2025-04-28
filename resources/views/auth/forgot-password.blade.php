<x-app-layout>
    <!-- Auth Hero Background -->
    <div class="min-h-screen bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-600 relative overflow-hidden">
        <!-- Background decorations -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-48 h-48 bg-purple-300/20 rounded-full blur-2xl"></div>
            <div class="absolute top-1/2 right-1/3 w-96 h-96 bg-blue-300/10 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 flex items-center justify-center min-h-screen py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full">
                <!-- Logo/Brand Section -->
                <div class="text-center mb-8">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4 border border-white/30">
                        <span class="text-white text-3xl font-bold">🔑</span>
                    </div>
                    <h1 class="text-3xl font-bold text-white mb-2">Forgot Password?</h1>
                    <p class="text-blue-100">No problem! We'll help you reset it</p>
                </div>

                <!-- Forgot Password Form -->
                <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 border border-white/20 shadow-2xl">
                    <!-- Information Text -->
                    <div class="mb-6 p-4 bg-white/10 rounded-xl border border-white/20">
                        <div class="flex items-start space-x-3">
                            <span class="text-blue-200 text-xl">💡</span>
                            <div>
                                <p class="text-sm text-white leading-relaxed">
                                    Enter your email address and we'll send you a password reset link that will allow you to choose a new one.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="mb-6 p-4 bg-green-500/20 border border-green-400/30 rounded-xl">
                            <div class="flex items-center text-green-100">
                                <span class="mr-2">✅</span>
                                <span class="text-sm">{{ session('status') }}</span>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
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
                                class="w-full px-4 py-3 bg-white/20 border border-white/30 rounded-xl text-white placeholder-white/70 focus:ring-4 focus:ring-white/20 focus:border-white/50 transition-all duration-300"
                                placeholder="Enter your email address">
                            @if($errors->get('email'))
                                <div class="mt-2 flex items-center text-red-300">
                                    <span class="mr-2">⚠️</span>
                                    <span class="text-sm">{{ $errors->first('email') }}</span>
                                </div>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center px-8 py-4 bg-white text-blue-600 font-bold rounded-xl hover:bg-blue-50 focus:outline-none focus:ring-4 focus:ring-white/30 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                            <span class="mr-2">📤</span>
                            Send Reset Link
                        </button>

                        <!-- Back to Login -->
                        <div class="text-center pt-4">
                            <p class="text-white/80 text-sm">
                                Remember your password? 
                                <a href="{{ route('login') }}" class="text-white font-semibold hover:text-blue-200 transition-colors duration-300">
                                    Sign in here
                                </a>
                            </p>
                        </div>
                    </form>
                </div>

                <!-- Security Note -->
                <div class="text-center mt-8">
                    <div class="bg-white/10 rounded-xl p-4 border border-white/20">
                        <div class="flex items-center justify-center space-x-2 text-blue-200 text-sm">
                            <span>🛡️</span>
                            <span>Your security is our priority</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
