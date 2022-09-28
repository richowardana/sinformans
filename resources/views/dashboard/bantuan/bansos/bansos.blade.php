@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0">
                    <a href="/detailBantuan/create">
                        <button class="btn btn-sm btn-primary rounded-pill ">
                            <div class="icon text-white">
                                <i class="bi bi-person-plus-fill"></i>
                                Tambah Data bansos
                            </div>
                        </button>
                    </a>
                </h5>
                <a href="/cetakBantuan">
                    <button class="btn btn-sm btn-primary rounded-pill ">
                        <div class="icon text-white">
                            <i class="bi bi-printer"></i>
                            Print
                        </div>
                    </button>
                </a>
                <table class="table table-sm datatable">
                    <thead>
                        <tr style="font-weight: bolder">
                            <td>No.KK/Kepala Keluarga</td>
                            <td>Bantuan</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bantuans as $bantuan)
                        <tr>
                            <td>{{ $bantuan->no_kk . ' - ' . $bantuan->kepala_keluarga }}</td>
                            <td class="fw-bolder text-success">{{ $bantuan->bansos }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection