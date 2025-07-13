<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Admin Panel</title>
    <style>
        .sidebar {
            transition: all 0.3s ease;
        }
        .sidebar-item {
            transition: all 0.2s ease;
        }
        .sidebar-item:hover {
            background-color: rgba(249, 115, 22, 0.1);
        }
        .sidebar-item.active {
            background-color: rgba(249, 115, 22, 0.2);
            border-left: 4px solid #f97316;
        }
        .sidebar-item.active .sidebar-icon {
            color: #f97316;
        }
        .content-area {
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        
        @include('partial.siderbars')
          <!-- Main Content -->
        <div class="content-area ml-64 flex-1 p-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Search..." class="pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="h-10 w-10 rounded-full bg-orange-500 flex items-center justify-center text-white font-bold">AD</div>
                        <span class="font-medium">Admin</span>
                    </div>
                </div>
            </div>
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-md p-6 hover-scale">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 font-medium">Total Produk</p>
                            <h3 class="text-3xl font-bold mt-2">156</h3>
                        </div>
                        <div class="p-3 rounded-lg bg-orange-100 text-orange-600">
                            <i class="fas fa-box-open text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-green-500">
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span>12% dari bulan lalu</span>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-md p-6 hover-scale">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 font-medium">Pesanan Hari Ini</p>
                            <h3 class="text-3xl font-bold mt-2">24</h3>
                        </div>
                        <div class="p-3 rounded-lg bg-blue-100 text-blue-600">
                            <i class="fas fa-shopping-cart text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-green-500">
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span>8% dari kemarin</span>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-md p-6 hover-scale">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 font-medium">Pendapatan</p>
                            <h3 class="text-3xl font-bold mt-2">Rp15.2jt</h3>
                        </div>
                        <div class="p-3 rounded-lg bg-green-100 text-green-600">
                            <i class="fas fa-wallet text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-red-500">
                        <i class="fas fa-arrow-down mr-1"></i>
                        <span>5% dari bulan lalu</span>
                    </div>
                </div>
                
                <div class="gradient-card text-white rounded-xl shadow-md p-6 hover-scale">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="font-medium">Pelanggan Baru</p>
                            <h3 class="text-3xl font-bold mt-2">18</h3>
                        </div>
                        <div class="p-3 rounded-lg bg-white bg-opacity-20">
                            <i class="fas fa-users text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-white text-opacity-80">
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span>10% dari minggu lalu</span>
                    </div>
                </div>
            </div>
            
            <!-- Charts Row -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Sales Chart -->
                <div class="bg-white rounded-xl shadow-md p-6 hover-scale">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-gray-800">Penjualan 7 Hari Terakhir</h3>
                        <select class="bg-gray-100 border-0 rounded-lg px-3 py-1 text-sm focus:ring-2 focus:ring-orange-500">
                            <option>Minggu Ini</option>
                            <option>Bulan Ini</option>
                            <option>Tahun Ini</option>
                        </select>
                    </div>
                    <div class="chart-container">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>
                
                <!-- Revenue Chart -->
                <div class="bg-white rounded-xl shadow-md p-6 hover-scale">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-gray-800">Pendapatan per Kategori</h3>
                        <select class="bg-gray-100 border-0 rounded-lg px-3 py-1 text-sm focus:ring-2 focus:ring-orange-500">
                            <option>Bulan Ini</option>
                            <option>Bulan Lalu</option>
                            <option>Tahun Ini</option>
                        </select>
                    </div>
                    <div class="chart-container">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
            </div>
            
            <!-- Recent Orders Table -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover-scale">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-gray-800">Pesanan Terbaru</h3>
                        <button class="text-orange-600 font-medium flex items-center">
                            Lihat Semua <i class="fas fa-chevron-right ml-1 text-sm"></i>
                        </button>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Pesanan</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pelanggan</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-2023-001</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Budi Santoso</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">12 Jun 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp 1.250.000</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button class="text-orange-600 hover:text-orange-900 mr-3"><i class="fas fa-eye"></i></button>
                                        <button class="text-blue-600 hover:text-blue-900"><i class="fas fa-print"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-2023-002</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Ani Wijaya</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">11 Jun 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Proses</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp 890.000</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button class="text-orange-600 hover:text-orange-900 mr-3"><i class="fas fa-eye"></i></button>
                                        <button class="text-blue-600 hover:text-blue-900"><i class="fas fa-print"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-2023-003</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Citra Dewi</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10 Jun 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Dikirim</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp 2.150.000</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button class="text-orange-600 hover:text-orange-900 mr-3"><i class="fas fa-eye"></i></button>
                                        <button class="text-blue-600 hover:text-blue-900"><i class="fas fa-print"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-2023-004</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Doni Pratama</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">9 Jun 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Batal</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp 750.000</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button class="text-orange-600 hover:text-orange-900 mr-3"><i class="fas fa-eye"></i></button>
                                        <button class="text-blue-600 hover:text-blue-900"><i class="fas fa-print"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
        // Initialize Charts
        document.addEventListener('DOMContentLoaded', function() {
            // Sales Chart
            const salesCtx = document.getElementById('salesChart').getContext('2d');
            const salesChart = new Chart(salesCtx, {
                type: 'line',
                data: {
                    labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                    datasets: [{
                        label: 'Penjualan',
                        data: [12, 19, 8, 15, 22, 18, 25],
                        backgroundColor: 'rgba(249, 115, 22, 0.1)',
                        borderColor: 'rgba(249, 115, 22, 1)',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#fff',
                        pointBorderColor: 'rgba(249, 115, 22, 1)',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
            
            // Revenue Chart
            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            const revenueChart = new Chart(revenueCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Pakaian', 'Aksesoris', 'Sepatu', 'Tas'],
                    datasets: [{
                        data: [45, 25, 20, 10],
                        backgroundColor: [
                            'rgba(249, 115, 22, 0.8)',
                            'rgba(59, 130, 246, 0.8)',
                            'rgba(16, 185, 129, 0.8)',
                            'rgba(139, 92, 246, 0.8)'
                        ],
                        borderColor: [
                            'rgba(249, 115, 22, 1)',
                            'rgba(59, 130, 246, 1)',
                            'rgba(16, 185, 129, 1)',
                            'rgba(139, 92, 246, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return `${context.label}: ${context.raw}%`;
                                }
                            }
                        }
                    },
                    cutout: '70%'
                }
            });
        });
    </script>
</body>
</html>