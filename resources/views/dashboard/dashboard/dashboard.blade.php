@extends('layouts.main')
@section('container')
<div class="row">
    <div class="col-xxl-4 col-md-12">
        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title">Welcome Page</h5>
                <div class="d-flex align-items-center">
                    <div class="ps-3">
                        <h3>Selamat datang di sistem informasi manajemen kependudukan dan bantuan sosial</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-4 col-md-4">
        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title">Penduduk <span>| Total</span></h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i
                            class="bi bi-person-fill" style="font-size: 2em"></i></div>
                    <div class="ps-3">
                        <h4>{{ $penduduks }} Orang</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-4 col-md-4">
        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title">Keluarga <span>| Total</span></h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i
                            class="bi bi-people-fill" style="font-size: 2em"></i></div>
                    <div class="ps-3">
                        <h4>{{ $keluargas }} Keluarga</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-4 col-md-4">
        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title">Bantuan Diberikan <span>| Total</span></h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i
                            class="bi bi-archive-fill" style="font-size: 2em"></i></div>
                    <div class="ps-3">
                        <h4>{{ $bantuans }} Bantuan</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection