<section class="bg-gradient-to-br from-slate-50 via-purple-50/30 to-pink-50/30 py-12 lg:py-16 relative overflow-hidden">
    <!-- Background decorations -->
    <div class="absolute inset-0">
        <div class="absolute top-20 left-20 w-64 h-64 bg-purple-200/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-20 w-48 h-48 bg-pink-200/20 rounded-full blur-2xl"></div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Message Alert --}}
        @if (session()->has('message'))
            <div class="mb-8 bg-gradient-to-r from-emerald-500 to-teal-500 text-white rounded-2xl p-6 shadow-lg border border-emerald-200" role="alert">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                        <span class="text-white text-xl">✅</span>
                    </div>
                    <div>
                        <h4 class="font-semibold">Success!</h4>
                        <p class="text-emerald-100">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
        @endif

        {{-- Discussion Header --}}
        <div class="mb-8">
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-purple-100/50 p-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center">
                            <span class="text-white text-2xl">💬</span>
                        </div>
                        <div>
                            <h2 class="text-2xl lg:text-3xl font-bold text-gray-900">
                                Discussion
                            </h2>
                            <p class="text-gray-600">
                                {{ $comments->total() }} {{ Str::plural('comment', $comments->total()) }}
                            </p>
                        </div>
                    </div>
                    <div class="hidden sm:block">
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl px-4 py-2 border border-purple-100">
                            <span class="text-purple-700 font-semibold text-sm">💭 Join the conversation</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Comment Form --}}
        <div class="mb-8">
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-purple-100/50 p-8">
                @auth
                    <div class="flex items-center space-x-4 mb-6">
                        <img class="w-12 h-12 rounded-full ring-2 ring-purple-200" 
                             src="{{ Auth::user()->avatar() }}"
                             alt="{{ Auth::user()->name }}">
                        <div>
                            <h3 class="font-semibold text-gray-900">Add your comment</h3>
                            <p class="text-gray-600 text-sm">Share your thoughts with the community</p>
                        </div>
                    </div>

                    <form wire:submit="postComment" class="space-y-4">
                        <div>
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea wire:model="form.body" 
                                style="resize: none" 
                                rows="4" 
                                placeholder="What are your thoughts?"
                                class="w-full px-4 py-3 border-2 border-purple-200 rounded-xl focus:ring-4 focus:ring-purple-500/20 focus:border-purple-500 transition-all duration-300 text-gray-800 placeholder-gray-500 bg-white resize-none
                                @error('form.body') border-red-300 focus:border-red-500 focus:ring-red-500/20 @enderror"></textarea>

                            @error('form.body')
                                <div class="mt-2 flex items-center text-red-600">
                                    <span class="mr-2">⚠️</span>
                                    <span class="text-sm">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2 text-sm text-gray-500">
                                <span>💡</span>
                                <span>Be respectful and constructive</span>
                            </div>
                            <button type="submit"
                                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-xl hover:from-purple-700 hover:to-pink-700 focus:outline-none focus:ring-4 focus:ring-purple-500/50 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                                <span class="mr-2">💬</span>
                                Post Comment
                            </button>
                        </div>
                    </form>
                @else
                    <div class="text-center py-8">
                        <div class="w-20 h-20 bg-gradient-to-r from-purple-100 to-pink-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <span class="text-purple-600 text-3xl">🔐</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Join the discussion</h3>
                        <p class="text-gray-600 mb-6">Sign in to share your thoughts and engage with the community</p>
                        <a href="{{ route('login') }}" 
                           class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-xl hover:from-purple-700 hover:to-pink-700 focus:outline-none focus:ring-4 focus:ring-purple-500/50 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                            <span class="mr-2">🔑</span>
                            Sign In to Comment
                        </a>
                    </div>
                @endauth
            </div>
        </div>

        {{-- Comments List --}}
        @if ($comments->count() > 0)
            <div class="space-y-6">
                @foreach ($comments as $comment)
                    @livewire('comment', ['comment' => $comment, 'nestingLevel' => 0], key($comment->id))
                @endforeach
            </div>

            {{-- Pagination --}}
            @if($comments->hasPages())
                <div class="mt-12">
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-purple-100/50 p-6">
                        <div class="flex items-center justify-center">
                            {{ $comments->links() }}
                        </div>
                    </div>
                </div>
            @endif
        @else
            <div class="text-center py-16">
                <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-purple-100/50 p-12">
                    <div class="w-24 h-24 bg-gradient-to-r from-gray-100 to-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <span class="text-gray-400 text-4xl">💭</span>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-2">No comments yet</h3>
                    <p class="text-gray-600 mb-6">Be the first to share your thoughts!</p>
                    @auth
                        <button onclick="document.querySelector('textarea').focus()" 
                                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-xl hover:from-purple-700 hover:to-pink-700 focus:outline-none focus:ring-4 focus:ring-purple-500/50 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                            <span class="mr-2">✨</span>
                            Start the conversation
                        </button>
                    @endauth
                </div>
            </div>
        @endif
    </div>
</section>
