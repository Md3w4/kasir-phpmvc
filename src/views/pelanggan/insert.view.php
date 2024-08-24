<?php
$data = Message::getData();
$nama = '';
$noHp = '';
$email = '';

if ($data) {
    $nama = $data['nama'];
    $noHp = $data['no_hp'];
    $email = $data['email'];
}
?>

<section class="bg-gray-2 rounded-xl mt-[150px] md:mt-[100px]">
    <div class="p-8 shadow-lg max-w-5xl mx-auto">
        <?php if (Message::getData()): ?>
            <div class="mb-4">
                <?php Message::flash(); ?>
            </div>
        <?php endif; ?>
        <form class="space-y-4" action="<?= BASEURL . '/pelanggan/insert_pelanggan'; ?>" method="POST">
            <div class="w-full">
                <label for="nama">Nama Pelanggan: </label>
                <input class="input input-solid max-w-full mt-1" placeholder="Nama Pelanggan" type="text" id="nama" name="nama" value="<?= $nama ?>" />
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label for="no_hp">No Handphone: </label>
                    <input class="input input-solid max-w-full mt-1" placeholder="No Handphone" type="tel" id="no_hp" name="no_hp" value="<?= $noHp ?>" />
                </div>
                <div>
                    <label for="email">Email: </label>
                    <input class="input input-solid max-w-full mt-1" placeholder="Alamat Email" type="email" id="email" name="email" value="<?= $email ?>" />
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="rounded-lg btn btn-block">Tambah Pelanggan</button>
            </div>
        </form>

    </div>
</section>