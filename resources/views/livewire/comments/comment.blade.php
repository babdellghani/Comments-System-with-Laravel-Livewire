<div x-data="{
    isReplying: @entangle('isReplying'),
    isEditing: @entangle('isEditing'),
}"
    x-effect="if (isReplying) {
        $nextTick(() => $refs.replyInput.focus())
    }; 
    if (isEditing) {
        $nextTick(() => $refs.updateInput.focus())
    }">
    @php
        $currentNesting = $nestingLevel ?? 0;
        // Adjust spacing and padding based on nesting level
        $articleMargin = match(true) {
            $currentNesting <= 1 => 'my-6',
            $currentNesting <= 3 => 'my-4',
            default => 'my-3'
        };
        
        $articlePadding = match(true) {
            $currentNesting <= 2 => 'p-6',
            $currentNesting <= 4 => 'p-4',
            default => 'p-3'
        };
        
        // Adjust shadow and rounding for very deep nesting
        $articleStyling = $currentNesting >= 4 
            ? 'bg-white/70 rounded-xl shadow-md border border-gray-200/70' 
            : 'bg-white/80 rounded-2xl shadow-lg border border-gray-100/50';
    @endphp
    
    <article class="{{ $articleMargin }} {{ $articleStyling }} backdrop-blur-sm overflow-hidden hover:shadow-xl transition-all duration-300">
        <div class="{{ $articlePadding }}">
            {{-- Comment Header --}}
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center space-x-3">
                    <div class="relative">
                        <img class="w-10 h-10 rounded-full ring-2 ring-purple-100" 
                             src="{{ $comment->user->avatar() }}"
                             alt="{{ $comment->user->name }}">
                        <div class="absolute -top-1 -right-1 w-4 h-4 bg-green-400 rounded-full border-2 border-white"></div>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 capitalize">
                            {{ $comment->user->name }}
                        </p>
                        <div class="flex items-center text-sm text-gray-500 space-x-2">
                            <time pubdate datetime="{{ $comment->created_at }}">
                                {{ $comment->presenter()->relativeCreatedAt() }}
                            </time>
                            @if ($comment->updated_at > $comment->created_at)
                                <span>•</span>
                                <span class="text-blue-500 font-medium" title="Edited at {{ $comment->updated_at }}">
                                    ✏️ Edited
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Comment Body --}}
            <div x-show="!isEditing" x-transition class="mb-4">
                <p class="text-gray-700 leading-relaxed bg-gradient-to-r from-gray-50 to-blue-50 rounded-xl p-4 border-l-4 border-blue-200">
                    {{ $comment->body }}
                </p>
            </div>

            {{-- Edit Form --}}
            <form x-show="isEditing" x-transition wire:submit.prevent="updateComment" x-cloak class="mb-4">
                <div class="py-2 mb-4">
                    <label for="comment" class="sr-only">Your comment</label>
                    <textarea x-ref="updateInput" wire:model="updateForm.body" 
                        placeholder="Edit your comment..."
                        rows="4"
                        class="w-full px-4 py-3 border-2 border-purple-200 rounded-xl focus:ring-4 focus:ring-purple-500/20 focus:border-purple-500 transition-all duration-300 text-gray-800 placeholder-gray-500 bg-white resize-none
                        @error('updateForm.body') border-red-300 focus:border-red-500 focus:ring-red-500/20 @enderror"></textarea>
                    @error('updateForm.body')
                        <div class="mt-2 flex items-center text-red-600">
                            <span class="mr-2">⚠️</span>
                            <span class="text-sm">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="flex items-center space-x-3">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-xl hover:from-purple-700 hover:to-pink-700 focus:outline-none focus:ring-4 focus:ring-purple-500/50 transform hover:scale-105 transition-all duration-300 shadow-lg">
                        <span class="mr-2">💾</span>
                        Update
                    </button>

                    <button @click="isEditing=false" type="button"
                        class="inline-flex items-center px-4 py-2 border-2 border-gray-300 text-gray-700 bg-white hover:bg-gray-50 rounded-xl focus:outline-none focus:ring-4 focus:ring-gray-200 transition-all duration-300">
                        <span class="mr-2">❌</span>
                        Cancel
                    </button>
                </div>
            </form>

            {{-- Action Buttons --}}
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                        <button type="button" @click="isReplying=!isReplying"
                            class="inline-flex items-center px-3 py-2 text-sm text-gray-600 hover:text-purple-600 hover:bg-purple-50 rounded-lg transition-all duration-300">
                            <svg class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                            Reply
                        </button>

                    @can('update', $comment)
                        <button type="button" @click="isEditing=!isEditing"
                            class="inline-flex items-center px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-300">
                            <svg class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                </path>
                            </svg>
                            Edit
                        </button>
                    @endcan

                    @can('delete', $comment)
                        <button wire:confirm="Are you sure you want to delete this comment?"
                            wire:click="$dispatch('deleteComment', { 'comment': {{ $comment->id }} })" type="button"
                            class="inline-flex items-center px-3 py-2 text-sm text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all duration-300">
                            <svg class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                            Delete
                        </button>
                    @endcan
                </div>

                {{-- Like Button --}}
                <button type="button" wire:click="likeComment({{ $comment->id }})"
                    class="inline-flex items-center px-3 py-2 text-sm @auth @if($comment->presenter()->likedBy(auth()->user())) text-red-600 bg-red-50 @else text-gray-600 hover:text-red-600 hover:bg-red-50 @endif @endauth @guest text-gray-600 hover:text-red-600 hover:bg-red-50 @endguest rounded-lg transition-all duration-300">
                    @auth
                        @if ($comment->presenter()->likedBy(auth()->user()))
                            <svg class="mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        @else
                            <svg class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                        @endif
                    @endauth
                    @guest
                        <svg class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                    @endguest
                    <span class="font-medium">{{ $comment->likes->count() }}</span>
                </button>
            </div>
        </div>
    </article>

    {{-- Reply Form --}}
    @php
        $currentNesting = $nestingLevel ?? 0;
        // Adjust reply form styling based on nesting level
        $replyFormMargin = match(true) {
            $currentNesting == 0 => 'ml-4 sm:ml-6',
            $currentNesting <= 2 => 'ml-3 sm:ml-4',
            default => 'ml-2 sm:ml-3'
        };
        
        // Make reply form more compact for deeper nesting
        $replyFormPadding = $currentNesting >= 3 ? 'p-4' : 'p-6';
        $replyFormSpacing = $currentNesting >= 3 ? 'space-y-3' : 'space-y-4';
    @endphp
    
    <div class="mt-4 sm:mt-6 {{ $replyFormMargin }}" x-show="isReplying" x-transition x-cloak>
        <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-2xl {{ $replyFormPadding }} border border-purple-100 shadow-lg">
            @auth
                <form wire:submit="storeReply" class="{{ $replyFormSpacing }}">
                    @if($currentNesting < 3)
                        <div class="flex items-center space-x-3 mb-4">
                            <img class="w-8 h-8 rounded-full ring-2 ring-purple-200" 
                                 src="{{ Auth::user()->avatar() }}"
                                 alt="{{ Auth::user()->name }}">
                            <span class="font-semibold text-gray-800">Reply as {{ Auth::user()->name }}</span>
                        </div>
                    @else
                        <div class="text-sm text-gray-600 mb-3">
                            <span class="font-medium">{{ Auth::user()->name }}</span> • replying
                        </div>
                    @endif
                    
                    <div>
                        <label for="reply" class="sr-only">Your reply</label>
                        <textarea x-ref="replyInput" wire:model="replyForm.body" 
                            placeholder="Write your reply..."
                            rows="{{ $currentNesting >= 3 ? '2' : '3' }}"
                            class="w-full px-4 py-3 border-2 border-purple-200 rounded-xl focus:ring-4 focus:ring-purple-500/20 focus:border-purple-500 transition-all duration-300 text-gray-800 placeholder-gray-500 bg-white resize-none
                            @error('replyForm.body') border-red-300 focus:border-red-500 focus:ring-red-500/20 @enderror"></textarea>
                        @error('replyForm.body')
                            <div class="mt-2 flex items-center text-red-600">
                                <span class="mr-2">⚠️</span>
                                <span class="text-sm">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="flex items-center space-x-3">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-xl hover:from-purple-700 hover:to-pink-700 focus:outline-none focus:ring-4 focus:ring-purple-500/50 transform hover:scale-105 transition-all duration-300 shadow-lg text-sm">
                            <span class="mr-2">💬</span>
                            Reply
                        </button>

                        <button @click="isReplying=false" type="button"
                            class="inline-flex items-center px-4 py-2 border-2 border-gray-300 text-gray-700 bg-white hover:bg-gray-50 rounded-xl focus:outline-none focus:ring-4 focus:ring-gray-200 transition-all duration-300 text-sm">
                            <span class="mr-2">❌</span>
                            Cancel
                        </button>
                    </div>
                </form>
            @else
                <div class="text-center {{ $currentNesting >= 3 ? 'py-4' : 'py-6' }}">
                    @if($currentNesting < 3)
                        <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <span class="text-purple-600 text-2xl">🔐</span>
                        </div>
                        <p class="text-gray-600 mb-4">You must be logged in to reply</p>
                    @else
                        <p class="text-gray-600 mb-3 text-sm">Login required to reply</p>
                    @endif
                    <a href="{{ route('login') }}" 
                       class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-xl hover:from-purple-700 hover:to-pink-700 focus:outline-none focus:ring-4 focus:ring-purple-500/50 transform hover:scale-105 transition-all duration-300 shadow-lg text-sm">
                        <span class="mr-2">🔑</span>
                        Sign In
                    </a>
                </div>
            @endauth
        </div>
    </div>

    {{-- Nested Replies --}}
    @if($comment->replies && $comment->replies->count() > 0)
        @php
            // Calculate nesting level
            $nestingLevel = $nestingLevel ?? 0;
            $nextLevel = $nestingLevel + 1;
            
            // Progressive margin reduction with responsive design
            $marginClass = match(true) {
                $nestingLevel == 0 => 'ml-4 sm:ml-6 md:ml-8',
                $nestingLevel == 1 => 'ml-3 sm:ml-4 md:ml-6', 
                $nestingLevel == 2 => 'ml-3 sm:ml-4',
                $nestingLevel == 3 => 'ml-2 sm:ml-3',
                default => ''
            };
            
            // Border width and color gets more subtle with deeper nesting
            $borderClass = match(true) {
                $nestingLevel <= 1 => 'border-l-4 border-purple-200',
                $nestingLevel == 2 => 'border-l-3 border-purple-150',
                $nestingLevel == 3 => 'border-l-2 border-gray-200',
                default => ''
            };
            
            // Padding gets smaller with deeper nesting
            $paddingClass = match(true) {
                $nestingLevel <= 1 => 'pl-4 sm:pl-6',
                $nestingLevel <= 3 => 'pl-3 sm:pl-4',
                default => ''
            };
            
            // Add subtle background for very deep threads
            $backgroundClass = $nestingLevel >= 4 ? 'bg-gray-25' : '';
        @endphp
        
        <div class="{{ $marginClass }} mt-4 sm:mt-6 space-y-3 sm:space-y-4 {{ $backgroundClass }}">
            {{-- Visual indicator for deep nesting --}}
            @if($nestingLevel >= 4)
                <div class="text-xs text-gray-500 italic pl-2 py-1 border-l-2 border-gray-200">
                    <span class="mr-1">💬</span>
                    Deep conversation thread
                </div>
            @endif
            
            <div class="{{ $borderClass }} {{ $paddingClass }}">
                @foreach ($comment->replies as $reply)
                    @livewire('comment', ['comment' => $reply, 'nestingLevel' => $nextLevel], key($reply->id))
                @endforeach
            </div>
        </div>
    @endif
</div>
