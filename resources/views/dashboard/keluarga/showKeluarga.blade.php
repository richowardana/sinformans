@extends('layouts.main')
@section('container')
<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <img src="{{ asset('admin/assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle mb-3">
                <h4>{{ $keluarga->no_kk }}</h4>
                <h5 class="text-success fw-bold">{{ $keluarga->kepala_keluarga }}</h5>
                <h5 class="text-success fw-bold">{{ $keluarga->nik_kepala_keluarga }}</h5>
                <a href="/keluarga">
                    <button type="button" class="btn btn-sm btn-primary rounded-pill">
                        <div class="icon">
                            <i class="bi bi-box-arrow-in-left"></i> Kembali
                        </div>
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body pt-3">
                <ul class="nav nav-tabs nav-tabs-bordered">
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab"
                            data-bs-target="#profile-overview">Overview</button>
                    </li>
                </ul>
                <div class="tab-content pt-2">
                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <h5 class="card-title">Profile Details</h5>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label mb-3">Dusun</div>
                            <div class="col-lg-9 col-md-8"> : {{ $keluarga->dusun }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label mb-3">RT/RW</div>
                            <div class="col-lg-9 col-md-8"> : {{ $keluarga->rt . '/' . $keluarga->rw }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label mb-3">Desa</div>
                            <div class="col-lg-9 col-md-8"> : {{ $keluarga->desa}}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label mb-3">Kode Pos</div>
                            <div class="col-lg-9 col-md-8"> : {{ $keluarga->kode_pos }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label mb-3">Kecamatan</div>
                            <div class="col-lg-9 col-md-8"> : {{ $keluarga->kecamatan }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label mb-3">Kabupaten/Kota</div>
                            <div class="col-lg-9 col-md-8"> : {{ $keluarga->kabupaten_kota }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label mb-3">Provinsi</div>
                            <div class="col-lg-9 col-md-8"> : {{ $keluarga->provinsi }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection