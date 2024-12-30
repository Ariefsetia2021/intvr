<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Barang Keluar</title>
    <style>
        .form-group {
            margin-bottom: 1.5rem;
        }
        .barang-item {
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            padding: 1rem;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    @include('layout.header')
    @include('layout.navbar')
    @include('layout.sidebar')
    @include('layout.footer')

    <div class="container mt-5">
        <h1 class="text-center mb-4">Input Barang Keluar</h1>
        <form action="{{ route('barangkeluar') }}" method="POST" class="mt-4">
            @csrf

            <div class="form-group">
                <label for="nofaktur">Nomor Faktur:</label>
                <input type="text" id="nofaktur" name="nofaktur" class="form-control" value="{{ old('nofaktur') ?? session('nofaktur') }}" readonly>
            </div>

            <!-- Pilih Customer -->
            <div class="form-group">
                <label for="customer_id">Nama Customer:</label>
                <select id="customer_id" name="customer_id" class="form-control" required>
                    <option value="" selected disabled>Pilih Customer</option>
                    @foreach($customer as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->nmctmr }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Pilih Gudang -->
            <div class="form-group">
                <label for="gudang_id">Gudang:</label>
                <select id="gudang_id" name="gudang_id" class="form-control" required>
                    <option value="" selected disabled>Pilih Gudang</option>
                    @foreach($gudang as $gd)
                        <option value="{{ $gd->id }}">{{ $gd->nmgd }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Input Tanggal Keluar -->
            <div class="form-group">
                <label for="tanggal_keluar">Tanggal Keluar:</label>
                <input type="date" id="tanggal_keluar" name="tanggal_keluar" class="form-control" required>
            </div>

            <!-- Pilih Barang -->
            <div id="barang-container" class="form-group">
                <div class="barang-item row mb-3">
                    <div class="col-md-3">
                        <label for="barang_id">Barang:</label>
                        <select name="barang[0][id]" class="form-control barang-select" required>
                            <option value="" selected disabled>Pilih Barang</option>
                            @foreach($barang as $brg)
                                <option value="{{ $brg->id }}" data-harga="{{ $brg->harga }}">{{ $brg->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label>Jumlah:</label>
                        <input type="number" name="barang[0][jumlah]" class="form-control" placeholder="Jumlah" required>
                    </div>
                    <div class="col-md-3">
                        <label>Harga per Satuan:</label>
                        <input type="number" name="barang[0][harga]" class="form-control" placeholder="Harga per Satuan" step="0.01" readonly>
                    </div>
                    <div class="col-md-2">
                        <label>Info Harga:</label>
                        <input type="text" class="form-control info-harga" placeholder="Info Harga" readonly>
                    </div>
                    <div class="col-md-2">
                        <label>Keterangan</label>
                        <input type="text" name="barang[0][ket]" class="form-control" placeholder="Keterangan">
                    </div>
                </div>
            </div>

            <button type="button" id="tambah-barang" class="btn btn-primary mt-2">Tambah Barang</button>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>

    <script>
        let index = 1;

        // Fungsi untuk menambahkan event listener ke dropdown barang
        function attachEventListeners() {
            document.querySelectorAll('.barang-select').forEach(function (select) {
                if (!select.dataset.listenerAdded) {
                    select.addEventListener('change', function () {
                        const selectedOption = this.options[this.selectedIndex];
                        const harga = selectedOption.getAttribute('data-harga');

                        // Cari elemen info-harga di dalam row yang sama
                        const infoHargaInput = this.closest('.barang-item').querySelector('.info-harga');
                        const hargaInput = this.closest('.barang-item').querySelector('[name*="[harga]"]');

                        if (infoHargaInput) {
                            infoHargaInput.value = harga ? `Rp ${parseFloat(harga).toLocaleString()}` : '-';
                        }

                        // Set harga per satuan
                        if (hargaInput) {
                            hargaInput.value = harga ? parseFloat(harga).toFixed(2) : '';
                        }
                    });
                    // Tandai dropdown ini telah ditambahkan event listener
                    select.dataset.listenerAdded = true;
                }
            });
        }

        // Tambahkan baris barang baru
        document.getElementById('tambah-barang').addEventListener('click', function () {
            let container = document.getElementById('barang-container');
            let newItem = document.createElement('div');
            newItem.classList.add('barang-item', 'row', 'mb-3');
            newItem.innerHTML = `
                <div class="col-md-3">
                    <label for="barang_id">Barang</label>
                    <select name="barang[${index}][id]" class="form-control barang-select" required>
                        <option value="" selected disabled>Pilih Barang</option>
                        @foreach($barang as $brg)
                            <option value="{{ $brg->id }}" data-harga="{{ $brg->harga }}">{{ $brg->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label>Jumlah</label>
                    <input type="number" name="barang[${index}][jumlah]" class="form-control" placeholder="Jumlah" required>
                </div>
                <div class="col-md-3">
                    <label>Harga per Satuan</label>
                    <input type="number" name="barang[${index}][harga]" class="form-control" placeholder="Harga per Satuan" step="0.01" readonly>
                </div>
                <div class="col-md-2">
                    <label>Info Harga</label>
                    <input type="text" class="form-control info-harga" placeholder="Info Harga" readonly>
                </div>
                <div class="col-md-2">
                    <label>Keterangan</label>
                    <input type="text" name="barang[${index}][ket]" class="form-control" placeholder="Keterangan">
                </div>
            `;
            container.appendChild(newItem);

            // Tambahkan event listener ke dropdown baru
            attachEventListeners();
            index++;
        });

        // Jalankan fungsi attachEventListeners saat DOM selesai dimuat
        document.addEventListener('DOMContentLoaded', function () {
            attachEventListeners();
        });
    </script>

</body>
</html>
