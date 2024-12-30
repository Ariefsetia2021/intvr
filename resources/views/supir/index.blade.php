<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>SUPIR</title>

        <!-- Tambahkan file CSS yang diperlukan di sini -->
        <link rel="stylesheet" href="path/to/your/css/file.css" />
    </head>
    <body>
        @include('layout.header')
        @include('layout.navbar')
        @include('layout.sidebar')

        <h1 class="text-center mb-4">MASTER SUPIR</h1>

        <div class="container">
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Supir</th>
                            <th scope="col">Nomor Telpon Supir</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($supir as $spr)
                        <tr>
                            <td>{{ $sls->id }}</td>
                            <td>{{ $sls->nama }}</td>
                            <td>{{ $sls->notlpn }}</td>
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

        <!-- Tambahkan file JavaScript yang diperlukan di sini -->
        <script src="path/to/your/js/file.js"></script>
    </body>
</html>

