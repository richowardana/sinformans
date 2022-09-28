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
        <h1>Data Penduduk</h1>
    </center>
    <table class="table-bordered" style="width: 100%">
        <thead>
            <tr class="fw-bolder">
                <td>NIK</td>
                <td>Nama</td>
                <td>Jenis Kelamin</td>
                <td>Tempat Lahir</td>
                <td>Tanggal Lahir</td>
                <td>Agama</td>
                <td>Pendidikan</td>
                <td>Pekerjaan</td>
                <td>Status</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($penduduks as $penduduk)
            <tr>
                <td>{{ $penduduk->nik }}</td>
                <td>{{ $penduduk->nama }}</td>
                <td>{{ $penduduk->jenis_kelamin }}</td>
                <td>{{ $penduduk->tempat_lahir }}</td>
                <td>{{ date('d F Y', strtotime($penduduk->tgl_lahir)) }}</td>
                <td>{{ $penduduk->agama }}</td>
                <td>{{ $penduduk->pendidikan }}</td>
                <td>{{ $penduduk->pekerjaan }}</td>
                <td>{{ $penduduk->status }}</td>
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