@include('layout.header')
@include('layout.navbar')
@include('layout.sidebar')
@include('layout.footer')

<div class="container">
    <h1 class="text-center mb-4">BARANG MASUK</h1>
    <form action="{{ route('barangmasuk') }}" method="POST">
        @csrf
        <!-- Nama Barang -->
        <div class="form-group">
            <label for="brg_id">Nama Barang</label>
            <select class="form-control" id="brg_id" name="brg_id" required>
                <option value="">Pilih Barang</option>
                @foreach($barang as $brg)
                    <option value="{{ $brg->id }}">{{ $brg->nama }}</option>
                @endforeach
            </select>
        </div>



        <!-- Supplier -->
        <div class="form-group">
            <label for="sply_id">Supplier</label>
            <select class="form-control" id="sply_id" name="sply_id" required>
                <option value="">Pilih Supplier</option>
                @foreach($supplier as $sply)
                    <option value="{{ $sply->id }}">{{ $sply->nama }}</option>
                @endforeach
            </select>
        </div>

        <!-- Gudang Penyimpanan -->
        <div class="form-group">
            <label for="gudang_id">Gudang Penyimpanan</label>
            <select class="form-control" id="gudang_id" name="gudang_id" required>
                <option value="">Pilih Gudang</option>
                @foreach($gudang as $gdg)
                    <option value="{{ $gdg->id }}">{{ $gdg->nmgd }}</option>
                @endforeach
            </select>
        </div>

        <!-- Jumlah Barang Masuk -->
        <div class="form-group">
            <label for="jumlah">Jumlah Barang Masuk</label>

            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
        </div>

        <!-- Tanggal Masuk -->
        <div class="form-group">
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
