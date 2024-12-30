<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer</title>
</head>
<body>


    @include('layout.header')
    @include('layout.navbar')
    @include('layout.sidebar')

    <h1 class="text-center mb-4">MASTER COSTUMER</h1>

    <div class="container">
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama Customer</th>
                                        <th scope="col">Alamat Customer</th>
                                        <th scope="col">Nomor Customer</th>
                                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customer as $ctmr)
                        <tr>
                            <td>{{ $ctmr->idctmr }}</td>
                            <td>{{ $ctmr->nmctmr }}</td>
                            <td>{{ $ctmr->almtctmr }}</td>
                            <td>{{ $ctmr->noctmr }}</td>
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


