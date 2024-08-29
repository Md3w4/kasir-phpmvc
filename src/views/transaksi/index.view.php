<div class="container mx-auto p-4" x-data="cartApp()">
    <div class="grid grid-cols-3 gap-6">
        <div class="col-span-2">
            <table class="table-hover table" id="example">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Barang</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($barang as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['kode_barang']); ?></td>
                            <td>
                                <img src="<?= BASEURL . '/public/images/barang/' . htmlspecialchars($row['gambar']); ?>" style="width: 115px;">
                                <?= htmlspecialchars($row['nama']); ?>
                            </td>
                            <td>Rp. <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                            <td>
                                <button @click="addToCart({
                                    id: <?= $row['id']; ?>,
                                    nama_barang: '<?= htmlspecialchars($row['nama']); ?>',
                                    harga: <?= $row['harga']; ?>
                                })" class="btn btn-solid-success">
                                    <i class="fa-solid fa-cart-shopping"></i> Add To Cart
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

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
                                <template x-for="(item, index) in cart" :key="item.id">
                                    <tr>
                                        <td class="border px-4 py-2" x-text="item.nama_barang"></td>
                                        <td class="border px-4 py-2">
                                            <button @click="decreaseQuantity(index)">-</button>
                                            <span x-text="item.quantity"></span>
                                            <button @click="increaseQuantity(index)">+</button>
                                        </td>0
                                        <td class="border px-4 py-2" x-text="formatCurrency(item.harga * item.quantity)"></td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                        <div class="mt-4">
                            <p class="font-bold">Total: <span x-text="formatCurrency(totalPrice())"></span></p>
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