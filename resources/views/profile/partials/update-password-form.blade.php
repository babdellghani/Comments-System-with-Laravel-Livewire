<section>
    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div>
            <label for="update_password_current_password" class="block text-sm font-semibold text-gray-700 mb-3">
                <span class="flex items-center">
                    <span class="mr-2">🔒</span>
                    Current Password
                </span>
            </label>
            <input type="password"
                id="update_password_current_password"
                name="current_password"
                autocomplete="current-password"
                class="w-full px-4 py-3 border-2 border-blue-100 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 text-gray-800"
                placeholder="Enter your current password">
            @if($errors->updatePassword->get('current_password'))
                <div class="mt-2 flex items-center text-red-600">
                    <span class="mr-2">⚠️</span>
                    <span class="text-sm">{{ $errors->updatePassword->first('current_password') }}</span>
                </div>
            @endif
        </div>

        <!-- New Password -->
        <div>
            <label for="update_password_password" class="block text-sm font-semibold text-gray-700 mb-3">
                <span class="flex items-center">
                    <span class="mr-2">🔑</span>
                    New Password
                </span>
            </label>
            <input type="password"
                id="update_password_password"
                name="password"
                autocomplete="new-password"
                class="w-full px-4 py-3 border-2 border-blue-100 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 text-gray-800"
                placeholder="Enter your new password">
            @if($errors->updatePassword->get('password'))
                <div class="mt-2 flex items-center text-red-600">
                    <span class="mr-2">⚠️</span>
                    <span class="text-sm">{{ $errors->updatePassword->first('password') }}</span>
                </div>
            @endif
        </div>

        <!-- Confirm New Password -->
        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-semibold text-gray-700 mb-3">
                <span class="flex items-center">
                    <span class="mr-2">✅</span>
                    Confirm New Password
                </span>
            </label>
            <input type="password"
                id="update_password_password_confirmation"
                name="password_confirmation"
                autocomplete="new-password"
                class="w-full px-4 py-3 border-2 border-blue-100 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 text-gray-800"
                placeholder="Confirm your new password">
            @if($errors->updatePassword->get('password_confirmation'))
                <div class="mt-2 flex items-center text-red-600">
                    <span class="mr-2">⚠️</span>
                    <span class="text-sm">{{ $errors->updatePassword->first('password_confirmation') }}</span>
                </div>
            @endif
        </div>

        <!-- Password Requirements -->
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-4 border border-blue-100">
            <h4 class="font-semibold text-gray-800 mb-3 flex items-center">
                <span class="mr-2">🛡️</span>
                Password Requirements
            </h4>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm text-gray-600">
                <div class="flex items-center">
                    <span class="mr-2">✓</span>
                    <span>At least 8 characters long</span>
                </div>
                <div class="flex items-center">
                    <span class="mr-2">✓</span>
                    <span>Include uppercase letters</span>
                </div>
                <div class="flex items-center">
                    <span class="mr-2">✓</span>
                    <span>Include lowercase letters</span>
                </div>
                <div class="flex items-center">
                    <span class="mr-2">✓</span>
                    <span>Include numbers or symbols</span>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center gap-4 pt-4">
            <button type="submit"
                    class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-4 focus:ring-blue-500/50 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                <span class="mr-2">🔐</span>
                Update Password
            </button>

            @if (session('status') === 'password-updated')
                <div class="flex items-center text-green-600 bg-green-50 px-4 py-2 rounded-xl border border-green-200"
                     x-data="{ show: true }"
                     x-show="show"
                     x-transition
                     x-init="setTimeout(() => show = false, 3000)">
                    <span class="mr-2">✅</span>
                    <span class="text-sm font-medium">Password updated successfully!</span>
                </div>
            @endif
        </div>
    </form>
</section>
