@extends('layouts.main')

@section('container')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0">
                    <a href="/penduduk/create">
                        <button class="btn btn-sm btn-primary rounded-pill">
                            <div class="icon text-white">
                                <i class="bi bi-person-plus-fill"></i>
                                Tambah Data Penduduk
                            </div>
                        </button>
                    </a>
                </h5>


                <div class="percetakan">
                    {{-- <button class="btn btn-sm btn-primary rounded-pill">
                        <div class="icon text-white">
                            <i class="bi bi-file-earmark-pdf"></i>
                            Pdf
                        </div>
                    </button> --}}

                    {{-- <button class="btn btn-sm btn-primary rounded-pill">
                        <div class="icon text-white">
                            <i class="bi bi-download"></i>
                            Excel
                        </div>
                    </button> --}}
                    <a href="/cetakPenduduk">
                        <button class="btn btn-sm btn-primary rounded-pill">
                            <div class="icon text-white">
                                <i class="bi bi-printer"></i>
                                Print
                            </div>
                        </button>
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr style="font-weight: bolder">
                                <td>NIK</td>
                                <td>Nama</td>
                                <td>Gender</td>
                                <td>Pekerjaan</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penduduks as $penduduk)
                            <tr>
                                <td style="width: 12em" class="text-primary fw-bolder">{{ $penduduk->nik }}</td>
                                <td style="width: 17em">{{ $penduduk->nama }}</td>
                                <td style="width: 7em">{{ $penduduk->jenis_kelamin }}</td>
                                <td>{{ $penduduk->pekerjaan }}</td>
                                <td>
                                    <div class="dropdown">
                                        <div class="icon" data-bs-toggle="dropdown" aria-expanded="false"
                                            style="cursor: pointer">
                                            <i class="bi bi-gear-fill" style="font-size: 1.3rem;"></i>
                                        </div>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item text-success fw-bold"
                                                    href="/penduduk/{{ $penduduk->nik }}">
                                                    <div class="icon">
                                                        <i class="bi bi-search text-success"></i> Show
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item text-warning fw-bold"
                                                    href="/penduduk/{{ $penduduk->nik }}/edit">
                                                    <div class="icon">
                                                        <i class="bi bi-pencil-square text-warning"></i> Edit
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <button class="dropdown-item text-danger fw-bold" data-bs-toggle="modal"
                                                    data-bs-target="#basicModal{{ $penduduk->nik }}">
                                                    <div class="icon">
                                                        <i class="bi bi-trash text-danger"></i> Delete
                                                    </div>
                                                </button>

                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            {{-- MODAL DELETE --}}
                            <div class="modal fade" id="basicModal{{ $penduduk->nik }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-danger fw-bolder fs-4">Delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure?</p>
                                            <p>Deleting <b class="text-danger">{{ $penduduk->nama }}</b>'s data, with
                                                NIK
                                                <b class="text-danger">{{
                                                    $penduduk->nik }}</b>
                                            </p>
                                            <p>Data can't be restore</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm rounded-pill"
                                                data-bs-dismiss="modal">
                                                Cancel
                                            </button>
                                            <form action="/penduduk/{{ $penduduk->nik }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger rounded-pill">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection