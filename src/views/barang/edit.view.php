<?php
$data = Message::getData();

if ($data) {
    $barang['kode_barang'] = $data['kode_barang'];
    $barang['nama'] = $data['nama_barang'];
    $barang['harga'] = $data['harga_barang'];
    $barang['stok'] = $data['stok_barang'];
    $barang['kadaluarsa'] = $data['kadaluarsa'];
    $barang['gambar'] = $data['gambar'];
    $barang['id'] = $data['id'];
}
?>

<section class="bg-gray-2 rounded-xl mt-[150px] md:mt-[100px]">
    <div class="p-8 shadow-lg max-w-5xl mx-auto">
        <?php if (Message::getData()): ?>
            <div class="mb-4">
                <?php Message::flash(); ?>
            </div>
        <?php endif; ?>
        <form class="space-y-4" action="<?= BASEURL . '/barang/edit_bar ang'; ?>"method="POST" id="form" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= htmlspecialchars($barang['id']) ?>">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label for="kode_barang">Kode Barang: </label>
                    <input class="input input-solid max-w-full mt-1" placeholder="Kode Barang" type="text" id="kode_barang" name="kode_barang" value="<?= htmlspecialchars($barang['kode_barang']) ?>" />
                </div>

                <div>
                    <label for="nama_barang">Nama Barang:</label>
                    <input class="input input-solid max-w-full mt-1" placeholder="Nama Barang" type="text" id="nama_barang" name="nama_barang" value="<?= htmlspecialchars($barang['nama']) ?>" />
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                <div>
                    <label for="harga_barang">Harga: </label>
                    <input class="input input-solid max-w-full mt-1" placeholder="Harga" type="number" id="harga_barang" name="harga_barang" value="<?= htmlspecialchars($barang['harga']) ?>" />
                </div>

                <div>
                    <label for="stok_barang">Stok: </label>
                    <input class="input input-solid max-w-full mt-1" placeholder="Stok" type="number" id="stok_barang" name="stok_barang" value="<?= htmlspecialchars($barang['stok']) ?>" />
                </div>

                <div>
                    <label for="kadaluarsa">Kadaluarsa: <label class="items-center ml-2">
                            <input type="checkbox" id="no-expiry" class="form-checkbox" />
                            <span class="ml-1">Tidak Kadaluarsa</span>
                        </label></label>
                    <input class="input input-solid max-w-full mt-1" type="date" id="kadaluarsa" name="kadaluarsa" value="<?= htmlspecialchars($barang['kadaluarsa']) ?>" />

                </div>
            </div>
            <div class="w-full mx-auto">
                <label for="gambar">Upload Gambar Barang: </label>
                <img src="<?= BASEURL . '/public/images/barang/' . $barang['gambar'] ?>" style="width: 115px;">
                <input type="file" class="input-file max-w-full flex mt-1" id="gambar" name="gambar" />
            </div>

            <div class="mt-4">
                <button type="submit" class="rounded-lg btn btn-block">Edit Barang</button>
            </div>
        </form>

    </div>
</section>