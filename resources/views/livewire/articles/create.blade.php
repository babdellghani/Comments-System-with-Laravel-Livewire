<div class="fixed z-50 inset-0 overflow-y-auto ease-out duration-400" style="background-color: rgba(0, 0, 0, 0.8);">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        
        <!-- Background overlay -->
        <div class="fixed inset-0 transition-opacity" wire:click="closeModal()">
            <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
        </div>

        <!-- Center the modal -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <!-- Modal panel -->
        <div class="relative inline-block bg-white rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-8 py-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                            <span class="text-white text-xl">✨</span>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white" id="modal-headline">
                                {{ isset($article_id) ? 'Edit Article' : 'Create New Article' }}
                            </h3>
                            <p class="text-purple-100">Share your amazing story with the community</p>
                        </div>
                    </div>
                    <button wire:click="closeModal()" class="text-white/80 hover:text-white transition-colors p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Form Content -->
            <form wire:submit.prevent="store" class="bg-white">
                <div class="px-8 py-8 space-y-6">
                    
                    <!-- Title Field -->
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-3">
                            <span class="flex items-center">
                                <span class="mr-2">📝</span>
                                Article Title
                            </span>
                        </label>
                        <input type="text"
                            id="title"
                            wire:model="title"
                            placeholder="Enter an engaging title for your article..."
                            class="w-full px-4 py-4 border-2 border-purple-100 rounded-xl focus:ring-4 focus:ring-purple-500/20 focus:border-purple-500 transition-all duration-300 text-gray-800 placeholder-gray-400"
                            required>
                        @error('title')
                            <div class="mt-2 flex items-center text-red-600">
                                <span class="mr-2">⚠️</span>
                                <span class="text-sm">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <!-- Slug Field -->
                    <div>
                        <label for="slug" class="block text-sm font-semibold text-gray-700 mb-3">
                            <span class="flex items-center">
                                <span class="mr-2">🔗</span>
                                URL Slug
                            </span>
                        </label>
                        <div class="relative">
                            <input type="text"
                                id="slug"
                                wire:model="slug"
                                placeholder="url-friendly-slug"
                                class="w-full px-4 py-4 border-2 border-purple-100 rounded-xl focus:ring-4 focus:ring-purple-500/20 focus:border-purple-500 transition-all duration-300 text-gray-800 placeholder-gray-400">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                <span class="text-gray-400 text-sm">.html</span>
                            </div>
                        </div>
                        @error('slug')
                            <div class="mt-2 flex items-center text-red-600">
                                <span class="mr-2">⚠️</span>
                                <span class="text-sm">{{ $message }}</span>
                            </div>
                        @enderror
                        <p class="mt-2 text-sm text-gray-500">
                            This will be the URL for your article. Use lowercase letters, numbers, and hyphens only.
                        </p>
                    </div>

                    <!-- Content Preview (if editing) -->
                    @if(isset($article_id))
                        <div class="bg-purple-50 rounded-xl p-4">
                            <p class="text-sm text-purple-600 font-medium">
                                💡 You're editing an existing article. The content and comments will be preserved.
                            </p>
                        </div>
                    @endif
                </div>

                <!-- Modal Footer -->
                <div class="bg-gray-50 px-8 py-6 sm:flex sm:flex-row-reverse sm:space-x-reverse sm:space-x-4">
                    <button type="submit"
                        class="group relative w-full sm:w-auto inline-flex justify-center items-center px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-xl hover:from-purple-700 hover:to-pink-700 focus:outline-none focus:ring-4 focus:ring-purple-500/50 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                        <span class="flex items-center">
                            <span class="mr-2">{{ isset($article_id) ? '💾' : '✨' }}</span>
                            <span>{{ isset($article_id) ? 'Update Article' : 'Create Article' }}</span>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl blur opacity-25 group-hover:opacity-40 transition-opacity duration-300"></div>
                    </button>
                    
                    <button type="button"
                        wire:click="closeModal()"
                        class="mt-3 sm:mt-0 w-full sm:w-auto inline-flex justify-center items-center px-6 py-4 border-2 border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-4 focus:ring-gray-200 transition-all duration-300">
                        <span class="flex items-center">
                            <span class="mr-2">❌</span>
                            <span>Cancel</span>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
