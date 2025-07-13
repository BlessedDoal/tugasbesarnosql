<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Fashion Store</title>
    <style>
        /* Custom animation for menu items */
        .menu-item {
            position: relative;
            overflow: hidden;
        }

        .menu-item::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background-color: #f97316;
            transition: width 0.3s ease, left 0.3s ease;
        }

        .menu-item:hover::after,
        .menu-item.active::after {
            width: 100%;
            left: 0;
        }

        .menu-item:hover .menu-icon {
            transform: translateY(-3px);
            color: #f97316;
        }

        .menu-item.active .menu-icon {
            color: #f97316;
        }

        /* Section Hero Styles */
        /* Animation Keyframes */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(5deg);
            }

            100% {
                transform: translateY(0) rotate(0deg);
            }
        }

        @keyframes bounce-slow {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        /* Animation Classes */
        .animate-fadeIn {
            animation: fadeIn 0.8s ease-out forwards;
        }

        .animate-slideInDown {
            animation: slideInDown 0.8s ease-out forwards;
        }

        .animate-float {
            animation: float 8s ease-in-out infinite;
        }

        .animate-float-delay {
            animation: float 10s ease-in-out 2s infinite;
        }

        .animate-bounce-slow {
            animation: bounce-slow 3s infinite;
        }

        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        /* Efek Hover */
        .hover-zoom {
            transition: transform 0.3s ease;
        }

        .hover-zoom:hover {
            transform: scale(1.03);
        }

        /* Efek Shadow Khusus */
        .shadow-orange-500\/30 {
            box-shadow: 0 10px 15px -3px rgba(249, 115, 22, 0.3), 0 4px 6px -2px rgba(249, 115, 22, 0.1);
        }

        /* Active menu item styles */
        .menu-item.active {
            color: #ea580c;
            /* orange-600 */
        }

        .menu-item.active .menu-icon {
            stroke: #ea580c;
            /* orange-600 */
            transform: scale(1.1);
        }

        /* Mobile menu transition */
        .mobile-menu {
            transition: all 0.3s ease;
            max-height: 0;
            overflow: hidden;
        }

        .mobile-menu:not(.hidden) {
            max-height: 500px;
        }

        /* Search input transition */
        .mobile-search-container {
            transition: all 0.3s ease;
            max-height: 0;
            overflow: hidden;
        }

        .mobile-search-container:not(.hidden) {
            max-height: 100px;
        }
    </style>
</head>

<body class="bg-gray-50">
    @include('partial.nav-top')

    <!-- Hero Section -->
    <section id="home" class="relative overflow-hidden bg-gray-100">
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-black/30 z-10"></div>

        <!-- Background Image from Unsplash -->
        <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
            alt="Model fashion mengenakan koleksi terbaru"
            class="absolute inset-0 w-full h-full object-cover object-center" loading="eager">

        <!-- Decorative Elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
            <div
                class="absolute top-20 left-20 w-40 h-40 bg-orange-500 rounded-full mix-blend-overlay opacity-20 animate-float">
            </div>
            <div
                class="absolute bottom-10 right-20 w-60 h-60 bg-white rounded-full mix-blend-overlay opacity-10 animate-float-delay">
            </div>
            <div
                class="absolute top-1/2 right-1/4 w-32 h-32 bg-orange-300 rounded-full mix-blend-overlay opacity-15 animate-float">
            </div>
        </div>

        <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 lg:py-40">
            <div class="text-center md:text-left max-w-2xl md:max-w-3xl lg:max-w-4xl">
                <!-- Tagline dengan animasi -->
                <div class="animate-fadeIn">
                    <span
                        class="inline-block px-4 py-2 text-sm font-bold tracking-wider text-orange-600 uppercase bg-orange-100 rounded-full mb-4 shadow-md">
                        Koleksi Terbaru 2023
                    </span>
                </div>

                <!-- Judul Utama -->
                <h1
                    class="animate-slideInDown text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight text-white mb-6">
                    <span class="block">Temukan Gaya</span>
                    <span class="block text-orange-400 drop-shadow-lg">Khas Anda</span>
                </h1>

                <!-- Deskripsi -->
                <p class="animate-fadeIn delay-100 text-lg md:text-xl text-gray-200 mb-8 max-w-lg">
                    Tingkatkan penampilan Anda dengan koleksi premium pakaian, sepatu, dan aksesoris kami.
                    Fashion berkualitas untuk setiap kesempatan dengan harga terjangkau.
                </p>

                <!-- Tombol CTA -->
                <div
                    class="animate-fadeIn delay-200 flex flex-col sm:flex-row justify-center md:justify-start space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="#pakaian"
                        class="group inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-bold rounded-full text-white bg-orange-600 hover:bg-orange-700 md:py-4 md:text-lg md:px-10 transform transition-all hover:scale-105 duration-300 shadow-lg hover:shadow-orange-500/30">
                        Belanja Sekarang
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="ml-2 h-5 w-5 group-hover:translate-x-1 transition-transform" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>

                </div>
            </div>
        </div>

        <!-- Scrolling Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20 group">
            <a href="#featured"
                class="text-white hover:text-orange-300 transition-colors duration-300 animate-bounce-slow">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 group-hover:scale-110 transition-transform"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </a>
        </div>
    </section>

    <!-- Section Rekomendasi Terlaris -->
    @if(isset($produkRekomendasi) && count($produkRekomendasi))
    <section id="rekomendasi" class="py-16 sm:py-20 lg:py-24 bg-orange-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center animate-fadeIn mb-10">
                <span class="inline-block px-4 py-2 text-sm font-bold tracking-wider text-orange-600 uppercase bg-orange-100 rounded-full mb-4 shadow-md">
                    Rekomendasi
                </span>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-orange-700 mb-4">
                    Rekomendasi Terlaris
                </h2>
                <p class="max-w-2xl mx-auto text-lg text-orange-500">
                    Produk yang paling banyak dibeli oleh pelanggan kami
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($produkRekomendasi as $item)
                    <div class="group relative bg-white rounded-xl shadow-lg overflow-hidden flex flex-col animate-fadeIn delay-200 hover:-translate-y-2 hover:shadow-2xl transition-all">
                        <div class="w-full aspect-square bg-gray-200 flex items-center justify-center overflow-hidden">
                            <img src="{{ (isset($item->image) && is_string($item->image) && $item->image) ? asset('storage/products/' . $item->image) : 'https://via.placeholder.com/400x400' }}"
                                alt="{{ $item->name }}"
                                class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-105">
                        </div>
                        <div class="absolute top-4 right-4 z-10">
                            <span class="px-3 py-1 text-xs font-bold bg-orange-500 text-white rounded-full shadow-md">
                                {{ ucfirst($item->category) }}
                            </span>
                        </div>
                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $item->name }}</h3>
                                <div class="flex items-center mb-2">
                                    <div class="flex text-orange-400 text-base">★ ★ ★ ★ ★</div>
                                </div>
                            </div>
                            <div class="flex justify-between items-center mt-2 mb-4">
                                <span class="text-xl font-bold text-orange-600">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                            </div>
                            <button
                                class="add-to-cart-btn mt-auto w-full py-2 bg-gray-900 text-white rounded-lg font-medium flex items-center justify-center gap-2 hover:bg-orange-600 transition-colors"
                                data-id="{{ $item->id ?? $item->_id }}"
                                data-name="{{ $item->name }}"
                                data-price="{{ $item->price }}"
                                data-image="{{ (isset($item->image) && is_string($item->image) && $item->image) ? asset('storage/products/' . $item->image) : 'https://via.placeholder.com/400x400' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Tambahkan
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @else
    <section id="rekomendasi" class="py-16 sm:py-20 lg:py-24 bg-orange-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center animate-fadeIn mb-10">
                <span class="inline-block px-4 py-2 text-sm font-bold tracking-wider text-orange-600 uppercase bg-orange-100 rounded-full mb-4 shadow-md">
                    Rekomendasi
                </span>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-orange-700 mb-4">
                    Rekomendasi Terlaris
                </h2>
                <p class="max-w-2xl mx-auto text-lg text-orange-500">
                    Produk yang paling banyak dibeli oleh pelanggan kami
                </p>
            </div>
            <div class="text-center text-gray-400 py-12 text-lg">Belum ada produk rekomendasi.</div>
        </div>
    </section>
    @endif

    <!-- Section Pakaian -->
    <section id="pakaian" class="py-16 sm:py-24 lg:py-32 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section dengan Animasi -->
            <div class="text-center animate-fadeIn">
                <span
                    class="inline-block px-4 py-2 text-sm font-bold tracking-wider text-orange-600 uppercase bg-orange-100 rounded-full mb-4 shadow-md">
                    Koleksi Eksklusif
                </span>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-gray-900 mb-6">
                    <span class="block">Pakaian</span>
                    <span class="block text-orange-500">Trend Masa Kini</span>
                </h2>
                <p class="max-w-2xl mx-auto text-lg text-gray-500 mb-12">
                    Temukan gaya yang sempurna dengan koleksi pakaian premium kami. Desain terkini dengan kualitas
                    terbaik.
                </p>
            </div>

            <!-- Filter Kategori -->
            <div class="flex flex-wrap justify-center gap-3 mb-12 animate-fadeIn delay-100">
                <button class="px-6 py-2 rounded-full bg-orange-600 text-white font-medium transform transition-all hover:scale-105">
                    Semua
                </button>
                @php
                    $kategoriPakaian = $pakaian->pluck('sub_category')->unique()->filter();
                @endphp
                @foreach($kategoriPakaian as $kategori)
                    <button class="px-6 py-2 rounded-full bg-gray-100 text-gray-800 font-medium transform transition-all hover:scale-105 hover:bg-orange-100">
                        {{ $kategori }}
                    </button>
                @endforeach
            </div>

            <!-- Grid Produk -->
            <div id="produk-grid-pakaian" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @forelse($pakaian as $item)
                    <div
                        class="group relative bg-white rounded-xl shadow-lg overflow-hidden transform transition-all hover:-translate-y-2 hover:shadow-xl animate-fadeIn delay-200">
                        <div class="aspect-w-3 aspect-h-4 bg-gray-200 overflow-hidden">
                            <img src="{{ $item->image ? asset('storage/products/' . $item->image) : 'https://via.placeholder.com/300x400' }}"
                                alt="{{ $item->name }}"
                                class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 text-xs font-bold bg-orange-500 text-white rounded-full shadow-md">
                                {{ ucfirst($item->category) }}
                            </span>
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $item->name }}</h3>
                            <div class="flex items-center mb-2">
                                <div class="flex text-orange-400">
                                    ★ ★ ★ ★ ★
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-bold text-orange-600">Rp
                                    {{ number_format($item->price, 0, ',', '.') }}</span>
                            </div>
                            <button
                                class="add-to-cart-btn mt-4 w-full py-2 bg-gray-900 text-white rounded-lg font-medium flex items-center justify-center gap-2 hover:bg-orange-600 transition-colors"
                                data-id="{{ $item->id }}"
                                data-name="{{ $item->name }}"
                                data-price="{{ $item->price }}"
                                data-image="{{ $item->image ? asset('storage/products/' . $item->image) : 'https://via.placeholder.com/300x400' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Tambahkan
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-4 text-center text-gray-400">Belum ada produk pakaian.</div>
                @endforelse
            </div>

        </div>
    </section>

    <!-- Section Sepatu -->
    <section id="sepatu" class="py-16 sm:py-24 lg:py-32 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header dengan Desain Kreatif -->
            <div class="text-center mb-16 relative">
                <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-orange-500 rounded-full">
                </div>
                <h2 class="text-4xl sm:text-5xl font-extrabold text-gray-900 mb-4 relative">
                    <span class="relative inline-block">
                        <span class="absolute -inset-3 bg-orange-100 rounded-full opacity-75 -z-10 rotate-2"></span>
                        <span class="relative">Koleksi Sepatu</span>
                    </span>
                    <span
                        class="block mt-3 text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-pink-500">Premium
                        2023</span>
                </h2>
                <p class="max-w-2xl mx-auto text-lg text-gray-600">
                    Temukan gaya kaki sempurna dengan koleksi sepatu premium kami. Desain terkini dengan kenyamanan
                    maksimal.
                </p>
            </div>

            <!-- Grid Produk Sepatu -->
            <div id="produk-grid-sepatu" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @forelse($sepatu as $item)
                    <div
                        class="group relative bg-white rounded-2xl shadow-xl overflow-hidden transform transition-all hover:-translate-y-3 hover:shadow-2xl">
                        <div class="relative h-80 bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden">
                            <img src="{{ $item->image ? asset('storage/products/' . $item->image) : 'https://via.placeholder.com/300x400' }}"
                                alt="{{ $item->name }}"
                                class="absolute inset-0 w-full h-full object-contain object-center group-hover:scale-110 transition-transform duration-500 p-6">
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900">{{ $item->name }}</h3>
                                    <p class="text-sm text-gray-500">{{ $item->description }}</p>
                                </div>
                            </div>
                            <div class="mt-4 flex justify-between items-center">
                                <span class="text-xl font-extrabold text-gray-900">Rp
                                    {{ number_format($item->price, 0, ',', '.') }}</span>
                            </div>
                            <button
                                class="add-to-cart-btn mt-4 w-full py-2 bg-gray-900 text-white rounded-lg font-medium flex items-center justify-center gap-2 hover:bg-orange-600 transition-colors"
                                data-id="{{ $item->id }}"
                                data-name="{{ $item->name }}"
                                data-price="{{ $item->price }}"
                                data-image="{{ $item->image ? asset('storage/products/' . $item->image) : 'https://via.placeholder.com/300x400' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Tambahkan
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-4 text-center text-gray-400">Belum ada produk sepatu.</div>
                @endforelse
            </div>

        </div>
    </section>

    <!-- Section Tas -->
    <section id="tas" class="py-16 sm:py-24 lg:py-32 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header dengan Desain Unik -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center justify-center mb-6">
                    <span class="h-1 w-12 bg-orange-500 rounded-full mr-3"></span>
                    <span class="text-sm font-semibold tracking-wider text-orange-600 uppercase">Koleksi
                        Eksklusif</span>
                    <span class="h-1 w-12 bg-orange-500 rounded-full ml-3"></span>
                </div>
                <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4">
                    <span class="block">Tas & Aksesoris</span>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-amber-400">Premium
                        Collection</span>
                </h2>
                <p class="max-w-2xl mx-auto text-lg text-gray-600">
                    Lengkapi gaya harian Anda dengan koleksi tas premium kami. Desain elegan untuk segala kesempatan.
                </p>
            </div>


            <!-- Grid Produk Tas -->
            <div id="produk-grid-tas" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @forelse($tas as $item)
                    <div
                        class="group relative bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                        <div class="relative h-72 bg-gray-100 overflow-hidden">
                            <img src="{{ $item->image ? asset('storage/products/' . $item->image) : 'https://via.placeholder.com/300x400' }}"
                                alt="{{ $item->name }}"
                                class="w-full h-full object-contain object-center group-hover:scale-105 transition-transform duration-500 p-6">
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $item->name }}</h3>
                            <p class="text-sm text-gray-500 mb-3">{{ $item->description }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-bold text-orange-600">Rp
                                    {{ number_format($item->price, 0, ',', '.') }}</span>
                            </div>
                            <button
                                class="add-to-cart-btn mt-4 w-full py-2 bg-gray-900 text-white rounded-lg font-medium flex items-center justify-center gap-2 hover:bg-orange-600 transition-colors"
                                data-id="{{ $item->id }}"
                                data-name="{{ $item->name }}"
                                data-price="{{ $item->price }}"
                                data-image="{{ $item->image ? asset('storage/products/' . $item->image) : 'https://via.placeholder.com/300x400' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Tambahkan
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-4 text-center text-gray-400">Belum ada produk tas.</div>
                @endforelse
            </div>  
        </div>
    </section>

    @include('partial.auth')

    @include('partial.footers')

    <!-- Cart Offcanvas -->
    <div id="cart-overlay" class="fixed inset-0  bg-opacity-40 z-50 hidden"></div>
    <aside id="cart-offcanvas"
        class="fixed top-0 right-0 w-full max-w-md h-full bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 flex flex-col">
        <div class="flex items-center justify-between p-6 border-b">
            <h2 class="text-xl font-bold text-gray-900">Keranjang Belanja</h2>
            <button id="close-cart" class="text-gray-500 hover:text-orange-600 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div id="cart-items-container" class="flex-1 overflow-y-auto p-6"></div>
        <div class="p-6 border-t">
            <div class="flex justify-between items-center mb-4">
                <span class="text-lg font-semibold">Subtotal</span>
                <span id="cart-subtotal" class="text-xl font-bold text-orange-600">Rp 0</span>
            </div>
            <button id="continue-shopping"
                class="w-full py-3 bg-orange-600 text-white font-bold rounded-lg hover:bg-orange-700 transition-colors">Lanjut
                Belanja</button>
        </div>
    </aside>
    <!-- Modal Transaksi -->
    <div id="transaksi-modal" class="fixed inset-0 z-[100] flex items-center justify-center bg-black/40 hidden">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl p-8 grid grid-cols-1 md:grid-cols-2 gap-8 relative">
            <!-- Kiri: Detail Transaksi -->
            <div>
                <h2 class="text-2xl font-bold mb-4 text-orange-600">Detail Transaksi</h2>
                <div id="transaksi-items" class="space-y-3 max-h-72 overflow-y-auto pr-2"></div>
                <div class="mt-6 flex justify-between items-center border-t pt-4">
                    <span class="font-semibold text-lg">Subtotal</span>
                    <span id="transaksi-subtotal" class="text-xl font-bold text-orange-600">Rp 0</span>
                </div>
            </div>
            <!-- Kanan: Pembayaran -->
            <div>
                <h2 class="text-xl font-bold mb-4 text-gray-800">Pembayaran</h2>
                <form id="form-transaksi" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label class="block font-medium mb-1">Metode Pembayaran</label>
                        <select name="metode" id="metode-pembayaran" class="w-full border rounded-lg px-3 py-2 focus:ring-orange-500 focus:border-orange-500">
                            <option value="BRI">Transfer Bank BRI</option>
                            <option value="COD">Cash on Delivery (COD)</option>
                        </select>
                    </div>
                    <div id="rekening-info" class="mb-4">
                        <div class="bg-orange-50 border border-orange-200 rounded-lg p-3">
                            <div class="font-semibold text-orange-700">Transfer ke Rekening BRI</div>
                            <div class="text-sm text-gray-700">a.n. <b>PT Orange Fashion</b></div>
                            <div class="text-lg font-bold tracking-widest text-orange-600">1234 5678 9012 3456</div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium mb-1">Upload Bukti Pembayaran</label>
                        <input type="file" name="bukti" id="bukti-bayar" accept="image/*" class="block w-full border rounded-lg px-3 py-2" required>
                        <div id="preview-bukti" class="mt-2"></div>
                    </div>
                    <button type="submit" class="w-full py-3 bg-orange-600 text-white font-bold rounded-lg hover:bg-orange-700 transition-colors">Konfirmasi Pembayaran</button>
                </form>
            </div>
            <button id="close-transaksi-modal" class="absolute top-4 right-4 text-gray-400 hover:text-orange-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle
            const mobileMenuButton = document.querySelector('.mobile-menu-button');
            const mobileMenu = document.querySelector('.mobile-menu');

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }

            // Active menu item functionality
            const menuItems = document.querySelectorAll('.menu-item');
            const mobileMenuItems = document.querySelectorAll('.mobile-menu a');

            function setActiveMenuItem() {
                const sections = document.querySelectorAll('section');
                let currentSection = '';

                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.clientHeight;

                    if (window.scrollY >= (sectionTop - 100)) {
                        currentSection = section.id;
                    }
                });

                // Update desktop menu
                menuItems.forEach(item => {
                    item.classList.remove('active');
                    if (item.getAttribute('href') === `#${currentSection}`) {
                        item.classList.add('active');
                    }
                });

                // Update mobile menu
                mobileMenuItems.forEach(item => {
                    item.classList.remove('bg-orange-600', 'text-white');
                    item.classList.add('text-gray-700');

                    if (item.getAttribute('href') === `#${currentSection}`) {
                        item.classList.add('bg-orange-600', 'text-white');
                        item.classList.remove('text-gray-700');
                    }
                });
            }

            // Set active menu on scroll
            window.addEventListener('scroll', setActiveMenuItem);
            setActiveMenuItem(); // Initialize on load

            // Handle menu item clicks
            menuItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetSection = document.querySelector(targetId);

                    if (targetSection) {
                        window.scrollTo({
                            top: targetSection.offsetTop - 80,
                            behavior: 'smooth'
                        });

                        // Close mobile menu if open
                        if (!mobileMenu.classList.contains('hidden')) {
                            mobileMenu.classList.add('hidden');
                        }
                    }
                });
            });

            // Handle mobile menu item clicks
            mobileMenuItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    if (this.getAttribute('href').startsWith('#')) {
                        e.preventDefault();
                        const targetId = this.getAttribute('href');
                        const targetSection = document.querySelector(targetId);

                        if (targetSection) {
                            window.scrollTo({
                                top: targetSection.offsetTop - 80,
                                behavior: 'smooth'
                            });

                            // Close mobile menu
                            mobileMenu.classList.add('hidden');
                        }
                    }
                });
            });

            // Modal elements
            const authModal = document.getElementById('auth-modal');
            const authModalTrigger = document.getElementById('auth-modal-trigger');
            const closeAuthModal = document.getElementById('close-auth-modal');

            // Tab elements
            const loginTab = document.getElementById('login-tab');
            const registerTab = document.getElementById('register-tab');
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');

            // Open modal
            if (authModalTrigger) {
                authModalTrigger.addEventListener('click', function() {
                    authModal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                });
            }

            // Close modal
            if (closeAuthModal) {
                closeAuthModal.addEventListener('click', function() {
                    authModal.classList.add('hidden');
                    document.body.style.overflow = '';
                });
            }

            // Close modal when clicking outside
            authModal.addEventListener('click', function(e) {
                if (e.target === authModal) {
                    authModal.classList.add('hidden');
                    document.body.style.overflow = '';
                }
            });

            // Tab switching
            if (loginTab && registerTab) {
                loginTab.addEventListener('click', function() {
                    loginTab.classList.add('text-orange-600', 'border-orange-600');
                    loginTab.classList.remove('text-gray-500');
                    registerTab.classList.remove('text-orange-600', 'border-orange-600');
                    registerTab.classList.add('text-gray-500');
                    loginForm.classList.remove('hidden');
                    registerForm.classList.add('hidden');
                });

                registerTab.addEventListener('click', function() {
                    registerTab.classList.add('text-orange-600', 'border-orange-600');
                    registerTab.classList.remove('text-gray-500');
                    loginTab.classList.remove('text-orange-600', 'border-orange-600');
                    loginTab.classList.add('text-gray-500');
                    registerForm.classList.remove('hidden');
                    loginForm.classList.add('hidden');
                });
            }

            // Scroll to section if URL has hash on page load
            if (window.location.hash) {
                const targetSection = document.querySelector(window.location.hash);
                if (targetSection) {
                    setTimeout(function() {
                        window.scrollTo({
                            top: targetSection.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }, 200); // delay to ensure layout is ready
                }
            }
        });
    </script>
    <script>
    // --- Fungsi global ---
    function showToast(msg) {
        let toast = document.createElement('div');
        toast.innerText = msg;
        toast.style.position = 'fixed';
        toast.style.bottom = '30px';
        toast.style.left = '50%';
        toast.style.transform = 'translateX(-50%)';
        toast.style.background = '#ea580c';
        toast.style.color = '#fff';
        toast.style.padding = '12px 24px';
        toast.style.borderRadius = '8px';
        toast.style.zIndex = 9999;
        toast.style.boxShadow = '0 2px 8px rgba(0,0,0,0.15)';
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 2000);
    }

    function loadCartItems() {
        fetch('/keranjang/list')
            .then(res => res.json())
            .then(data => {
                const container = document.getElementById('cart-items-container');
                const subtotal = document.getElementById('cart-subtotal');
                const cartCount = document.getElementById('cart-count');
                let totalQty = 0;
                if (!data.items || data.items.length === 0) {
                    container.innerHTML = '<div class="text-gray-400 text-center">Keranjang kosong.</div>';
                    subtotal.innerText = 'Rp 0';
                    if (cartCount) cartCount.innerText = '0';
                    return;
                }
                let html = '';
                data.items.forEach(item => {
                    totalQty += item.quantity;
                    const imgSrc = item.image ? `/storage/products/${item.image}` : 'https://via.placeholder.com/60x60';
                    html += `<div class="flex items-center mb-4 group" data-id="${item.id}">
                        <img src="${imgSrc}" alt="${item.name}" class="w-14 h-14 object-cover rounded mr-4 border">
                        <div class="flex-1">
                            <div class="font-semibold text-gray-900">${item.name}</div>
                            <div class="text-sm text-gray-500">${item.category}</div>
                            <div class="flex items-center mt-1">
                                <button class="qty-btn px-2 py-1 bg-gray-200 rounded-l text-lg font-bold" data-action="decrease">-</button>
                                <span class="px-3">${item.quantity}</span>
                                <button class="qty-btn px-2 py-1 bg-gray-200 rounded-r text-lg font-bold" data-action="increase">+</button>
                            </div>
                        </div>
                        <div class="font-bold text-orange-600 ml-2 min-w-[80px]">Rp ${Number(item.price * item.quantity).toLocaleString('id-ID')}</div>
                        <button class="delete-cart-item ml-3 text-gray-400 hover:text-red-500" title="Hapus">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>`;
                });
                container.innerHTML = html;
                subtotal.innerText = 'Rp ' + Number(data.subtotal).toLocaleString('id-ID');
                if (cartCount) cartCount.innerText = totalQty;

                // Event hapus item
                container.querySelectorAll('.delete-cart-item').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const id = this.closest('.group').getAttribute('data-id');
                        fetch(`/keranjang/item/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                loadCartItems();
                                showToast('Item dihapus');
                            }
                        });
                    });
                });
                // Event tambah/kurang qty
                container.querySelectorAll('.qty-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const group = this.closest('.group');
                        const id = group.getAttribute('data-id');
                        const action = this.getAttribute('data-action');
                        let qty = parseInt(group.querySelector('span.px-3').innerText);
                        if (action === 'increase') qty++;
                        if (action === 'decrease' && qty > 1) qty--;
                        fetch(`/keranjang/item/${id}`, {
                            method: 'PATCH',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({ quantity: qty })
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                loadCartItems();
                            }
                        });
                    });
                });
            });
    }

    // --- Real-time Search Produk ---
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('.search-input');
        let searchTimeout;
        // Simpan produk asli dari setiap section
        const originalPakaian = Array.from(document.querySelectorAll('#produk-grid-pakaian > div'));
        const originalSepatu = Array.from(document.querySelectorAll('#produk-grid-sepatu > div'));
        const originalTas = Array.from(document.querySelectorAll('#produk-grid-tas > div'));
        let rekomSection = document.getElementById('rekomendasi');
        if (!rekomSection) rekomSection = document.querySelector('section#rekomendasi');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const query = this.value.trim();
                clearTimeout(searchTimeout);
                if (query.length === 0) {
                    // Reset ke semua produk
                    const gridPakaian = document.getElementById('produk-grid-pakaian');
                    const gridSepatu = document.getElementById('produk-grid-sepatu');
                    const gridTas = document.getElementById('produk-grid-tas');
                    gridPakaian.innerHTML = '';
                    gridSepatu.innerHTML = '';
                    gridTas.innerHTML = '';
                    originalPakaian.forEach(el => gridPakaian.appendChild(el));
                    originalSepatu.forEach(el => gridSepatu.appendChild(el));
                    originalTas.forEach(el => gridTas.appendChild(el));
                    // Sembunyikan pesan kosong jika ada
                    const kosongPakaian = gridPakaian.parentNode.querySelector('.text-gray-400');
                    const kosongSepatu = gridSepatu.parentNode.querySelector('.text-gray-400');
                    const kosongTas = gridTas.parentNode.querySelector('.text-gray-400');
                    if (kosongPakaian) kosongPakaian.style.display = '';
                    if (kosongSepatu) kosongSepatu.style.display = '';
                    if (kosongTas) kosongTas.style.display = '';
                    if (rekomSection && rekomSection.style) rekomSection.style.display = '';
                    return;
                }
                searchTimeout = setTimeout(() => {
                    fetch(`/produk/search?q=${encodeURIComponent(query)}`)
                        .then(res => res.json())
                        .then(data => {
                            // Filter dan render di setiap section
                            const gridPakaian = document.getElementById('produk-grid-pakaian');
                            const gridSepatu = document.getElementById('produk-grid-sepatu');
                            const gridTas = document.getElementById('produk-grid-tas');
                            gridPakaian.innerHTML = '';
                            gridSepatu.innerHTML = '';
                            gridTas.innerHTML = '';
                            let foundPakaian = 0, foundSepatu = 0, foundTas = 0;
                            data.forEach(item => {
                                const card = document.createElement('div');
                                card.className = "group relative bg-white rounded-xl shadow-lg overflow-hidden flex flex-col animate-fadeIn delay-200 hover:-translate-y-2 hover:shadow-2xl transition-all";
                                card.innerHTML = `
                                    <div class=\"w-full aspect-square bg-gray-200 flex items-center justify-center overflow-hidden\">
                                        <img src=\"${item.image ? '/storage/products/' + item.image : 'https://via.placeholder.com/400x400'}\" alt=\"${item.name}\" class=\"object-cover w-full h-full transition-transform duration-500 group-hover:scale-105\">
                                    </div>
                                    <div class=\"p-6 flex-1 flex flex-col justify-between\">
                                        <div>
                                            <h3 class=\"text-lg font-bold text-gray-900 mb-1\">${item.name}</h3>
                                        </div>
                                        <div class=\"flex justify-between items-center mt-2 mb-4\">
                                            <span class=\"text-xl font-bold text-orange-600\">Rp ${Number(item.price).toLocaleString('id-ID')}</span>
                                        </div>
                                        <button class=\"add-to-cart-btn mt-auto w-full py-2 bg-gray-900 text-white rounded-lg font-medium flex items-center justify-center gap-2 hover:bg-orange-600 transition-colors\"
                                            data-id=\"${item.id}\" data-name=\"${item.name}\" data-price=\"${item.price}\" data-image=\"${item.image ? '/storage/products/' + item.image : 'https://via.placeholder.com/400x400'}\">\n                                            <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z'/></svg>\n                                            Tambahkan\n                                        </button>\n                                    </div>\n                                `;
                                // Kategorikan
                                const kategori = (item.category || '').toLowerCase();
                                if (kategori === 'pakaian') {
                                    gridPakaian.appendChild(card); foundPakaian++;
                                } else if (kategori === 'sepatu') {
                                    gridSepatu.appendChild(card); foundSepatu++;
                                } else if (kategori === 'tas') {
                                    gridTas.appendChild(card); foundTas++;
                                }
                            });
                            // Tampilkan pesan kosong jika tidak ada hasil di section
                            const kosongPakaian = gridPakaian.parentNode.querySelector('.text-gray-400');
                            const kosongSepatu = gridSepatu.parentNode.querySelector('.text-gray-400');
                            const kosongTas = gridTas.parentNode.querySelector('.text-gray-400');
                            if (kosongPakaian) kosongPakaian.style.display = foundPakaian ? 'none' : '';
                            if (kosongSepatu) kosongSepatu.style.display = foundSepatu ? 'none' : '';
                            if (kosongTas) kosongTas.style.display = foundTas ? 'none' : '';
                            if (rekomSection && rekomSection.style) rekomSection.style.display = 'none';
                        });
                }, 250);
            });
        }
        // Tampilkan input pencarian saat icon search diklik
        const navSearchIcon = document.querySelector('.nav-search-icon');
        const mobileSearchContainer = document.getElementById('mobile-search-container');
        if (navSearchIcon && mobileSearchContainer && searchInput) {
            navSearchIcon.addEventListener('click', function(e) {
                e.preventDefault();
                mobileSearchContainer.classList.remove('hidden');
                searchInput.value = '';
                document.getElementById('hasil-pencarian').classList.add('hidden');
                setTimeout(() => searchInput.focus(), 100);
            });
            // Sembunyikan input jika klik di luar area pencarian
            document.addEventListener('mousedown', function(e) {
                if (!mobileSearchContainer.contains(e.target) && !navSearchIcon.contains(e.target)) {
                    mobileSearchContainer.classList.add('hidden');
                }
            });
        }
    });
    // --- Event handler ---
    document.addEventListener('DOMContentLoaded', function() {
        // Handle Tambahkan ke Keranjang
        document.body.addEventListener('click', function(e) {
            if (e.target.classList.contains('add-to-cart-btn')) {
                e.preventDefault();
                const btn = e.target;
                const productId = btn.getAttribute('data-id');
                const quantity = 1; // default 1, bisa diubah jika ada input jumlah
                fetch('/keranjang/add', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        product_id: productId,
                        quantity: quantity
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        showCartOffcanvas();
                        showToast('Berhasil ditambahkan ke keranjang!');
                        // TODO: Optionally update cart UI here
                    } else {
                        showToast(data.error || 'Gagal menambah ke keranjang');
                    }
                })
                .catch(() => showToast('Terjadi kesalahan.'));
            }
        });

        // Buka keranjang (offcanvas)
        function showCartOffcanvas() {
            document.getElementById('cart-overlay').classList.remove('hidden');
            document.getElementById('cart-offcanvas').classList.remove('translate-x-full');
            loadCartItems();
        }
        // Tutup keranjang
        function hideCartOffcanvas() {
            document.getElementById('cart-overlay').classList.add('hidden');
            document.getElementById('cart-offcanvas').classList.add('translate-x-full');
        }
        // Tombol close
        document.getElementById('close-cart').addEventListener('click', hideCartOffcanvas);
        document.getElementById('cart-overlay').addEventListener('click', hideCartOffcanvas);
        document.getElementById('continue-shopping').addEventListener('click', hideCartOffcanvas);

        // Toast notification
        // Tombol cart di navbar
        const cartBtn = document.getElementById('cart-button');
        if (cartBtn) {
            cartBtn.addEventListener('click', function(e) {
                e.preventDefault();
                showCartOffcanvas();
            });
        }
    });
    </script>
    <!-- MODAL TRANSAKSI -->
    <script>
        // MODAL TRANSAKSI
        const transaksiModal = document.getElementById('transaksi-modal');
        const closeTransaksiModal = document.getElementById('close-transaksi-modal');
        const lanjutBelanjaBtn = document.getElementById('continue-shopping');
        if (lanjutBelanjaBtn) {
            lanjutBelanjaBtn.addEventListener('click', function(e) {
                e.preventDefault();
                transaksiModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                // Load detail keranjang ke modal
                fetch('/keranjang/list')
                    .then(res => res.json())
                    .then(data => {
                        const items = data.items || [];
                        const container = document.getElementById('transaksi-items');
                        const subtotal = document.getElementById('transaksi-subtotal');
                        let html = '';
                        items.forEach(item => {
                            html += `<div class='flex items-center gap-3'>
                                <img src="${item.image ? '/storage/products/' + item.image : 'https://via.placeholder.com/40x40'}" class='w-10 h-10 object-cover rounded border'>
                                <div class='flex-1'>
                                    <div class='font-semibold text-gray-900'>${item.name}</div>
                                    <div class='text-xs text-gray-500'>${item.category}</div>
                                </div>
                                <div class='text-sm'>x${item.quantity}</div>
                                <div class='font-bold text-orange-600 min-w-[70px] text-right'>Rp ${Number(item.price * item.quantity).toLocaleString('id-ID')}</div>
                            </div>`;
                        });
                        container.innerHTML = html;
                        subtotal.innerText = 'Rp ' + Number(data.subtotal).toLocaleString('id-ID');
                    });
            });
        }
        if (closeTransaksiModal) {
            closeTransaksiModal.addEventListener('click', function() {
                transaksiModal.classList.add('hidden');
                document.body.style.overflow = '';
            });
        }
        // Hide modal on overlay click
        transaksiModal.addEventListener('click', function(e) {
            if (e.target === transaksiModal) {
                transaksiModal.classList.add('hidden');
                document.body.style.overflow = '';
            }
        });
        // Tampilkan/hidden info rekening jika metode pembayaran dipilih
        document.getElementById('metode-pembayaran').addEventListener('change', function() {
            document.getElementById('rekening-info').style.display = this.value === 'BRI' ? 'block' : 'none';
            document.getElementById('bukti-bayar').required = this.value === 'BRI';
        });
        // Preview bukti transfer
        document.getElementById('bukti-bayar').addEventListener('change', function(e) {
            const preview = document.getElementById('preview-bukti');
            preview.innerHTML = '';
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(ev) {
                    preview.innerHTML = `<img src="${ev.target.result}" alt="Preview Bukti" class="w-full max-h-48 object-contain rounded border">`;
                };
                reader.readAsDataURL(file);
            }
        });
        // Submit form transaksi
        document.getElementById('form-transaksi').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            fetch('/transaksi/checkout', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    showToast('Pembayaran berhasil! Terima kasih sudah berbelanja.');
                    transaksiModal.classList.add('hidden');
                    document.body.style.overflow = '';
                    resetCartCount();
                } else {
                    showToast(data.error || 'Gagal transaksi');
                }
            })
            .catch(() => showToast('Terjadi kesalahan.'));
        });
        // Setelah transaksi sukses, reset badge cart
        function resetCartCount() {
            const cartCount = document.getElementById('cart-count');
            if (cartCount) cartCount.innerText = '0';
        }
    </script>
    <!-- Inisialisasi badge cart saat load -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            loadCartItems();
        });
    </script>
</body>

</html>
