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
                <h1 class="text-3xl font-bold text-gray-800">Upload Produk</h1>
                <div class="flex items-center space-x-4">
                    <button id="openUploadModal"
                        class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-plus mr-2"></i> Upload Produk Baru
                    </button>
                    <div class="flex items-center space-x-2">
                        <div
                            class="h-10 w-10 rounded-full bg-orange-500 flex items-center justify-center text-white font-bold">
                            AD</div>
                        <span class="font-medium">Admin</span>
                    </div>
                </div>
            </div>

            <!-- Upload Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-md p-6 hover-scale">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 font-medium">Total Produk</p>
                            <h3 class="text-3xl font-bold mt-2">{{ $totalProduk ?? 0 }}</h3>
                        </div>
                        <div class="p-3 rounded-lg bg-orange-100 text-orange-600">
                            <i class="fas fa-box-open text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-green-500">
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span>12 produk baru bulan ini</span>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 hover-scale">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 font-medium">Pakaian</p>
                            <h3 class="text-3xl font-bold mt-2">{{ $totalPakaian ?? 0 }}</h3>
                        </div>
                        <div class="p-3 rounded-lg bg-blue-100 text-blue-600">
                            <i class="fas fa-tshirt text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-gray-500">
                        <span>Terakhir diupdate: 2 hari lalu</span>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 hover-scale">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 font-medium">Tas</p>
                            <h3 class="text-3xl font-bold mt-2">{{ $totalTas ?? 0 }}</h3>
                        </div>
                        <div class="p-3 rounded-lg bg-green-100 text-green-600">
                            <i class="fas fa-shopping-bag text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-gray-500">
                        <span>Terakhir diupdate: 5 hari lalu</span>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 hover-scale">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 font-medium">Sepatu</p>
                            <h3 class="text-3xl font-bold mt-2">{{ $totalSepatu ?? 0 }}</h3>
                        </div>
                        <div class="p-4 rounded-lg bg-black bg-opacity-30 text-white">
                            <i class="fas fa-shoe-prints text-3xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-gray-500">
                        <span>Terakhir diupdate: 1 minggu lalu</span>
                    </div>
                </div>
            </div>

            <!-- Product Upload Table -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover-scale mb-8">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-gray-800">Daftar Produk</h3>
                        <div class="flex space-x-3">
                            <select
                                class="bg-gray-100 border-0 rounded-lg px-3 py-1 text-sm focus:ring-2 focus:ring-orange-500">
                                <option>Semua Kategori</option>
                                <option>Pakaian</option>
                                <option>Tas</option>
                                <option>Sepatu</option>
                            </select>
                            <input type="text" placeholder="Cari produk..."
                                class="pl-4 pr-4 py-1 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Gambar</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama Produk</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Kategori</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Harga</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Stok</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($products as $product)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="h-10 w-10 rounded-md bg-gray-200 overflow-hidden">
                                            @if($product->image)
                                                <img src="{{ asset('storage/products/' . $product->image) }}" alt="Produk" class="h-full w-full object-cover">
                                            @else
                                                <img src="https://via.placeholder.com/40" alt="Produk" class="h-full w-full object-cover">
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="px-2 py-1 bg-orange-100 text-orange-800 rounded-full text-xs">{{ $product->category }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->stock }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($product->status === 'active')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button type="button" class="text-orange-600 hover:text-orange-900 mr-3 btn-edit-produk" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-category="{{ $product->category }}" data-price="{{ $product->price }}" data-stock="{{ $product->stock }}" data-description="{{ $product->description }}" data-status="{{ $product->status }}" data-image="{{ $product->image }}"><i class="fas fa-edit"></i></button>
                                        <button class="text-red-600 hover:text-red-900"><i
                                                class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-gray-500">Belum ada produk.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="flex items-center justify-between mt-6">
                        <div class="text-sm text-gray-500">
                            Menampilkan 1 sampai 4 dari 156 produk
                        </div>
                        <div class="flex space-x-2">
                            <button
                                class="px-3 py-1 rounded-md border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="px-3 py-1 rounded-md bg-orange-500 text-white">1</button>
                            <button
                                class="px-3 py-1 rounded-md border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">2</button>
                            <button
                                class="px-3 py-1 rounded-md border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">3</button>
                            <button
                                class="px-3 py-1 rounded-md border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upload Modal -->
        <div id="uploadModal"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-xl shadow-xl w-full max-w-2xl">
                <div class="flex justify-between items-center border-b border-gray-200 p-6">
                    <h3 class="text-xl font-bold text-gray-800">Upload Produk Baru</h3>
                    <button id="closeUploadModal" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="p-6">
                    <form method="POST" action="{{ route('admin.upload.produk') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 mb-2">Nama Produk</label>
                                <input type="text" name="name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            </div>

                            <div>
                                <label class="block text-gray-700 mb-2">Kategori</label>
                                <select name="category"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                    <option value="">Pilih Kategori</option>
                                    <option value="Pakaian">Pakaian</option>
                                    <option value="Tas">Tas</option>
                                    <option value="Sepatu">Sepatu</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-gray-700 mb-2">Harga</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-3 text-gray-500">Rp</span>
                                    <input type="number" name="price"
                                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                </div>
                            </div>

                            <div>
                                <label class="block text-gray-700 mb-2">Stok</label>
                                <input type="number" name="stock"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-gray-700 mb-2">Deskripsi</label>
                                <textarea rows="3" name="description"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent"></textarea>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-gray-700 mb-2">Gambar Produk</label>
                                <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-gray-700 mb-2">Status</label>
                                <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                    <option value="active">Aktif</option>
                                    <option value="inactive">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-3 mt-8">
                            <button type="button" id="cancelUpload"
                                class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Batal</button>
                            <button type="submit"
                                class="px-6 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600">Simpan
                                Produk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Edit Produk -->
        <div id="editProdukModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-xl shadow-xl w-full max-w-2xl">
                <div class="flex justify-between items-center border-b border-gray-200 p-6">
                    <h3 class="text-xl font-bold text-gray-800">Edit Produk</h3>
                    <button id="closeEditProdukModal" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="p-6">
                    <form id="formEditProduk" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 mb-2">Nama Produk</label>
                                <input type="text" name="name" id="edit-name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">Kategori</label>
                                <select name="category" id="edit-category" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                    <option value="Pakaian">Pakaian</option>
                                    <option value="Tas">Tas</option>
                                    <option value="Sepatu">Sepatu</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">Harga</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-3 text-gray-500">Rp</span>
                                    <input type="number" name="price" id="edit-price" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                </div>
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">Stok</label>
                                <input type="number" name="stock" id="edit-stock" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-gray-700 mb-2">Deskripsi</label>
                                <textarea rows="3" name="description" id="edit-description" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent"></textarea>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-gray-700 mb-2">Gambar Produk (kosongkan jika tidak ingin mengubah)</label>
                                <input type="file" name="image" id="edit-image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                <div class="mt-2"><img id="edit-preview-image" src="" alt="Preview" class="h-16"></div>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-gray-700 mb-2">Status</label>
                                <select name="status" id="edit-status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                    <option value="active">Aktif</option>
                                    <option value="inactive">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex justify-end space-x-3 mt-8">
                            <button type="button" id="cancelEditProduk" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Batal</button>
                            <button type="submit" class="px-6 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600">Update Produk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
          // Modal functionality
    const uploadModal = document.getElementById('uploadModal');
    const openModalBtn = document.getElementById('openUploadModal');
    const closeModalBtn = document.getElementById('closeUploadModal');
    const cancelUploadBtn = document.getElementById('cancelUpload');
    
    openModalBtn.addEventListener('click', () => {
        uploadModal.classList.remove('hidden');
    });
    
    closeModalBtn.addEventListener('click', () => {
        uploadModal.classList.add('hidden');
    });
    
    cancelUploadBtn.addEventListener('click', () => {
        uploadModal.classList.add('hidden');
    });
    
    // Close modal when clicking outside
    window.addEventListener('click', (e) => {
        if (e.target === uploadModal) {
            uploadModal.classList.add('hidden');
        }
    });

    // Modal Edit Produk
    const editProdukModal = document.getElementById('editProdukModal');
    const closeEditProdukModal = document.getElementById('closeEditProdukModal');
    const cancelEditProduk = document.getElementById('cancelEditProduk');
    const formEditProduk = document.getElementById('formEditProduk');
    let currentEditId = null;
    document.querySelectorAll('.btn-edit-produk').forEach(btn => {
        btn.addEventListener('click', function() {
            currentEditId = this.getAttribute('data-id');
            formEditProduk.action = '/adminjago/update-produk/' + currentEditId;
            document.getElementById('edit-name').value = this.getAttribute('data-name');
            document.getElementById('edit-category').value = this.getAttribute('data-category');
            document.getElementById('edit-price').value = this.getAttribute('data-price');
            document.getElementById('edit-stock').value = this.getAttribute('data-stock');
            document.getElementById('edit-description').value = this.getAttribute('data-description');
            document.getElementById('edit-status').value = this.getAttribute('data-status');
            const img = this.getAttribute('data-image');
            if(img) {
                document.getElementById('edit-preview-image').src = '/storage/products/' + img;
            } else {
                document.getElementById('edit-preview-image').src = 'https://via.placeholder.com/64';
            }
            editProdukModal.classList.remove('hidden');
        });
    });
    closeEditProdukModal.addEventListener('click', () => editProdukModal.classList.add('hidden'));
    cancelEditProduk.addEventListener('click', () => editProdukModal.classList.add('hidden'));
    window.addEventListener('click', (e) => {
        if (e.target === editProdukModal) {
            editProdukModal.classList.add('hidden');
        }
    });
    </script>
</body>

</html>
