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
            <div class="bg-gradient-to-r from-indigo-600 to-cyan-600 px-8 py-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                            <span class="text-white text-xl">🎬</span>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white" id="modal-headline">
                                {{ isset($episode_id) ? 'Edit Episode' : 'Create New Episode' }}
                            </h3>
                            <p class="text-blue-100">Share your amazing video content with the community</p>
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
                                <span class="mr-2">🎬</span>
                                Episode Title
                            </span>
                        </label>
                        <input type="text"
                            id="title"
                            wire:model="title"
                            placeholder="Enter an engaging title for your episode..."
                            class="w-full px-4 py-4 border-2 border-blue-100 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 text-gray-800 placeholder-gray-400"
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
                                class="w-full px-4 py-4 border-2 border-blue-100 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 text-gray-800 placeholder-gray-400">
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
                            This will be the URL for your episode. Use lowercase letters, numbers, and hyphens only.
                        </p>
                    </div>

                    <!-- Video Upload Section (Placeholder) -->
                    <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl p-6 border border-blue-100">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                                <span class="text-white">📹</span>
                            </div>
                            <h4 class="font-semibold text-gray-800">Video Content</h4>
                        </div>
                        <p class="text-sm text-blue-700 mb-4">
                            📺 Video upload functionality can be added here. You can integrate with services like YouTube, Vimeo, or upload directly to your server.
                        </p>
                        <div class="grid grid-cols-2 gap-4 text-sm text-gray-600">
                            <div class="flex items-center">
                                <span class="mr-2">✅</span>
                                <span>HD Quality Support</span>
                            </div>
                            <div class="flex items-center">
                                <span class="mr-2">✅</span>
                                <span>Multiple Formats</span>
                            </div>
                            <div class="flex items-center">
                                <span class="mr-2">✅</span>
                                <span>Auto Thumbnails</span>
                            </div>
                            <div class="flex items-center">
                                <span class="mr-2">✅</span>
                                <span>Streaming Ready</span>
                            </div>
                        </div>
                    </div>

                    <!-- Content Preview (if editing) -->
                    @if(isset($episode_id))
                        <div class="bg-blue-50 rounded-xl p-4">
                            <p class="text-sm text-blue-600 font-medium">
                                💡 You're editing an existing episode. The video content and comments will be preserved.
                            </p>
                        </div>
                    @endif
                </div>

                <!-- Modal Footer -->
                <div class="bg-gray-50 px-8 py-6 sm:flex sm:flex-row-reverse sm:space-x-reverse sm:space-x-4">
                    <button type="submit"
                        class="group relative w-full sm:w-auto inline-flex justify-center items-center px-8 py-4 bg-gradient-to-r from-indigo-600 to-cyan-600 text-white font-semibold rounded-xl hover:from-indigo-700 hover:to-cyan-700 focus:outline-none focus:ring-4 focus:ring-blue-500/50 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                        <span class="flex items-center">
                            <span class="mr-2">{{ isset($episode_id) ? '💾' : '🎬' }}</span>
                            <span>{{ isset($episode_id) ? 'Update Episode' : 'Create Episode' }}</span>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-cyan-600 rounded-xl blur opacity-25 group-hover:opacity-40 transition-opacity duration-300"></div>
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
