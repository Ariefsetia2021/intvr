<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gudang</title>
</head>
<body>
    @include('layout.header')
    @include('layout.navbar')
    @include('layout.sidebar')

    <h1 class="text-center mb-4">MASTER GUDANG</h1>

    <div class="container">
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                                        <th scope="col">ID </th>
                                        <th scope="col">Nama Gudang</th>
                                        <th scope="col">Alamat Gudang</th>
                                        <th scope="col">Kepada Gudang</th>
                                        <th scope="col">Nomor Kepala Gudang</th>
                                        <th scope="col">Admin Gudang</th>>
                                        <th scope="col">Nomor Admin Gudang</th>
                                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gudang as $gd)
                    <tr>
                        <td>{{ $gd->id }}</td>
                        <td>{{ $gd->nmgd }}</td>
                        <td>{{ $gd->almtgd }}</td>
                        <td>{{ $gd->kplgd }}</td>
                        <td>{{ $gd->nokplgd }}</td>
                        <td>{{ $gd->nmadmgd }}</td>
                        <td>{{ $gd->noadmgd }}</td>
                        <td>
                            <a href="#" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </td>
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


