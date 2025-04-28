<x-app-layout>

    <!-- Hero Section -->
    <div class="relative min-h-screen bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-800 overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-10 left-10 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
            <div class="absolute top-20 right-10 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-20 left-20 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
        </div>

        <!-- Main Content -->
        <div class="relative z-10 flex items-center justify-center min-h-screen">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <!-- Main Title -->
                <div class="mb-8 transform hover:scale-105 transition-transform duration-300">
                    <h1 class="text-6xl md:text-7xl lg:text-8xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-white via-purple-200 to-pink-200 leading-tight mb-6 animate-fade-in">
                        Livewire
                    </h1>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4 animate-fade-in-delay">
                        Comments Management System
                    </h2>
                    <div class="w-32 h-1 bg-gradient-to-r from-purple-400 to-pink-400 mx-auto mb-8 rounded-full"></div>
                </div>

                <!-- Description -->
                <p class="text-xl md:text-2xl text-purple-100 mb-12 max-w-3xl mx-auto leading-relaxed animate-fade-in-delay-2">
                    Build, manage, and engage with a powerful commenting system. 
                    Create articles, share episodes, and foster meaningful discussions with your community.
                </p>

                <!-- Features Grid -->
                <div class="grid md:grid-cols-3 gap-8 mb-12 animate-fade-in-delay-3">
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 hover:bg-white/20 transition-all duration-300 hover:transform hover:-translate-y-2">
                        <div class="text-4xl mb-4">📝</div>
                        <h3 class="text-xl font-semibold text-white mb-2">Create Articles</h3>
                        <p class="text-purple-200">Share your thoughts and ideas with beautifully crafted articles</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 hover:bg-white/20 transition-all duration-300 hover:transform hover:-translate-y-2">
                        <div class="text-4xl mb-4">🎬</div>
                        <h3 class="text-xl font-semibold text-white mb-2">Share Episodes</h3>
                        <p class="text-purple-200">Upload and manage your video content with ease</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 hover:bg-white/20 transition-all duration-300 hover:transform hover:-translate-y-2">
                        <div class="text-4xl mb-4">💬</div>
                        <h3 class="text-xl font-semibold text-white mb-2">Engage & Comment</h3>
                        <p class="text-purple-200">Build communities through meaningful conversations</p>
                    </div>
                </div>

                <!-- Call to Action -->
                @guest
                    <div class="space-y-6 animate-fade-in-delay-4">
                        <p class="text-lg text-purple-200 mb-8">
                            Join our community today and start your journey!
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                            <a href="{{ route('register') }}" 
                               class="group relative px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-full hover:from-purple-700 hover:to-pink-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-2xl">
                                <span class="relative z-10">Get Started</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full blur opacity-25 group-hover:opacity-40 transition-opacity duration-300"></div>
                            </a>
                            <span class="text-purple-200 font-medium">or</span>
                            <a href="{{ route('login') }}" 
                               class="px-8 py-4 border-2 border-purple-300 text-purple-200 font-semibold rounded-full hover:bg-purple-300 hover:text-purple-900 transform hover:scale-105 transition-all duration-300">
                                Sign In
                            </a>
                        </div>
                    </div>
                @else
                    <div class="animate-fade-in-delay-4">
                        <p class="text-lg text-purple-200 mb-8">
                            Welcome back! Ready to create something amazing?
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                            <a href="{{ route('articles.index') }}" 
                               class="group relative px-8 py-4 bg-gradient-to-r from-green-600 to-teal-600 text-white font-semibold rounded-full hover:from-green-700 hover:to-teal-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-2xl">
                                <span class="relative z-10">View Articles</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-green-600 to-teal-600 rounded-full blur opacity-25 group-hover:opacity-40 transition-opacity duration-300"></div>
                            </a>
                            <a href="{{ route('episodes.index') }}" 
                               class="px-8 py-4 border-2 border-teal-300 text-teal-200 font-semibold rounded-full hover:bg-teal-300 hover:text-teal-900 transform hover:scale-105 transition-all duration-300">
                                Browse Episodes
                            </a>
                        </div>
                    </div>
                @endguest

                <!-- Scroll Indicator -->
                <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
                    <div class="w-6 h-10 border-2 border-purple-300 rounded-full flex justify-center">
                        <div class="w-1 h-3 bg-purple-300 rounded-full mt-2 animate-pulse"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="relative z-10 bg-black/20 backdrop-blur-sm border-t border-white/10">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div class="transform hover:scale-110 transition-transform duration-300">
                        <div class="text-3xl font-bold text-white mb-2">1000+</div>
                        <div class="text-purple-200">Articles</div>
                    </div>
                    <div class="transform hover:scale-110 transition-transform duration-300">
                        <div class="text-3xl font-bold text-white mb-2">500+</div>
                        <div class="text-purple-200">Episodes</div>
                    </div>
                    <div class="transform hover:scale-110 transition-transform duration-300">
                        <div class="text-3xl font-bold text-white mb-2">5000+</div>
                        <div class="text-purple-200">Comments</div>
                    </div>
                    <div class="transform hover:scale-110 transition-transform duration-300">
                        <div class="text-3xl font-bold text-white mb-2">200+</div>
                        <div class="text-purple-200">Users</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-blob {
            animation: blob 7s infinite;
        }
        
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        
        .animation-delay-4000 {
            animation-delay: 4s;
        }
        
        .animate-fade-in {
            animation: fade-in 1s ease-out;
        }
        
        .animate-fade-in-delay {
            animation: fade-in 1s ease-out 0.3s both;
        }
        
        .animate-fade-in-delay-2 {
            animation: fade-in 1s ease-out 0.6s both;
        }
        
        .animate-fade-in-delay-3 {
            animation: fade-in 1s ease-out 0.9s both;
        }
        
        .animate-fade-in-delay-4 {
            animation: fade-in 1s ease-out 1.2s both;
        }
    </style>
</x-app-layout>
