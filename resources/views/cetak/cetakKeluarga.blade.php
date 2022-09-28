<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>
    <center>
        <h1>Data Keluarga</h1>
    </center>
    <table class="table-bordered" style="width: 100%">
        <thead>
            <tr class="fw-bolder">
                <td>No. KK</td>
                <td>Kepala Keluarga</td>
                <td>Dusun</td>
                <td>RT/RW</td>
                <td>Desa</td>
                <td>Kode Pos</td>
                <td>Kecamatan</td>
                <td>Kabupaten/Kota</td>
                <td>Provinsi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($keluargas as $keluarga)
            <tr>
                <td>{{ $keluarga->no_kk }}</td>
                <td>{{ $keluarga->kepala_keluarga }}</td>
                <td>{{ $keluarga->dusun }}</td>
                <td>{{ $keluarga->rt .'/' .$keluarga->rw }}</td>
                <td>{{ $keluarga->desa }}</td>
                <td>{{ $keluarga->kode_pos }}</td>
                <td>{{ $keluarga->kecamatan }}</td>
                <td>{{ $keluarga->kabupaten_kota }}</td>
                <td>{{ $keluarga->provinsi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="tanggal float-end me-5 mt-4">

        <table>
            <tr>
                <td style="text-align: center"> {{ date('l, d F Y'); }}</td>
            </tr>
            <tr>
                <td style="text-align: center"> {{ $qrcode }}</td>
            </tr>
            <tr style="text-align: center" class="fw-bold">
                <td>IMAM SYAHRONI</td>
            </tr>
        </table>

    </div>

    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        window.print();
  
        window.onafterprint = function() {
            history.go(-1);
        };
    </script>
</body>

</html>