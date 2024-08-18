<?php
Message::flash();
?>

<div class="container mx-auto p-4">
    <div class="overflow-x-auto">
        <table class="table-hover table" id="example">
            <thead>
                <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Kadaluarsa</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($barang as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['kode_barang']); ?></td>
                        <td><?= htmlspecialchars($row['nama']); ?></td>
                        <td>Rp. <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                        <td><?= htmlspecialchars($row['stok']); ?></td>
                        <td><?= $row['kadaluarsa'] ? htmlspecialchars($row['kadaluarsa']) : '-'; ?></td>
                        <td><img src="<?= BASEURL . '/public/images/barang/'. htmlspecialchars($row['gambar']); ?>" alt="<?= htmlspecialchars($row['nama']); ?>" style="width: 115px;"></td>
                        <td>
                            <a href="<?= BASEURL . "/barang/edit" . '/' . $row['id'] ?>"><button class="btn btn-solid-warning"><i class="fa-regular fa-pen-to-square"></i></button></a> 
                            <a href="/barang/delete"><button class="btn btn-solid-error"><i class="fa-regular fa-trash-can"></i></button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>