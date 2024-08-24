<?php
Message::flash();
?>

<div class="container mx-auto p-4">
    <div class="overflow-x-auto">
        <table class="table-hover table" id="pelanggan">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No Handphone</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pelanggan as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']); ?></td>
                        <td><?= htmlspecialchars($row['nama']); ?></td>
                        <td><?= htmlspecialchars($row['no_hp']); ?></td>
                        <td><?= htmlspecialchars($row['email']); ?></td>
                        <td>
                            <a href="<?= BASEURL . "/pelanggan/edit" . '/' . $row['id'] ?>"><button class="btn btn-solid-warning"><i class="fa-regular fa-pen-to-square"></i></button></a>
                            <a href="<?= BASEURL . "/pelanggan/delete" . '/' . $row['id'] ?>"><button class="btn btn-solid-error"><i class="fa-regular fa-trash-can"></i></button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>