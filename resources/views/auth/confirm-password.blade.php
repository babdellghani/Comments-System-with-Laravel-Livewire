<x-app-layout>
    <!-- Auth Hero Background -->
    <div class="min-h-screen bg-gradient-to-br from-amber-600 via-orange-600 to-red-600 relative overflow-hidden">
        <!-- Background decorations -->
        <div class="absolute inset-0">
            <div class="absolute top-20 right-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 left-20 w-48 h-48 bg-red-300/20 rounded-full blur-2xl"></div>
            <div class="absolute top-1/3 left-1/2 w-96 h-96 bg-amber-300/10 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 flex items-center justify-center min-h-screen py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full">
                <!-- Logo/Brand Section -->
                <div class="text-center mb-8">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4 border border-white/30">
                        <span class="text-white text-3xl font-bold">🛡️</span>
                    </div>
                    <h1 class="text-3xl font-bold text-white mb-2">Secure Area</h1>
                    <p class="text-amber-100">Confirm your password to continue</p>
                </div>

                <!-- Confirm Password Form -->
                <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 border border-white/20 shadow-2xl">
                    <!-- Security Information -->
                    <div class="mb-6 p-4 bg-white/10 rounded-xl border border-white/20">
                        <div class="flex items-start space-x-3">
                            <span class="text-amber-200 text-xl">🔒</span>
                            <div>
                                <h4 class="font-semibold text-white mb-1">Security Check Required</h4>
                                <p class="text-sm text-white/90 leading-relaxed">
                                    This is a secure area of the application. Please confirm your password before continuing.
                                </p>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
                        @csrf

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-white mb-3">
                                <span class="flex items-center">
                                    <span class="mr-2">🔑</span>
                                    Current Password
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

                        <!-- Security Notice -->
                        <div class="bg-white/10 rounded-xl p-4 border border-white/20">
                            <div class="flex items-center space-x-2 text-amber-200 text-sm">
                                <span>🔐</span>
                                <span>Your password is encrypted and never stored in plain text</span>
                            </div>
                        </div>

                        <!-- Confirm Button -->
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center px-8 py-4 bg-white text-amber-600 font-bold rounded-xl hover:bg-amber-50 focus:outline-none focus:ring-4 focus:ring-white/30 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                            <span class="mr-2">✓</span>
                            Confirm Password
                        </button>

                        <!-- Back Link -->
                        <div class="text-center pt-4">
                            <p class="text-white/80 text-sm">
                                Need to go back? 
                                <a href="{{ route('dashboard') }}" class="text-white font-semibold hover:text-amber-200 transition-colors duration-300">
                                    Return to dashboard
                                </a>
                            </p>
                        </div>
                    </form>
                </div>

                <!-- Security Features -->
                <div class="text-center mt-8">
                    <div class="bg-white/10 rounded-xl p-4 border border-white/20">
                        <div class="grid grid-cols-2 gap-4 text-amber-200 text-xs">
                            <div class="flex items-center space-x-1">
                                <span>🔒</span>
                                <span>Encrypted</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <span>🛡️</span>
                                <span>Secure</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <span>🔐</span>
                                <span>Protected</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <span>✓</span>
                                <span>Verified</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
