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
        <h3 class="mb-0">Data Anggota Keluarga</h3>
        @foreach ($keluargas as $keluarga)

        <h5>{{ 'No. '.$keluarga->no_kk }}</h5>
        @endforeach
    </center>
    <hr>
    <div>
        <table style="width: 100%; font-size: 0.8em">
            <tr>
                <td style="width: 10em">Kepala Keluarga</td>
                <td>:</td>
                <td style="width: 20em">{{ $keluarga->kepala_keluarga }}</td>
                <td style="width: 35em"></td>
                <td style="width: 10em">Kode Pos</td>
                <td>:</td>
                <td>{{ $keluarga->kode_pos }}</td>
            </tr>
            <tr>
                <td>Dusun</td>
                <td>:</td>
                <td>{{ $keluarga->dusun }}</td>
                <td></td>
                <td>Kecamatan</td>
                <td>:</td>
                <td>{{ $keluarga->kecamatan }}</td>
            </tr>
            <tr>
                <td>RT/RW</td>
                <td>:</td>
                <td>{{ $keluarga->rt . '/' . $keluarga->rw }}</td>
                <td></td>
                <td>Kabupaten/Kota</td>
                <td>:</td>
                <td>{{ $keluarga->kabupaten_kota }}</td>
            </tr>
            <tr>
                <td>Desa</td>
                <td>:</td>
                <td>{{ $keluarga->desa }}</td>
                <td></td>
                <td>Provinsi</td>
                <td>:</td>
                <td>{{ $keluarga->provinsi }}</td>
            </tr>
        </table>
    </div>
    <div class="table-responsive">
        <table class="table-sm table-bordered" style="width: 100%; font-size: 0.8em">
            <tr>
                <th>Nama</th>
                <th>NIK</th>
                <th>Gender</th>
                <th>Tempat Lahir</th>
                <th>Agama</th>
                <th>Pendidikan</th>
                <th>Pekerjaan</th>
            </tr>
            @foreach ($anggotaKeluargas as $anggotaKeluarga)
            <tr>
                <td>{{ $anggotaKeluarga->nama }}</td>
                <td>{{ $anggotaKeluarga->nik }}</td>
                <td>{{ $anggotaKeluarga->jenis_kelamin }}</td>
                <td>{{ $anggotaKeluarga->tempat_lahir }}</td>
                <td>{{ $anggotaKeluarga->agama }}</td>
                <td>{{ $anggotaKeluarga->pendidikan }}</td>
                <td>{{ $anggotaKeluarga->pekerjaan }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <br>
    <div class="table-responsive">
        <table class="table-sm table-bordered" style="width: 100%; font-size: 0.8em">
            <tr>
                <th>Nama</th>
                <th>Status</th>
                <th>Jabatan</th>
                <th>Kewarganegaraan</th>

            </tr>
            @foreach ($anggotaKeluargas as $anggotaKeluarga)
            <tr>
                <td>{{ $anggotaKeluarga->nama }}</td>
                <td>{{ $anggotaKeluarga->status }}</td>
                <td>{{ $anggotaKeluarga->jabatan }}</td>
                <td> Indonesia </td>

            </tr>
            @endforeach
        </table>
    </div>
    <div class="tanggal ms-5 mt-1">
        {{ date('d F Y'); }}
    </div>
    <div class="tanggal float-end me-5 mt-4">

        <table>
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