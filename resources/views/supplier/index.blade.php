<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supplier</title>
</head>
<body>
    @include('layout.header')
    @include('layout.navbar')
    @include('layout.sidebar')

    <h1 class="text-center mb-4">MASTER SUPPLIER</h1>

    <div class="container">
        <div class="row">
            <table class="table table-striped">

                <thead>
                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama Supplier</th>
                                        <th scope="col">Alamat Supplier</th>
                                        <th scope="col">Nomor Supplier</th>
                                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($supplier as $supp)
                    <tr>
                        <td>{{ $supp->id }}</td>
                        <td>{{ $supp->nama }}</td>
                        <td>{{ $supp->alamat }}</td>
                        <td>{{ $supp->nomor }}</td>

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


