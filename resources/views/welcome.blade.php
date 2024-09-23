<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <h1 class="text-5xl font-bold">Welcome to Livewire Comments Management System!</h1>
                    @guest
                        <p class="text-sm text-center text-gray-500">
                            Please <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a> or
                            <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
                            to Add Articles, Episodes and Comment.
                        </p>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
