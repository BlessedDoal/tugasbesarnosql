@php use Illuminate\Support\Facades\Auth; @endphp

<!-- Navigation Bar -->
<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="#" class="flex items-center space-x-2">
                    <!-- Logo Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-orange-600" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                            clip-rule="evenodd" />
                    </svg>
                    <!-- Logo Text -->
                    <span class="font-bold text-orange-600 text-xl md:text-2xl">OrangeFashion</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="/"
                    class="menu-item active flex flex-col items-center px-4 py-2 text-gray-700 font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="menu-icon h-5 w-5 mb-1 transition-all duration-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Home</span>
                </a>

                <a href="#pakaian" class="menu-item flex flex-col items-center px-4 py-2 text-gray-700 font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="menu-icon h-5 w-5 mb-1 transition-all duration-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span>Pakaian</span>
                </a>

                <a href="#sepatu" class="menu-item flex flex-col items-center px-4 py-2 text-gray-700 font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="menu-icon h-5 w-5 mb-1 transition-all duration-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Sepatu</span>
                </a>

                <a href="#tas" class="menu-item flex flex-col items-center px-4 py-2 text-gray-700 font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="menu-icon h-5 w-5 mb-1 transition-all duration-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span>Tas</span>
                </a>

                <!-- Icons -->
                <div class="flex items-center space-x-4 ml-4">
                    <a href="#"
                        class="nav-search-icon text-gray-500 hover:text-orange-600 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </a>
                    <button type="button" id="cart-button"
                        class="text-gray-500 hover:text-orange-600 relative transition-colors duration-300 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span id="cart-count"
                            class="absolute -top-2 -right-2 bg-orange-600 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center transform hover:scale-110 transition-transform">3</span>
                    </button>
                    @if (Auth::check())
                        <span class="ml-2 font-medium text-gray-700">{{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                class="ml-2 px-4 py-2 bg-orange-600 text-white font-medium rounded-md hover:bg-orange-700 transition duration-300 transform hover:scale-105">Logout</button>
                        </form>
                    @else
                        <button id="auth-modal-trigger"
                            class="ml-2 px-4 py-2 bg-orange-600 text-white font-medium rounded-md hover:bg-orange-700 transition duration-300 transform hover:scale-105">
                            Login
                        </button>
                    @endif
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button
                    class="mobile-menu-button text-gray-500 hover:text-orange-600 focus:outline-none transition-colors duration-300">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="hidden mobile-menu md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white shadow-lg">
            <a href="/"
                class="active-mobile-menu flex items-center px-3 py-2 rounded-md text-base font-medium text-white bg-orange-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Home
            </a>

            <a href="#pakaian"
                class="flex items-center px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-orange-500 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                Pakaian
            </a>

            <a href="#sepatu"
                class="flex items-center px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-orange-500 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Sepatu
            </a>

            <a href="#tas"
                class="flex items-center px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-orange-500 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                Tas
            </a>

            <div class="pt-4 border-t border-gray-200">
                <a href="#"
                    class="flex items-center px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-white hover:bg-orange-500 transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    Login
                </a>
            </div>
        </div>
    </div>
    <div id="mobile-search-container" class="hidden mobile-search-container px-2 py-3 bg-white absolute left-0 right-0 top-full shadow-lg border-b z-50">
        <div class="flex items-center">
            <input type="text" placeholder="Cari produk..."
                class="search-input flex-grow px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
        </div>
    </div>
</nav>
