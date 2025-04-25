<section class="space-y-6">
    <!-- Warning Section -->
    <div class="bg-gradient-to-r from-red-50 to-rose-50 rounded-xl p-6 border border-red-200">
        <div class="flex items-start space-x-3">
            <div class="flex-shrink-0">
                <span class="text-2xl">⚠️</span>
            </div>
            <div>
                <h4 class="font-semibold text-red-800 mb-2">Danger Zone</h4>
                <p class="text-sm text-red-700 leading-relaxed">
                    Once your account is deleted, all of its resources and data will be permanently deleted. 
                    Before deleting your account, please download any data or information that you wish to retain.
                </p>
            </div>
        </div>
    </div>

    <!-- Delete Button -->
    <div class="flex justify-center">
        <button x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-600 to-rose-600 text-white font-semibold rounded-xl hover:from-red-700 hover:to-rose-700 focus:outline-none focus:ring-4 focus:ring-red-500/50 transition-all duration-300 shadow-lg hover:shadow-xl">
            <span class="mr-2">🗑️</span>
            Delete Account
        </button>
    </div>

    <!-- Delete Confirmation Modal -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <div class="p-8">
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <!-- Modal Header -->
                <div class="text-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-r from-red-500 to-rose-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <span class="text-white text-2xl">⚠️</span>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">
                        Delete Your Account?
                    </h2>
                    <p class="text-gray-600">
                        This action cannot be undone
                    </p>
                </div>

                <!-- Warning Content -->
                <div class="bg-red-50 rounded-xl p-6 border border-red-200 mb-6">
                    <h3 class="font-semibold text-red-800 mb-3 flex items-center">
                        <span class="mr-2">💀</span>
                        What will be deleted:
                    </h3>
                    <div class="space-y-2 text-sm text-red-700">
                        <div class="flex items-center">
                            <span class="mr-2">•</span>
                            <span>Your profile and account information</span>
                        </div>
                        <div class="flex items-center">
                            <span class="mr-2">•</span>
                            <span>All your articles and episodes</span>
                        </div>
                        <div class="flex items-center">
                            <span class="mr-2">•</span>
                            <span>All your comments and interactions</span>
                        </div>
                        <div class="flex items-center">
                            <span class="mr-2">•</span>
                            <span>Access to your dashboard and content</span>
                        </div>
                    </div>
                </div>

                <!-- Password Confirmation -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-3">
                        <span class="flex items-center">
                            <span class="mr-2">🔒</span>
                            Confirm your password to proceed
                        </span>
                    </label>
                    <input type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        class="w-full px-4 py-3 border-2 border-red-200 rounded-xl focus:ring-4 focus:ring-red-500/20 focus:border-red-500 transition-all duration-300">
                    @if($errors->userDeletion->get('password'))
                        <div class="mt-2 flex items-center text-red-600">
                            <span class="mr-2">⚠️</span>
                            <span class="text-sm">{{ $errors->userDeletion->first('password') }}</span>
                        </div>
                    @endif
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 justify-end">
                    <button type="button"
                            x-on:click="$dispatch('close')"
                            class="px-6 py-3 border-2 border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-4 focus:ring-gray-200 transition-all duration-300">
                        <span class="flex items-center justify-center">
                            <span class="mr-2">❌</span>
                            Cancel
                        </span>
                    </button>
                    
                    <button type="submit"
                            class="px-6 py-3 bg-gradient-to-r from-red-600 to-rose-600 text-white font-semibold rounded-xl hover:from-red-700 hover:to-rose-700 focus:outline-none focus:ring-4 focus:ring-red-500/50 transition-all duration-300 shadow-lg hover:shadow-xl">
                        <span class="flex items-center justify-center">
                            <span class="mr-2">🗑️</span>
                            Delete Account
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </x-modal>
</section>
