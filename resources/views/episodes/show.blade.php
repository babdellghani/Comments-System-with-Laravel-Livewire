<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-cyan-500 rounded-xl flex items-center justify-center text-white font-bold text-lg shadow-lg">
                🎬
            </div>
            <div>
                <h2 class="font-bold text-2xl text-white leading-tight">
                    {{ $episode->title }}
                </h2>
                <p class="text-blue-100 text-sm">
                    Published {{ $episode->created_at->diffForHumans() }}
                    @if($episode->user)
                        by {{ $episode->user->name }}
                    @endif
                </p>
            </div>
        </div>
    </x-slot>

    <!-- Episode Hero Section -->
    <div class="bg-gradient-to-r from-indigo-600 via-blue-600 to-cyan-600 py-16 relative overflow-hidden">
        <!-- Background decorations -->
        <div class="absolute inset-0">
            <div class="absolute top-10 left-10 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-48 h-48 bg-cyan-300/20 rounded-full blur-2xl"></div>
        </div>
        
        <div class="relative z-10 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Episode Info -->
                <div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 border border-white/20">
                        <h1 class="text-3xl md:text-4xl font-bold text-white mb-6">
                            {{ $episode->title }}
                        </h1>
                        
                        <div class="flex flex-wrap items-center gap-6 text-blue-100 mb-6">
                            @if($episode->user)
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center text-white font-semibold">
                                        {{ substr($episode->user->name, 0, 1) }}
                                    </div>
                                    <div class="text-left">
                                        <p class="font-medium text-white">{{ $episode->user->name }}</p>
                                        <p class="text-sm text-blue-200">Creator</p>
                                    </div>
                                </div>
                            @endif
                            
                            <div class="flex items-center space-x-2">
                                <span>🕒</span>
                                <span>{{ $episode->created_at->format('M d, Y') }}</span>
                            </div>
                            
                            <div class="flex items-center space-x-2">
                                <span>⏱️</span>
                                <span>25:30 duration</span>
                            </div>
                            
                            <div class="flex items-center space-x-2">
                                <span>👁️</span>
                                <span>1.2K views</span>
                            </div>
                        </div>

                        <!-- Episode Stats -->
                        <div class="grid grid-cols-3 gap-4 mb-6">
                            <div class="bg-white/10 rounded-xl p-4 text-center">
                                <div class="text-2xl font-bold text-white">1.2K</div>
                                <div class="text-sm text-blue-200">Views</div>
                            </div>
                            <div class="bg-white/10 rounded-xl p-4 text-center">
                                <div class="text-2xl font-bold text-white">89</div>
                                <div class="text-sm text-blue-200">Likes</div>
                            </div>
                            <div class="bg-white/10 rounded-xl p-4 text-center">
                                <div class="text-2xl font-bold text-white">12</div>
                                <div class="text-sm text-blue-200">Comments</div>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-3">
                            @can('update', $episode)
                                <a href="{{ route('episodes.edit', $episode) }}" 
                                   class="inline-flex items-center px-4 py-2 bg-white/20 hover:bg-white/30 text-white font-medium rounded-xl transition-all duration-300 hover:scale-105">
                                    <span class="mr-2">✏️</span>
                                    Edit Episode
                                </a>
                            @endcan
                            
                            <a href="{{ route('episodes.index') }}" 
                               class="inline-flex items-center px-4 py-2 bg-white/20 hover:bg-white/30 text-white font-medium rounded-xl transition-all duration-300 hover:scale-105">
                                <span class="mr-2">🎬</span>
                                All Episodes
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Video Player Placeholder -->
                <div class="lg:order-first">
                    <div class="relative bg-black rounded-3xl overflow-hidden shadow-2xl">
                        <div class="aspect-video flex items-center justify-center bg-gradient-to-r from-gray-900 to-gray-800">
                            <!-- Video Player Placeholder -->
                            <div class="text-center text-white">
                                <div class="w-20 h-20 mx-auto mb-4 bg-white/20 rounded-full flex items-center justify-center">
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold mb-2">Video Player</h3>
                                <p class="text-gray-300">Integrate your preferred video player here</p>
                                <p class="text-sm text-gray-400 mt-2">(YouTube, Vimeo, HTML5, etc.)</p>
                            </div>
                        </div>
                        
                        <!-- Video Controls Overlay -->
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                            <div class="flex items-center justify-between text-white">
                                <div class="flex items-center space-x-4">
                                    <button class="hover:text-blue-400 transition-colors">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z"/>
                                        </svg>
                                    </button>
                                    <span class="text-sm">00:00 / 25:30</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <button class="hover:text-blue-400 transition-colors p-2">
                                        <span>🔊</span>
                                    </button>
                                    <button class="hover:text-blue-400 transition-colors p-2">
                                        <span>⚙️</span>
                                    </button>
                                    <button class="hover:text-blue-400 transition-colors p-2">
                                        <span>⛶</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Episode Content & Comments -->
    <div class="py-12 bg-gradient-to-br from-slate-50 via-blue-50/30 to-cyan-50/30 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Episode Description -->
            <div class="mb-8">
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-8 shadow-lg border border-blue-100/50">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                        <span class="mr-3">📺</span>
                        Episode Description
                    </h3>
                    
                    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                        <p class="text-lg text-gray-600 mb-6">
                            This is where the episode description would be displayed. You can add a description field to your Episode model and display it here.
                        </p>
                        
                        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-2xl p-6 border border-blue-100">
                            <h4 class="text-xl font-semibold text-gray-800 mb-3">🎬 Episode Details</h4>
                            <div class="grid md:grid-cols-2 gap-4 text-gray-600">
                                <p><strong>Title:</strong> {{ $episode->title }}</p>
                                <p><strong>Slug:</strong> <code class="bg-white px-2 py-1 rounded text-sm">{{ $episode->slug }}</code></p>
                                <p><strong>Duration:</strong> 25:30</p>
                                <p><strong>Quality:</strong> HD 1080p</p>
                                <p><strong>Format:</strong> MP4</p>
                                <p><strong>Status:</strong> <span class="text-green-600 font-medium">Available</span></p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-4 mt-8 pt-6 border-t border-gray-100">
                        <button class="inline-flex items-center px-4 py-2 bg-red-100 hover:bg-red-200 text-red-700 font-medium rounded-xl transition-all duration-300 hover:scale-105">
                            <span class="mr-2">❤️</span>
                            Like (89)
                        </button>
                        <button class="inline-flex items-center px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-700 font-medium rounded-xl transition-all duration-300 hover:scale-105">
                            <span class="mr-2">💾</span>
                            Save to Playlist
                        </button>
                        <button class="inline-flex items-center px-4 py-2 bg-green-100 hover:bg-green-200 text-green-700 font-medium rounded-xl transition-all duration-300 hover:scale-105">
                            <span class="mr-2">📤</span>
                            Share Episode
                        </button>
                        <button class="inline-flex items-center px-4 py-2 bg-purple-100 hover:bg-purple-200 text-purple-700 font-medium rounded-xl transition-all duration-300 hover:scale-105">
                            <span class="mr-2">🔔</span>
                            Subscribe
                        </button>
                    </div>
                </div>
            </div>

            <!-- Comments Section -->
            <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-xl rounded-3xl border border-blue-100/50">
                <div class="border-b border-blue-100 bg-gradient-to-r from-blue-50/50 to-cyan-50/50 p-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                        <span class="mr-3">💬</span>
                        Comments & Discussions
                    </h3>
                    <p class="text-gray-600">
                        Share your thoughts about this episode and engage with the community below.
                    </p>
                </div>
                
                <!-- Livewire Comments Component -->
                <div class="p-8">
                    @livewire('comments', ['model' => $episode])
                </div>
            </div>

            <!-- Related Episodes (placeholder) -->
            <div class="mt-12">
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-8 shadow-lg border border-blue-100/50">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                        <span class="mr-3">🔗</span>
                        Related Episodes
                    </h3>
                    
                    <div class="grid md:grid-cols-3 gap-6">
                        <!-- Placeholder for related episodes -->
                        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl p-6 border border-blue-100">
                            <div class="text-4xl mb-3">🎬</div>
                            <h4 class="font-semibold text-gray-800 mb-2">Coming Soon</h4>
                            <p class="text-gray-600 text-sm">Related episodes will be displayed here based on tags and categories.</p>
                        </div>
                        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl p-6 border border-blue-100">
                            <div class="text-4xl mb-3">📺</div>
                            <h4 class="font-semibold text-gray-800 mb-2">Popular Episodes</h4>
                            <p class="text-gray-600 text-sm">Most popular episodes from the community will appear here.</p>
                        </div>
                        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl p-6 border border-blue-100">
                            <div class="text-4xl mb-3">🎥</div>
                            <h4 class="font-semibold text-gray-800 mb-2">Up Next</h4>
                            <p class="text-gray-600 text-sm">Continue watching with the next episode in the series.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>