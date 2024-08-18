<!-- NAVBAR: START -->
<div class="navbar">
    <div class="navbar-start">
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a><?= $label1 ?></a></li>
                <li><a><?= $label2 ?></a></li>
                <li><?= $label3 ?></li>
            </ul>
        </div>
    </div>

    <div class="navbar-end flex items-center space-x-4">
        <?php if ($this->urlIs('/transaksi')) : ?>
            <input type="checkbox" id="drawer-right" class="drawer-toggle" />

            <label for="drawer-right" class="btn">Cart</label>
            <label class="overlay" for="drawer-right"></label>
            <div class="drawer drawer-right">
                <div class="drawer-content pt-10 flex flex-col h-full">
                    <label for="drawer-right" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
                    <div>
                        <h2 class="text-xl font-medium">Create your account</h2>
                        <input class="input py-1.5 my-3" placeholder="Type here..." />
                    </div>
                    <div class="h-full flex flex-row justify-end items-end gap-2">
                        <button class="btn btn-ghost">Cancel</button>
                        <a href="/transaksi/insert"><button class="btn btn-primary">Create</button></a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!-- Date and Time -->
        <span class="navbar-item">
            <span id="currentDateTime"></span>
        </span>
    </div>
</div>
<!-- NAVBAR: END -->