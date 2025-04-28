<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ asset('assets/logo.png') }}" type="image/x-icon">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
        
        <!-- Additional Google Fonts for better typography -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
        
        <!-- Custom Styles -->
        <style>
            body {
                font-family: 'Inter', 'Figtree', sans-serif;
            }
            
            /* Custom scrollbar */
            ::-webkit-scrollbar {
                width: 8px;
            }
            
            ::-webkit-scrollbar-track {
                background: #f1f5f9;
            }
            
            ::-webkit-scrollbar-thumb {
                background: linear-gradient(to bottom, #8b5cf6, #ec4899);
                border-radius: 4px;
            }
            
            ::-webkit-scrollbar-thumb:hover {
                background: linear-gradient(to bottom, #7c3aed, #db2777);
            }
            
            /* Smooth transitions for all elements */
            * {
                transition: all 0.2s ease-in-out;
            }
            
            /* Beautiful animations */
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            @keyframes slideIn {
                from {
                    opacity: 0;
                    transform: translateX(-20px);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }
            
            .animate-fade-in-up {
                animation: fadeInUp 0.6s ease-out;
            }
            
            .animate-slide-in {
                animation: slideIn 0.5s ease-out;
            }
            
            /* Glass morphism effect */
            .glass {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }
            
            /* Gradient backgrounds */
            .bg-gradient-primary {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }
            
            .bg-gradient-secondary {
                background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            }
            
            .bg-gradient-main {
                background: linear-gradient(135deg, #4c1d95 0%, #7c2d92 25%, #be185d 75%, #dc2626 100%);
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-gradient-to-br from-slate-50 via-purple-50 to-pink-50 min-h-screen">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-gradient-to-r from-white/80 to-purple-50/80 backdrop-blur-sm shadow-lg border-b border-purple-100/50 animate-slide-in">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <div class="flex items-center space-x-4">
                            <div class="h-8 w-1 bg-gradient-to-b from-purple-600 to-pink-600 rounded-full"></div>
                            {{ $header }}
                        </div>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="animate-fade-in-up">
                {{ $slot }}
            </main>

            <!-- Footer -->
            <footer class="bg-gradient-to-r from-slate-900 via-purple-900 to-slate-900 text-white py-12">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid md:grid-cols-4 gap-8">
                        <!-- Brand Section -->
                        <div class="md:col-span-3">
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent mb-4">
                                Livewire Comments System
                            </h3>
                            <p class="text-gray-300 mb-4 leading-relaxed">
                                A powerful and beautiful platform for managing articles, episodes, and fostering meaningful discussions through our advanced commenting system.
                            </p>
                            <div class="flex space-x-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full flex items-center justify-center hover:scale-110 transition-transform cursor-pointer">
                                    <span class="text-white font-semibold">📱</span>
                                </div>
                                <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-cyan-600 rounded-full flex items-center justify-center hover:scale-110 transition-transform cursor-pointer">
                                    <span class="text-white font-semibold">🐦</span>
                                </div>
                                <div class="w-10 h-10 bg-gradient-to-r from-green-600 to-teal-600 rounded-full flex items-center justify-center hover:scale-110 transition-transform cursor-pointer">
                                    <span class="text-white font-semibold">💼</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Quick Links -->
                        <div>
                            <h4 class="text-lg font-semibold mb-4 text-purple-300">Quick Links</h4>
                            <ul class="space-y-2">
                                <li><a href="{{ route('welcome') }}" class="text-gray-300 hover:text-purple-400 transition-colors">Home</a></li>
                                <li><a href="{{ route('articles.index') }}" class="text-gray-300 hover:text-purple-400 transition-colors">Articles</a></li>
                                <li><a href="{{ route('episodes.index') }}" class="text-gray-300 hover:text-purple-400 transition-colors">Episodes</a></li>
                                @auth
                                    <li><a href="{{ route('dashboard') }}" class="text-gray-300 hover:text-purple-400 transition-colors">Dashboard</a></li>
                                @endauth
                            </ul>
                        </div>
                                                
                    </div>
                    
                    <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                        <p class="text-gray-400">
                            © {{ date('Y') }} Livewire Comments System. Made with ❤️ using Laravel & Livewire.
                        </p>
                    </div>
                </div>
            </footer>
        </div>

        @livewireScripts
        
        <!-- Enhanced JavaScript -->
        <script>
            // Add smooth scrolling
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
            
            // Add loading animation
            window.addEventListener('load', function() {
                document.body.classList.add('loaded');
            });
        </script>
    </body>
</html>
