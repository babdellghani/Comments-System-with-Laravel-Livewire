<div>
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-indigo-600 via-blue-600 to-cyan-600 py-16 relative overflow-hidden">
        <!-- Background decorations -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-48 h-48 bg-cyan-300/20 rounded-full blur-2xl"></div>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                    🎬 Episodes Collection
                </h1>
                <p class="text-xl text-blue-100 max-w-2xl mx-auto">
                    Watch amazing episodes and share your thoughts with our community
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="py-12 bg-gradient-to-br from-slate-50 via-blue-50/30 to-cyan-50/30 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Success Message -->
            @if (session()->has('message'))
                <div class="mb-8 animate-fade-in-up">
                    <div class="bg-gradient-to-r from-emerald-50 to-teal-50 border-l-4 border-emerald-500 rounded-r-xl p-6 shadow-lg">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold">✓</span>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-emerald-800 font-medium">{{ session('message') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Action Section -->
            <div class="mb-8">
                @auth
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-2">Your Episodes</h2>
                            <p class="text-gray-600">Create and manage your amazing video content</p>
                        </div>
                        <button wire:click="create()" 
                                class="group relative inline-flex items-center px-8 py-4 bg-gradient-to-r from-indigo-600 to-cyan-600 text-white font-semibold rounded-2xl hover:from-indigo-700 hover:to-cyan-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                            <span class="flex items-center space-x-2">
                                <span>🎬</span>
                                <span>Create New Episode</span>
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-cyan-600 rounded-2xl blur opacity-25 group-hover:opacity-40 transition-opacity duration-300"></div>
                        </button>
                    </div>
                @endauth

                @guest
                    <div class="text-center py-16">
                        <div class="bg-white/60 backdrop-blur-sm rounded-3xl p-12 shadow-xl border border-blue-100/50">
                            <div class="text-6xl mb-6">🔐</div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">Join Our Community</h3>
                            <p class="text-gray-600 mb-8 max-w-md mx-auto">Please sign in to create and edit episodes. Share your videos and connect with our amazing community!</p>
                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <a href="{{ route('login') }}" 
                                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-cyan-600 text-white font-semibold rounded-xl hover:from-indigo-700 hover:to-cyan-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                                    <span class="mr-2">🔑</span>
                                    Sign In
                                </a>
                                <a href="{{ route('register') }}" 
                                   class="inline-flex items-center px-6 py-3 border-2 border-blue-300 text-blue-700 font-semibold rounded-xl hover:bg-blue-50 transition-all duration-300">
                                    <span class="mr-2">✨</span>
                                    Register
                                </a>
                            </div>
                        </div>
                    </div>
                @endguest
            </div>

            <!-- Modal -->
            @if ($isOpen)
                @include('livewire.episodes.create')
            @endif

            <!-- Episodes Grid -->
            @if($episodes->count() > 0)
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($episodes->items() as $episode)
                        <div class="group bg-white/80 backdrop-blur-sm overflow-hidden shadow-xl rounded-3xl hover:shadow-2xl transition-all duration-500 hover:transform hover:-translate-y-2 border border-blue-100/50">
                            
                            <!-- Episode Thumbnail -->
                            <div class="relative bg-gradient-to-r from-indigo-500 to-cyan-500 h-48 flex items-center justify-center">
                                <div class="text-6xl text-white/80">🎬</div>
                                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors duration-300"></div>
                                <div class="absolute top-4 right-4">
                                    <div class="bg-black/50 backdrop-blur-sm rounded-full px-3 py-1 text-white text-sm font-medium">
                                        HD
                                    </div>
                                </div>
                                <div class="absolute bottom-4 left-4">
                                    <div class="bg-black/50 backdrop-blur-sm rounded-full px-3 py-1 text-white text-sm font-medium">
                                        🕒 25:30
                                    </div>
                                </div>
                            </div>

                            <!-- Episode Content -->
                            <div class="p-8">
                                <!-- Episode Header -->
                                <div class="mb-6">
                                    <div class="flex items-start justify-between mb-4">
                                        <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-cyan-500 rounded-xl flex items-center justify-center text-white font-bold text-lg shadow-lg">
                                            🎥
                                        </div>
                                        <div class="flex items-center space-x-1">
                                            @can('update', $episode)
                                                <button wire:click="edit({{ $episode->id }})"
                                                        class="p-2 bg-blue-100 hover:bg-blue-200 text-blue-600 rounded-xl transition-colors duration-200 hover:scale-110">
                                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </button>
                                            @endcan

                                            @can('delete', $episode)
                                                <button wire:click="delete({{ $episode->id }})"
                                                        class="p-2 bg-red-100 hover:bg-red-200 text-red-600 rounded-xl transition-colors duration-200 hover:scale-110">
                                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            @endcan
                                        </div>
                                    </div>
                                    
                                    <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-indigo-600 transition-colors duration-300">
                                        {{ $episode->title }}
                                    </h3>
                                    
                                    <div class="flex items-center text-sm text-gray-500 mb-4">
                                        <span class="mr-2">🕒</span>
                                        <span>{{ $episode->created_at->diffForHumans() }}</span>
                                    </div>
                                    
                                    @if($episode->user)
                                        <div class="flex items-center mb-4">
                                            <div class="w-8 h-8 bg-gradient-to-r from-indigo-400 to-cyan-400 rounded-full flex items-center justify-center text-white font-semibold text-sm mr-3">
                                                {{ substr($episode->user->name, 0, 1) }}
                                            </div>
                                            <span class="text-sm text-gray-600">by {{ $episode->user->name }}</span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Episode Stats -->
                                <div class="flex items-center justify-between mb-6 pt-4 border-t border-gray-100">
                                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                                        <span class="flex items-center">
                                            <span class="mr-1">👁️</span>
                                            1.2K views
                                        </span>
                                        <span class="flex items-center">
                                            <span class="mr-1">💬</span>
                                            Comments
                                        </span>
                                        <span class="flex items-center">
                                            <span class="mr-1">❤️</span>
                                            Likes
                                        </span>
                                    </div>
                                </div>

                                <!-- Episode Actions -->
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                        <span class="text-sm text-green-600 font-medium">Available</span>
                                    </div>
                                    
                                    <a href="{{ route('episode.show', $episode->slug) }}"
                                       class="group inline-flex items-center px-4 py-2 bg-gradient-to-r from-indigo-500 to-cyan-500 text-white font-medium rounded-xl hover:from-indigo-600 hover:to-cyan-600 transition-all duration-300 shadow-md hover:shadow-lg transform hover:scale-105">
                                        <span class="mr-2">▶️</span>
                                        <span>Watch Now</span>
                                        <svg class="ml-2 h-4 w-4 transition-transform duration-200 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-20">
                    <div class="bg-white/60 backdrop-blur-sm rounded-3xl p-16 shadow-xl border border-blue-100/50 max-w-2xl mx-auto">
                        <div class="text-8xl mb-8">🎬</div>
                        <h3 class="text-3xl font-bold text-gray-800 mb-4">No Episodes Yet</h3>
                        <p class="text-gray-600 mb-8 text-lg">Be the first to share your amazing videos with our community!</p>
                        @auth
                            <button wire:click="create()" 
                                    class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-indigo-600 to-cyan-600 text-white font-semibold rounded-2xl hover:from-indigo-700 hover:to-cyan-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                                <span class="mr-2">🎬</span>
                                Create First Episode
                            </button>
                        @endauth
                    </div>
                </div>
            @endif

            <!-- Pagination -->
            @if($episodes->hasPages())
                <div class="mt-12 flex justify-center">
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-4 shadow-lg border border-blue-100/50">
                        {{ $episodes->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
