<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stok Barang</title>
</head>
<body>
    @include('layout.header')
    @include('layout.navbar')
    @include('layout.sidebar')

    <h1 class="text-center mb-4">MASTER PERSEDIAN BARANG</h1>

    <div class="container">
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Nama Gudang</th>
                                        <th scope="col">Jumlah Barang</th>
                                        <th scope="col">Waktu</th>
                                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stokData as $stok)
                        <tr>
                            <td>{{ $stok->id }}</td>
                            <td>{{ $stok->brg->nama }}</td> <!-- Nama Barang dari tabel brg -->
                            <td>{{ $stok->gudang ? $stok->gudang->nmgd : 'Gudang Tidak Ditemukan' }}</td>
                            <td>{{ $stok->jumlah }}</td>
                            <td>{{ $stok->created_at }}</td>
                            <td>
                                <a href="#" class="btn btn-primary">Edit</a>
                                <a href="#" class="btn btn-danger">Delete</a></td>
                        </tr>

                    @endforeach
                </tbody>
                </table>
                </div>
                </div>

                @include('layout.footer')

                <!-- Add any required JavaScript files here -->
                <script src="path/to/your/js/file.js"></script>


</body>
</html>


