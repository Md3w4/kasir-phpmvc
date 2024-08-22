function updateDateTime() {
    const dateTimeElement = document.getElementById('currentDateTime');
    const now = new Date();
    const options = {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
    };
    const formattedDateTime = now.toLocaleDateString('en-US', options);
    dateTimeElement.textContent = formattedDateTime;
}

// Update the date and time on page load
updateDateTime();

// Update the date and time every second
setInterval(updateDateTime, 1000);

function transactionApp() {
    return {
        barangList: [], // Data barang dari database
        cart: [],
        pelangganList: [], // Data pelanggan dari database
        selectedPelanggan: null,
        uangDibayar: 0,
        uangKembalian: 0,
        totalHarga: 0,

        init() {
            // Ambil data barang dan pelanggan dari server (gunakan AJAX)
            fetch('/api/barang')
                .then(res => res.json())
                .then(data => this.barangList = data);

            fetch('/api/pelanggan')
                .then(res => res.json())
                .then(data => this.pelangganList = data);
        },

        addToCart(barang) {
            let existingItem = this.cart.find(item => item.id === barang.id);
            if (existingItem) {
                existingItem.quantity += 1;
                existingItem.subtotal = existingItem.quantity * barang.harga;
            } else {
                this.cart.push({
                    ...barang,
                    quantity: 1,
                    subtotal: barang.harga
                });
            }
            this.calculateTotal();
        },

        calculateTotal() {
            this.totalHarga = this.cart.reduce((sum, item) => sum + item.subtotal, 0);
        },

        calculateChange() {
            this.uangKembalian = this.uangDibayar - this.totalHarga;
        },

        formatCurrency(value) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(value);
        },

        submitTransaction() {
            if (this.cart.length === 0) {
                alert('Keranjang kosong, tambahkan barang terlebih dahulu.');
                return;
            }
            if (!this.selectedPelanggan) {
                alert('Pilih pelanggan terlebih dahulu.');
                return;
            }
            if (this.uangDibayar < this.totalHarga) {
                alert('Uang yang dibayar tidak cukup.');
                return;
            }

            const transactionData = {
                id_pelanggan: this.selectedPelanggan,
                id_pegawai: this.getLoggedInUserId(), // Ambil ID pegawai yang login
                total_harga: this.totalHarga,
                uang_dibayar: this.uangDibayar,
                uang_kembalian: this.uangKembalian,
                items: this.cart
            };

            fetch('/api/transaksi', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(transactionData)
            })
                .then(res => res.json())
                .then(response => {
                    if (response.success) {
                        alert('Transaksi berhasil disimpan!');
                        this.resetForm();
                    } else {
                        alert('Gagal menyimpan transaksi.');
                    }
                });
        },

        resetForm() {
            this.cart = [];
            this.selectedPelanggan = null;
            this.uangDibayar = 0;
            this.uangKembalian = 0;
            this.totalHarga = 0;
        },

        getLoggedInUserId() {
            // Fungsi untuk mendapatkan ID pegawai yang login
            return document.querySelector('meta[name="user-id"]').getAttribute('content');
        }
    }
}

