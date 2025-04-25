<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Name Field -->
        <div>
            <label for="name" class="block text-sm font-semibold text-gray-700 mb-3">
                <span class="flex items-center">
                    <span class="mr-2">👤</span>
                    Full Name
                </span>
            </label>
            <input type="text"
                id="name"
                name="name"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
                class="w-full px-4 py-3 border-2 border-purple-100 rounded-xl focus:ring-4 focus:ring-purple-500/20 focus:border-purple-500 transition-all duration-300 text-gray-800">
            @if($errors->get('name'))
                <div class="mt-2 flex items-center text-red-600">
                    <span class="mr-2">⚠️</span>
                    <span class="text-sm">{{ $errors->first('name') }}</span>
                </div>
            @endif
        </div>

        <!-- Email Field -->
        <div>
            <label for="email" class="block text-sm font-semibold text-gray-700 mb-3">
                <span class="flex items-center">
                    <span class="mr-2">📧</span>
                    Email Address
                </span>
            </label>
            <input type="email"
                id="email"
                name="email"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
                class="w-full px-4 py-3 border-2 border-purple-100 rounded-xl focus:ring-4 focus:ring-purple-500/20 focus:border-purple-500 transition-all duration-300 text-gray-800">
            @if($errors->get('email'))
                <div class="mt-2 flex items-center text-red-600">
                    <span class="mr-2">⚠️</span>
                    <span class="text-sm">{{ $errors->first('email') }}</span>
                </div>
            @endif

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 p-4 bg-yellow-50 border border-yellow-200 rounded-xl">
                    <div class="flex items-center">
                        <span class="text-yellow-600 mr-2">⚠️</span>
                        <div>
                            <p class="text-sm text-yellow-800 font-medium">
                                Your email address is unverified.
                            </p>
                            <button form="send-verification" 
                                    class="mt-2 text-sm text-yellow-700 hover:text-yellow-900 underline font-medium">
                                Click here to re-send the verification email.
                            </button>
                        </div>
                    </div>

                    @if (session('status') === 'verification-link-sent')
                        <div class="mt-3 p-3 bg-green-50 border border-green-200 rounded-lg">
                            <p class="text-sm text-green-800 flex items-center">
                                <span class="mr-2">✅</span>
                                A new verification link has been sent to your email address.
                            </p>
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <!-- Account Info -->
        <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-4 border border-purple-100">
            <h4 class="font-semibold text-gray-800 mb-2 flex items-center">
                <span class="mr-2">ℹ️</span>
                Account Information
            </h4>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-gray-600">
                <div class="flex items-center">
                    <span class="mr-2">📅</span>
                    <span>Joined {{ $user->created_at->format('M d, Y') }}</span>
                </div>
                <div class="flex items-center">
                    <span class="mr-2">⏱️</span>
                    <span>{{ $user->created_at->diffForHumans() }}</span>
                </div>
                <div class="flex items-center">
                    <span class="mr-2">📝</span>
                    <span>{{ \App\Models\Article::where('user_id', $user->id)->count() }} Articles</span>
                </div>
                <div class="flex items-center">
                    <span class="mr-2">🎬</span>
                    <span>{{ \App\Models\Episode::where('user_id', $user->id)->count() }} Episodes</span>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center gap-4 pt-4">
            <button type="submit"
                    class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-xl hover:from-purple-700 hover:to-pink-700 focus:outline-none focus:ring-4 focus:ring-purple-500/50 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                <span class="mr-2">💾</span>
                Save Changes
            </button>

            @if (session('status') === 'profile-updated')
                <div class="flex items-center text-green-600 bg-green-50 px-4 py-2 rounded-xl border border-green-200"
                     x-data="{ show: true }"
                     x-show="show"
                     x-transition
                     x-init="setTimeout(() => show = false, 3000)">
                    <span class="mr-2">✅</span>
                    <span class="text-sm font-medium">Profile updated successfully!</span>
                </div>
            @endif
        </div>
    </form>
</section>
