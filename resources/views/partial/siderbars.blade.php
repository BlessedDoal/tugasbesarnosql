<!-- Sidebar -->
<div class="sidebar w-64 bg-white shadow-lg fixed h-full">
    <div class="p-4 border-b border-gray-200">
        <h1 class="text-xl font-bold text-orange-500">Fashion Store</h1>
        <p class="text-xs text-gray-500">Admin Panel</p>
    </div>

    <nav class="mt-6">
        <div class="px-4">
            <p class="text-xs uppercase text-gray-500 font-semibold mb-4">Menu</p>

            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
                class="sidebar-item flex items-center py-3 px-4 rounded-lg mb-1 {{ request()->routeIs('admin.dashboard') ? 'active bg-blue-50 text-blue-600' : 'text-gray-700' }}">
                <i
                    class="sidebar-icon fas fa-tachometer-alt mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-blue-500' : 'text-gray-600' }}"></i>
                <span class="font-medium">Dashboard</span>
            </a>

            <!-- Upload Produk -->
            <a href="{{ route('admin.upload') }}"
                class="sidebar-item flex items-center py-3 px-4 rounded-lg mb-1 {{ request()->routeIs('admin.upload') ? 'active bg-blue-50 text-blue-600' : 'text-gray-700' }}">
                <i
                    class="sidebar-icon fas fa-upload mr-3 {{ request()->routeIs('admin.upload') ? 'text-blue-500' : 'text-gray-600' }}"></i>
                <span class="font-medium">Upload Produk</span>
            </a>
        </div>

        <div class="absolute bottom-0 w-full px-4 py-6 border-t border-gray-200">
            <!-- Logout -->
            <a href="{{ route('home') }}"
                class="sidebar-item flex items-center py-3 px-4 rounded-lg text-red-500 hover:bg-red-50">
                <i class="fas fa-sign-out-alt mr-3"></i>
                <span class="font-medium">Keluar</span>
            </a>
        </div>
    </nav>
</div>