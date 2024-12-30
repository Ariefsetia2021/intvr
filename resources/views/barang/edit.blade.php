<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
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

    <h1 class="text-center mb-4">Edit Barang</h1>

    <div class="container">
        <form action="{{ route('barang.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama Barang:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $barang->nama) }}">
                @error('nama')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', $barang->harga) }}" min="0">
                @error('harga')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
