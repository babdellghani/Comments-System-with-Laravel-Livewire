<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-xl flex items-center justify-center text-white font-bold text-lg shadow-lg">
                📊
            </div>
            <div>
                <h2 class="font-bold text-2xl text-balck leading-tight">
                    Dashboard
                </h2>
                <p class="text-purple-700 text-sm">
                    Welcome back, {{ Auth::user()->name }}! Here's your activity overview.
                </p>
            </div>
        </div>
    </x-slot>

    <!-- Dashboard Hero Section -->
    <div class="bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 py-16 relative overflow-hidden">
        <!-- Background decorations -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-48 h-48 bg-cyan-300/20 rounded-full blur-2xl"></div>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 border border-white/20 max-w-2xl mx-auto">
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                        Welcome Back! 👋
                    </h1>
                    <p class="text-xl text-emerald-100 mb-6">
                        Great to see you again, <strong>{{ Auth::user()->name }}</strong>
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-8 text-emerald-100">
                        <div class="flex items-center space-x-2">
                            <span>📅</span>
                            <span>{{ now()->format('l, F j, Y') }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span>⏰</span>
                            <span>{{ now()->format('g:i A') }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span>🎯</span>
                            <span>Ready to create?</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Content -->
    <div class="py-12 bg-gradient-to-br from-slate-50 via-emerald-50/30 to-teal-50/30 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Quick Stats -->
            <div class="mb-12">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">📈 Your Activity Overview</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Articles Stats -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-purple-100/50 hover:shadow-xl transition-all duration-300 hover:transform hover:-translate-y-1">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                                <span class="text-white text-xl">📝</span>
                            </div>
                            <span class="text-2xl font-bold text-gray-800">{{ \App\Models\Article::where('user_id', Auth::id())->count() }}</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Articles Created</h4>
                        <p class="text-sm text-gray-600">Your published articles</p>
                        <div class="mt-4">
                            <a href="{{ route('articles.index') }}" class="text-purple-600 hover:text-purple-700 text-sm font-medium">View Articles →</a>
                        </div>
                    </div>

                    <!-- Episodes Stats -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-blue-100/50 hover:shadow-xl transition-all duration-300 hover:transform hover:-translate-y-1">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-cyan-500 rounded-xl flex items-center justify-center">
                                <span class="text-white text-xl">🎬</span>
                            </div>
                            <span class="text-2xl font-bold text-gray-800">{{ \App\Models\Episode::where('user_id', Auth::id())->count() }}</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Episodes Created</h4>
                        <p class="text-sm text-gray-600">Your video content</p>
                        <div class="mt-4">
                            <a href="{{ route('episodes.index') }}" class="text-indigo-600 hover:text-indigo-700 text-sm font-medium">View Episodes →</a>
                        </div>
                    </div>

                    <!-- Comments Stats -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-emerald-100/50 hover:shadow-xl transition-all duration-300 hover:transform hover:-translate-y-1">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-xl flex items-center justify-center">
                                <span class="text-white text-xl">💬</span>
                            </div>
                            <span class="text-2xl font-bold text-gray-800">{{ \App\Models\Comment::where('user_id', Auth::id())->count() }}</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Comments Made</h4>
                        <p class="text-sm text-gray-600">Your community engagement</p>
                        <div class="mt-4">
                            <span class="text-emerald-600 text-sm font-medium">Keep engaging! 💪</span>
                        </div>
                    </div>

                    <!-- Profile Stats -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-orange-100/50 hover:shadow-xl transition-all duration-300 hover:transform hover:-translate-y-1">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-red-500 rounded-xl flex items-center justify-center">
                                <span class="text-white text-xl">👤</span>
                            </div>
                            <span class="text-2xl font-bold text-gray-800">{{ Auth::user()->created_at->diffInDays() }}</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Days Active</h4>
                        <p class="text-sm text-gray-600">Member since {{ Auth::user()->created_at->format('M Y') }}</p>
                        <div class="mt-4">
                            <a href="{{ route('profile.edit') }}" class="text-orange-600 hover:text-orange-700 text-sm font-medium">Edit Profile →</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mb-12">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">🚀 Quick Actions</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Create Article -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-8 shadow-lg border border-purple-100/50 hover:shadow-xl transition-all duration-300 group">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                                <span class="text-white text-2xl">📝</span>
                            </div>
                            <h4 class="text-xl font-bold text-gray-800 mb-3">Create Article</h4>
                            <p class="text-gray-600 mb-6">Share your thoughts and ideas with the community</p>
                            <a href="{{ route('articles.index') }}" 
                               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-xl hover:from-purple-700 hover:to-pink-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                                <span class="mr-2">✨</span>
                                Start Writing
                            </a>
                        </div>
                    </div>

                    <!-- Create Episode -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-8 shadow-lg border border-blue-100/50 hover:shadow-xl transition-all duration-300 group">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gradient-to-r from-indigo-500 to-cyan-500 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                                <span class="text-white text-2xl">🎬</span>
                            </div>
                            <h4 class="text-xl font-bold text-gray-800 mb-3">Create Episode</h4>
                            <p class="text-gray-600 mb-6">Upload and share your video content</p>
                            <a href="{{ route('episodes.index') }}" 
                               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-cyan-600 text-white font-semibold rounded-xl hover:from-indigo-700 hover:to-cyan-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                                <span class="mr-2">🎥</span>
                                Start Recording
                            </a>
                        </div>
                    </div>

                    <!-- Browse Content -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-8 shadow-lg border border-emerald-100/50 hover:shadow-xl transition-all duration-300 group">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                                <span class="text-white text-2xl">🌍</span>
                            </div>
                            <h4 class="text-xl font-bold text-gray-800 mb-3">Explore Community</h4>
                            <p class="text-gray-600 mb-6">Discover amazing content from other creators</p>
                            <a href="{{ route('welcome') }}" 
                               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold rounded-xl hover:from-emerald-700 hover:to-teal-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                                <span class="mr-2">🔍</span>
                                Explore Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="mb-12">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">📊 Recent Activity</h3>
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-8 shadow-lg border border-gray-100/50">
                    <div class="space-y-6">
                        <!-- Activity Item 1 -->
                        <div class="flex items-center space-x-4 p-4 bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl">
                            <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white font-bold">
                                📝
                            </div>
                            <div class="flex-1">
                                <p class="font-medium text-gray-800">Welcome to the platform!</p>
                                <p class="text-sm text-gray-600">You joined {{ Auth::user()->created_at->diffForHumans() }}</p>
                            </div>
                            <span class="text-sm text-purple-600 font-medium">{{ Auth::user()->created_at->format('M d') }}</span>
                        </div>

                        <!-- Activity Item 2 -->
                        <div class="flex items-center space-x-4 p-4 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl">
                            <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-cyan-500 rounded-full flex items-center justify-center text-white font-bold">
                                🎯
                            </div>
                            <div class="flex-1">
                                <p class="font-medium text-gray-800">Ready to start creating?</p>
                                <p class="text-sm text-gray-600">Create your first article or episode to get started</p>
                            </div>
                            <span class="text-sm text-indigo-600 font-medium">Now</span>
                        </div>

                        <!-- Activity Item 3 -->
                        <div class="flex items-center space-x-4 p-4 bg-gradient-to-r from-emerald-50 to-teal-50 rounded-xl">
                            <div class="w-10 h-10 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full flex items-center justify-center text-white font-bold">
                                💡
                            </div>
                            <div class="flex-1">
                                <p class="font-medium text-gray-800">Pro tip: Engage with the community</p>
                                <p class="text-sm text-gray-600">Comments and interactions help build your audience</p>
                            </div>
                            <span class="text-sm text-emerald-600 font-medium">Tip</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Profile Summary -->
            <div>
                <h3 class="text-2xl font-bold text-gray-800 mb-6">👤 Your Profile</h3>
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-8 shadow-lg border border-gray-100/50">
                    <div class="flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-8">
                        <!-- Avatar -->
                        <div class="flex-shrink-0">
                            <div class="w-24 h-24 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center text-white font-bold text-3xl shadow-lg">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        </div>
                        
                        <!-- Profile Info -->
                        <div class="flex-1 text-center md:text-left">
                            <h4 class="text-2xl font-bold text-gray-800 mb-2">{{ Auth::user()->name }}</h4>
                            <p class="text-gray-600 mb-4">{{ Auth::user()->email }}</p>
                            
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-purple-600">{{ \App\Models\Article::where('user_id', Auth::id())->count() }}</div>
                                    <div class="text-sm text-gray-600">Articles</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-indigo-600">{{ \App\Models\Episode::where('user_id', Auth::id())->count() }}</div>
                                    <div class="text-sm text-gray-600">Episodes</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-emerald-600">{{ \App\Models\Comment::where('user_id', Auth::id())->count() }}</div>
                                    <div class="text-sm text-gray-600">Comments</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-orange-600">{{ Auth::user()->created_at->diffInDays() }}</div>
                                    <div class="text-sm text-gray-600">Days</div>
                                </div>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row gap-3">
                                <a href="{{ route('profile.edit') }}" 
                                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-xl hover:from-purple-700 hover:to-pink-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                                    <span class="mr-2">⚙️</span>
                                    Edit Profile
                                </a>
                                <a href="{{ route('welcome') }}" 
                                   class="inline-flex items-center px-6 py-3 border-2 border-purple-300 text-purple-700 font-semibold rounded-xl hover:bg-purple-50 transition-all duration-300">
                                    <span class="mr-2">🏠</span>
                                    Go to Home
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
