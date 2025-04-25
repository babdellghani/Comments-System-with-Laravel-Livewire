<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center text-white font-bold text-lg shadow-lg">
                ⚙️
            </div>
            <div>
                <h2 class="font-bold text-2xl text-dark leading-tight">
                    Profile Settings
                </h2>
                <p class="text-purple-700 text-sm">
                    Manage your account information and preferences
                </p>
            </div>
        </div>
    </x-slot>

    <!-- Profile Hero Section -->
    <div class="bg-gradient-to-r from-purple-600 via-pink-600 to-rose-600 py-16 relative overflow-hidden">
        <!-- Background decorations -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-48 h-48 bg-pink-300/20 rounded-full blur-2xl"></div>
        </div>
        
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 border border-white/20">
                    <div class="flex items-center justify-center mb-6">
                        <div class="w-24 h-24 bg-white/20 rounded-2xl flex items-center justify-center text-white font-bold text-4xl shadow-lg">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">
                        {{ Auth::user()->name }}
                    </h1>
                    <p class="text-xl text-purple-100 mb-6">
                        {{ Auth::user()->email }}
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-8 text-purple-100">
                        <div class="flex items-center space-x-2">
                            <span>📅</span>
                            <span>Member since {{ Auth::user()->created_at->format('M Y') }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span>🎯</span>
                            <span>{{ Auth::user()->created_at->diffInDays() }} days active</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Content -->
    <div class="py-12 bg-gradient-to-br from-slate-50 via-purple-50/30 to-pink-50/30 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Profile Information Section -->
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-purple-100/50 overflow-hidden">
                <div class="bg-gradient-to-r from-purple-50 to-pink-50 px-8 py-6 border-b border-purple-100/50">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                            <span class="text-white text-lg">👤</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Profile Information</h3>
                            <p class="text-gray-600 text-sm">Update your account's profile information and email address</p>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Password Update Section -->
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-blue-100/50 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-8 py-6 border-b border-blue-100/50">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-xl flex items-center justify-center">
                            <span class="text-white text-lg">🔒</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Update Password</h3>
                            <p class="text-gray-600 text-sm">Ensure your account is using a long, random password to stay secure</p>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Account Deletion Section -->
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-red-100/50 overflow-hidden">
                <div class="bg-gradient-to-r from-red-50 to-rose-50 px-8 py-6 border-b border-red-100/50">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-r from-red-500 to-rose-500 rounded-xl flex items-center justify-center">
                            <span class="text-white text-lg">⚠️</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Delete Account</h3>
                            <p class="text-gray-600 text-sm">Permanently delete your account and all associated data</p>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-emerald-100/50 p-8">
                <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                    <span class="mr-3">🚀</span>
                    Quick Actions
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="{{ route('dashboard') }}" 
                       class="flex items-center p-4 bg-gradient-to-r from-emerald-50 to-teal-50 rounded-xl hover:from-emerald-100 hover:to-teal-100 transition-all duration-300 border border-emerald-100">
                        <div class="w-10 h-10 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-lg flex items-center justify-center text-white mr-4">
                            📊
                        </div>
                        <div>
                            <div class="font-semibold text-gray-800">Dashboard</div>
                            <div class="text-sm text-gray-600">View your overview</div>
                        </div>
                    </a>
                    
                    <a href="{{ route('articles.index') }}" 
                       class="flex items-center p-4 bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl hover:from-purple-100 hover:to-pink-100 transition-all duration-300 border border-purple-100">
                        <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center text-white mr-4">
                            📝
                        </div>
                        <div>
                            <div class="font-semibold text-gray-800">Articles</div>
                            <div class="text-sm text-gray-600">Manage your content</div>
                        </div>
                    </a>
                    
                    <a href="{{ route('episodes.index') }}" 
                       class="flex items-center p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl hover:from-blue-100 hover:to-indigo-100 transition-all duration-300 border border-blue-100">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-lg flex items-center justify-center text-white mr-4">
                            🎬
                        </div>
                        <div>
                            <div class="font-semibold text-gray-800">Episodes</div>
                            <div class="text-sm text-gray-600">Manage your videos</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
