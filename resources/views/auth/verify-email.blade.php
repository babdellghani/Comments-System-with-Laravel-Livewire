<x-app-layout>
    <!-- Auth Hero Background -->
    <div class="min-h-screen bg-gradient-to-br from-green-600 via-emerald-600 to-teal-600 relative overflow-hidden">
        <!-- Background decorations -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-48 h-48 bg-teal-300/20 rounded-full blur-2xl"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-emerald-300/10 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 flex items-center justify-center min-h-screen py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full">
                <!-- Logo/Brand Section -->
                <div class="text-center mb-8">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4 border border-white/30">
                        <span class="text-white text-3xl font-bold">📧</span>
                    </div>
                    <h1 class="text-3xl font-bold text-white mb-2">Verify Your Email</h1>
                    <p class="text-green-100">Check your inbox to complete your registration</p>
                </div>

                <!-- Verify Email Content -->
                <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 border border-white/20 shadow-2xl">
                    <!-- Information -->
                    <div class="mb-6 p-4 bg-white/10 rounded-xl border border-white/20">
                        <div class="flex items-start space-x-3">
                            <span class="text-green-200 text-xl">✉️</span>
                            <div>
                                <p class="text-sm text-white leading-relaxed">
                                    Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Success Status -->
                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-6 p-4 bg-green-500/20 border border-green-400/30 rounded-xl">
                            <div class="flex items-center text-green-100">
                                <span class="mr-2">✅</span>
                                <span class="text-sm font-medium">A new verification link has been sent to the email address you provided during registration.</span>
                            </div>
                        </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="space-y-4">
                        <!-- Resend Verification Email -->
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit"
                                class="w-full inline-flex items-center justify-center px-8 py-4 bg-white text-green-600 font-bold rounded-xl hover:bg-green-50 focus:outline-none focus:ring-4 focus:ring-white/30 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                                <span class="mr-2">📤</span>
                                Resend Verification Email
                            </button>
                        </form>

                        <!-- Logout Button -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full inline-flex items-center justify-center px-8 py-3 bg-white/20 border border-white/30 text-white font-semibold rounded-xl hover:bg-white/30 focus:outline-none focus:ring-4 focus:ring-white/20 transition-all duration-300">
                                <span class="mr-2">🚪</span>
                                Log Out
                            </button>
                        </form>
                    </div>

                    <!-- Help Text -->
                    <div class="mt-6 text-center">
                        <p class="text-white/80 text-sm">
                            Check your spam folder if you don't see the email
                        </p>
                    </div>
                </div>

                <!-- Support Info -->
                <div class="text-center mt-8">
                    <div class="bg-white/10 rounded-xl p-4 border border-white/20">
                        <div class="flex items-center justify-center space-x-2 text-green-200 text-sm">
                            <span>💬</span>
                            <span>Need help? Contact our support team</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
