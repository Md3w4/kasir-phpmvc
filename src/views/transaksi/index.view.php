<div class="container mx-auto" x-data="transactionApp()">
        <div class="grid grid-cols-3 gap-6">
            <!-- Table Barang -->
            <div class="col-span-2">
                <h2 class="text-lg font-bold mb-4">Daftar Barang</h2>
                <table class="table-auto w-full bg-white rounded-lg shadow">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Kode Barang</th>
                            <th class="px-4 py-2">Nama Barang</th>
                            <th class="px-4 py-2">Harga</th>
                            <th class="px-4 py-2">Stok</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop Barang -->
                        <template x-for="barang in barangList" :key="barang.id">
                            <tr>
                                <td class="border px-4 py-2" x-text="barang.kode_barang"></td>
                                <td class="border px-4 py-2" x-text="barang.nama_barang"></td>
                                <td class="border px-4 py-2" x-text="barang.harga"></td>
                                <td class="border px-4 py-2" x-text="barang.stok"></td>
                                <td class="border px-4 py-2 text-center">
                                    <button @click="addToCart(barang)" class="bg-blue-500 text-white px-2 py-1 rounded">Add to Cart</button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>

            <!-- Keranjang -->
            <div>
                <h2 class="text-lg font-bold mb-4">Keranjang</h2>
                <div class="bg-white p-4 rounded-lg shadow">
                    <template x-if="cart.length > 0">
                        <div>
                            <table class="table-auto w-full">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2">Nama Barang</th>
                                        <th class="px-4 py-2">Kuantitas</th>
                                        <th class="px-4 py-2">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop Keranjang -->
                                    <template x-for="item in cart" :key="item.id">
                                        <tr>
                                            <td class="border px-4 py-2" x-text="item.nama_barang"></td>
                                            <td class="border px-4 py-2" x-text="item.quantity"></td>
                                            <td class="border px-4 py-2" x-text="formatCurrency(item.subtotal)"></td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                            <div class="mt-4">
                                <p class="font-bold">Total: <span x-text="formatCurrency(totalHarga)"></span></p>
                            </div>
                            <div class="mt-4">
                                <label class="block mb-2">Pelanggan</label>
                                <select x-model="selectedPelanggan" class="w-full p-2 border rounded">
                                    <template x-for="pelanggan in pelangganList" :key="pelanggan.id">
                                        <option :value="pelanggan.id" x-text="pelanggan.nama"></option>
                                    </template>
                                </select>
                            </div>
                            <div class="mt-4">
                                <label class="block mb-2">Uang Dibayar</label>
                                <input type="number" x-model="uangDibayar" @input="calculateChange" class="w-full p-2 border rounded">
                            </div>
                            <div class="mt-4">
                                <p class="font-bold">Kembalian: <span x-text="formatCurrency(uangKembalian)"></span></p>
                            </div>
                            <div class="mt-4">
                                <button @click="submitTransaction" class="w-full bg-green-500 text-white px-4 py-2 rounded">Submit Transaksi</button>
                            </div>
                        </div>
                    </template>
                    <template x-if="cart.length === 0">
                        <p class="text-center text-gray-500">Keranjang masih kosong.</p>
                    </template>
                </div>
            </div>
        </div>
    </div>