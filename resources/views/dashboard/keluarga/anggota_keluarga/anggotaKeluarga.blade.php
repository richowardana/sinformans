@extends('layouts.main')
@section('container')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <div class="percetakan">
                        <a href="/keluarga">
                            <button type="button" class="btn btn-sm btn-primary rounded-pill">
                                <div class="icon">
                                    <i class="bi bi-box-arrow-in-left"></i> Kembali
                                </div>
                            </button>
                        </a>

                        <a href="#">
                            <button type="button" class="btn btn-sm btn-primary rounded-pill" data-bs-toggle="modal"
                                data-bs-target=" #largeModal">
                                <div class="icon text-white">
                                    <i class="bi bi-person-plus-fill"></i>
                                    Tambah
                                </div>
                            </button>
                        </a>
                        @foreach ($keluargas as $keluarga)
                        <a href="/cetakKK/{{ $keluarga->no_kk }}">
                            <button class="btn btn-sm btn-primary rounded-pill">
                                <div class="icon text-white">
                                    <i class="bi bi-printer"></i>
                                    Print
                                </div>
                            </button>
                        </a>

                    </div>

                    <center>
                        <h4 class="fw-bolder">Data Kartu Keluarga <br> No. {{ $keluarga->no_kk }}</h4>
                    </center>
                    <hr>
                    <div class="table-responsive">
                        <table class="fs-6" style="width: 100%">
                            <tr>
                                <td style="width: 10em">Kepala Keluarga</td>
                                <td>:</td>
                                <td style="width: 20em">{{ $keluarga->kepala_keluarga }}</td>
                                <td style="width: 10em"></td>
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
                    @endforeach
                    {{--
                    <hr> --}}
                </div>
                <div class="table-responsive">
                    <table class="table-sm table-bordered" style="width: 100%">
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
                    <table class="table-sm table-bordered" style="width: 100%">
                        <tr>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Jabatan</th>
                            <th>Kewarganegaraan</th>
                            <th>No.Paspor</th>
                            <th>
                                <center>
                                    Action
                                </center>
                            </th>
                        </tr>
                        @foreach ($anggotaKeluargas as $anggotaKeluarga)
                        <tr>
                            <td>{{ $anggotaKeluarga->nama }}</td>
                            <td>{{ $anggotaKeluarga->status }}</td>
                            <td>{{ $anggotaKeluarga->jabatan }}</td>
                            <td> Indonesia </td>
                            <td> - </td>
                            <td>
                                <center>
                                    <table>
                                        <tr>
                                            <td>
                                                <a href="/detailKeluarga/{{ $anggotaKeluarga->id }}"
                                                    data-bs-toggle="modal"
                                                    data-bs-target=" #largeModal{{ $anggotaKeluarga->id }}">
                                                    <div class="icon">
                                                        <i class="bi bi-pencil-fill text-warning"
                                                            style="font-size: 1.5em"></i>
                                                    </div>
                                                </a>
                                            </td>
                                            <td style="width: 1em"></td>
                                            <td>
                                                <a href="/detailKeluarga/{{ $anggotaKeluarga->id }}"
                                                    data-bs-toggle="modal"
                                                    data-bs-target=" #hapus{{ $anggotaKeluarga->id }}">
                                                    <div class="icon">
                                                        <i class="bi bi-trash-fill text-danger"
                                                            style="font-size: 1.5em"></i>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </center>
                            </td>
                        </tr>
                        <div class=" modal fade" id="hapus{{ $anggotaKeluarga->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Hapus Data Anggota</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Hapus Data {{ $anggotaKeluarga->nama }}
                                    </div>
                                    <div class="modal-footer">
                                        <form action="/detailKeluarga/{{ $anggotaKeluarga->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class=" modal fade" id="largeModal{{ $anggotaKeluarga->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Data Anggota</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row g-3" action="/detailKeluarga/{{ $anggotaKeluarga->id }}"
                                            method="post">
                                            @method('put')
                                            @csrf
                                            <div class="col-md-12">
                                                <label class="form-label" for="keluarga_id">Nomor KK</label>
                                                <input type="hidden" class="form-control" name="keluarga_id"
                                                    id="keluarga_id" value="{{ $anggotaKeluarga->keluarga_id }}">
                                                <input type="text" class="form-control" name="keluarga_id"
                                                    id="keluarga_id" value="{{ $anggotaKeluarga->no_kk }}" disabled>

                                                <div class="col-md-12">
                                                    <input type="hidden" class="foy rm-control" name="penduduk_id"
                                                        id="penduduk_id" value="{{ $anggotaKeluarga->penduduk_id }}">
                                                    <label class="form-label" for="penduduk_id">Anggota</label>
                                                    <select class="form-select" name="penduduk_id" id="penduduk_id"
                                                        disabled>
                                                        <option value="{{ $anggotaKeluarga->penduduk_id }}">
                                                            {{ $anggotaKeluarga->nama }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label" for="jabatan">Jabatan</label>
                                                    {{ $anggotaKeluarga->jabatan }}
                                                    <select class="form-select" name="jabatan" id="keluarga_id"
                                                        required>
                                                        <option value=""> - Pilih Satu - </option>

                                                        <option value="Kepala Keluarga" {{-- auto --}} {{-- auto --}}
                                                            @if($anggotaKeluarga->jabatan == 'Kepala Keluarga' )
                                                            selected
                                                            @endif>
                                                            Kepala Keluarga
                                                        </option>
                                                        <option value="Istri" {{-- auto --}} {{-- auto --}}
                                                            @if($anggotaKeluarga->jabatan == 'Istri' )
                                                            selected
                                                            @endif>Istri</option>
                                                        <option value="Anak Kandung" {{-- auto --}} {{-- auto --}}
                                                            @if($anggotaKeluarga->jabatan == 'Anak Kandung' )
                                                            selected
                                                            @endif>Anak Kandung</option>
                                                        <option value="Anak Angkat" {{-- auto --}} {{-- auto --}}
                                                            @if($anggotaKeluarga->jabatan == 'Anak Angkat')
                                                            selected
                                                            @endif>Anak Angkat</option>
                                                        <option value="Nenek" {{-- auto --}} {{-- auto --}}
                                                            @if($anggotaKeluarga->jabatan == 'Nenek' )
                                                            selected
                                                            @endif>Nenek</option>
                                                        <option value="Kakek" {{-- auto --}} {{-- auto --}}
                                                            @if($anggotaKeluarga->jabatan == 'Kakek' )
                                                            selected
                                                            @endif>Kakek</option>
                                                        <option value="Keponakan" {{-- auto --}} {{-- auto --}}
                                                            @if($anggotaKeluarga->jabatan == 'Keponakan' )
                                                            selected
                                                            @endif>Keponakan</option>
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class=" modal fade" id="largeModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Anggota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="/detailKeluarga" method="post">
                    @csrf
                    <div class="col-md-4">
                        <label class="form-label" for="keluarga_id">Nomor KK</label>
                        @foreach ($keluargas as $keluarga)
                        <input type="hidden" name="keluarga_id" id="keluarga_id" value="{{ $keluarga->id }}">
                        <input type="text" class="form-control" id="keluarga_id" value="{{ $keluarga->no_kk }}"
                            disabled>
                        {{-- <select class="form-select" name="keluarga_id" id="keluarga_id" disabled>
                            <option>{{ $keluarga->no_kk }}</option>
                        </select> --}}
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="penduduk_id">Anggota</label>
                        <select class="form-select" name="penduduk_id" id="penduduk_id" required>
                            <option value=""> - Pilih Satu - </option>
                            @foreach ($penduduks as $penduduk)
                            <option value="{{ $penduduk->id }}">{{ $penduduk->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="jabatan">Jabatan</label>
                        <select class="form-select" name="jabatan" id="keluarga_id" required>
                            <option value=""> - Pilih Satu - </option>
                            <option value="Kepala Keluarga">Kepala Keluarga</option>
                            <option value="Istri">Istri</option>
                            <option value="Anak Kandung">Anak Kandung</option>
                            <option value="Anak Angkat">Anak Angkat</option>
                            <option value="Nenek">Nenek</option>
                            <option value="Kakek">Kakek</option>
                            <option value="Keponakan">Keponakan</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection