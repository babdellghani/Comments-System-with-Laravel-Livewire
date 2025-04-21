<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center text-white font-bold text-lg shadow-lg">
                📝
            </div>
            <div>
                <h2 class="font-bold text-2xl text-white leading-tight">
                    {{ $article->title }}
                </h2>
                <p class="text-purple-100 text-sm">
                    Published {{ $article->created_at->diffForHumans() }}
                    @if($article->user)
                        by {{ $article->user->name }}
                    @endif
                </p>
            </div>
        </div>
    </x-slot>

    <!-- Article Hero Section -->
    <div class="bg-gradient-to-r from-purple-600 via-purple-700 to-pink-600 py-16 relative overflow-hidden">
        <!-- Background decorations -->
        <div class="absolute inset-0">
            <div class="absolute top-10 left-10 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-48 h-48 bg-pink-300/20 rounded-full blur-2xl"></div>
        </div>
        
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 border border-white/20">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">
                    {{ $article->title }}
                </h1>
                
                <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-8 text-purple-100">
                    @if($article->user)
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center text-white font-semibold">
                                {{ substr($article->user->name, 0, 1) }}
                            </div>
                            <div class="text-left">
                                <p class="font-medium text-white">{{ $article->user->name }}</p>
                                <p class="text-sm text-purple-200">Author</p>
                            </div>
                        </div>
                    @endif
                    
                    <div class="flex items-center space-x-2">
                        <span>🕒</span>
                        <span>{{ $article->created_at->format('M d, Y') }}</span>
                    </div>
                    
                    <div class="flex items-center space-x-2">
                        <span>⏱️</span>
                        <span>5 min read</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Article Content & Comments -->
    <div class="py-12 bg-gradient-to-br from-slate-50 via-purple-50/30 to-pink-50/30 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Article Actions -->
            <div class="mb-8">
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-purple-100/50">
                    <div class="flex flex-col sm:flex-row items-center justify-between space-y-4 sm:space-y-0">
                        <div class="flex items-center space-x-6">
                            <div class="flex items-center space-x-2 text-gray-600">
                                <span>💬</span>
                                <span class="font-medium">Comments</span>
                            </div>
                            <div class="flex items-center space-x-2 text-gray-600">
                                <span>👁️</span>
                                <span class="font-medium">Views</span>
                            </div>
                            <div class="flex items-center space-x-2 text-gray-600">
                                <span>❤️</span>
                                <span class="font-medium">Likes</span>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            @can('update', $article)
                                <a href="{{ route('articles.edit', $article) }}" 
                                   class="inline-flex items-center px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-700 font-medium rounded-xl transition-all duration-300 hover:scale-105">
                                    <span class="mr-2">✏️</span>
                                    Edit Article
                                </a>
                            @endcan
                            
                            <a href="{{ route('articles.index') }}" 
                               class="inline-flex items-center px-4 py-2 bg-purple-100 hover:bg-purple-200 text-purple-700 font-medium rounded-xl transition-all duration-300 hover:scale-105">
                                <span class="mr-2">📚</span>
                                All Articles
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article Content Area -->
            <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-xl rounded-3xl border border-purple-100/50">
                
                <!-- Article Body -->
                <div class="p-8 md:p-12">
                    <div class="prose prose-lg max-w-none">
                        <!-- Placeholder for article content -->
                        <div class="text-gray-700 leading-relaxed">
                            <p class="text-lg text-gray-600 mb-6 italic">
                                This is where the article content would be displayed. You can add a content field to your Article model and display it here.
                            </p>
                            
                            <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-2xl p-6 border border-purple-100">
                                <h3 class="text-xl font-semibold text-gray-800 mb-3">📝 Article Preview</h3>
                                <p class="text-gray-600">
                                    Currently displaying: <strong>{{ $article->title }}</strong>
                                </p>
                                <p class="text-gray-600 mt-2">
                                    Slug: <code class="bg-white px-2 py-1 rounded text-sm">{{ $article->slug }}</code>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comments Section -->
                <div class="border-t border-purple-100 bg-gradient-to-r from-purple-50/50 to-pink-50/50 p-8 md:p-12">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                            <span class="mr-3">💬</span>
                            Comments & Discussions
                        </h3>
                        <p class="text-gray-600">
                            Share your thoughts and engage with the community below.
                        </p>
                    </div>
                    
                    <!-- Livewire Comments Component -->
                    <div class="bg-white rounded-2xl shadow-lg border border-purple-100/50 overflow-hidden">
                        @livewire('comments', ['model' => $article])
                    </div>
                </div>
            </div>

            <!-- Related Articles (placeholder) -->
            <div class="mt-12">
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-8 shadow-lg border border-purple-100/50">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                        <span class="mr-3">🔗</span>
                        Related Articles
                    </h3>
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Placeholder for related articles -->
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-6 border border-purple-100">
                            <h4 class="font-semibold text-gray-800 mb-2">Coming Soon</h4>
                            <p class="text-gray-600 text-sm">Related articles will be displayed here based on tags and categories.</p>
                        </div>
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-6 border border-purple-100">
                            <h4 class="font-semibold text-gray-800 mb-2">Popular Articles</h4>
                            <p class="text-gray-600 text-sm">Most popular articles from the community will appear here.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>