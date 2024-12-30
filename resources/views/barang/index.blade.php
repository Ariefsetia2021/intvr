<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Barang</title>

        <!-- Tambahkan file CSS yang diperlukan di sini -->
        <link rel="stylesheet" href="path/to/your/css/file.css" />
    </head>
    <body>
        @include('layout.header')
        @include('layout.navbar')
        @include('layout.sidebar')

        <h1 class="text-center mb-4">MASTER BARANG</h1>

        <div class="container">
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Harga /Pcs</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>
                                <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('barang.destroy', $item->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @include('layout.footer')

        <!-- Tambahkan file JavaScript yang diperlukan di sini -->
        <script src="path/to/your/js/file.js"></script>
    </body>
</html>
