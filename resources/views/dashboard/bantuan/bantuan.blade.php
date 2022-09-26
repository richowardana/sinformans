@extends('layouts.main')

@section('container')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="/bantuan/create">
                        <button class="btn btn-sm btn-primary rounded-pill ms-1">
                            <div class="icon text-white">
                                <i class="bi bi-person-plus-fill"></i>
                                Tambah Data Bantuan
                            </div>
                        </button>
                    </a>

                    <button class="btn btn-sm btn-primary rounded-pill float-end ms-1">
                        <div class="icon text-white">
                            <i class="bi bi-file-earmark-pdf"></i>
                            Pdf
                        </div>
                    </button>


                    <button class="btn btn-sm btn-primary rounded-pill float-end ms-1">
                        <div class="icon text-white">
                            <i class="bi bi-download"></i>
                            Excel
                        </div>
                    </button>

                    <button class="btn btn-sm btn-primary rounded-pill float-end ms-1">
                        <div class="icon text-white">
                            <i class="bi bi-printer"></i>
                            Print
                        </div>
                    </button>
                </h5>
                <table class="table table-sm datatable">
                    <thead>
                        <tr style="font-weight: bolder">
                            <td>Bantuan</td>
                            <td>Penerima</td>
                            <td>Tahapan</td>
                            <td>Mulai</td>
                            <td>Selesai</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bantuans as $bantuan)
                        <tr>
                            <td>{{ $bantuan->bantuan }}</td>
                            <td>{{ $bantuan->penerima }}</td>
                            <td> {{ $bantuan->tahapan }}</td>
                            <td> {{ $bantuan->tgl_mulai }}</td>
                            <td> {{ $bantuan->tgl_selesai }}</td>
                            <td>
                                <div class="dropdown">
                                    <div class="icon" data-bs-toggle="dropdown" aria-expanded="false"
                                        style="cursor: pointer">
                                        <i class="bi bi-gear-fill" style="font-size: 1.3rem;"></i>
                                    </div>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item text-success fw-bold"
                                                href="/bantuan/{{ $bantuan->id }}">
                                                <div class="icon">
                                                    <i class="bi bi-search text-success"></i> Show
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-warning fw-bold"
                                                href="/bantuan/{{ $bantuan->id }}/edit">
                                                <div class="icon">
                                                    <i class="bi bi-pencil-square text-warning"></i> Edit
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <button class="dropdown-item text-danger fw-bold" data-bs-toggle="modal"
                                                data-bs-target="#basicModal{{ $bantuan->id }}">
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
                        <div class="modal fade" id="basicModal{{ $bantuan->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-danger fw-bolder fs-4">Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure?</p>
                                        <p>Deleting <b class="text-danger">{{ $bantuan->nama }}</b>'s data, with NIK
                                            <b class="text-danger">{{
                                                $bantuan->id }}</b>
                                        </p>
                                        <p>Data can't be restore</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm rounded-pill"
                                            data-bs-dismiss="modal">
                                            Cancel
                                        </button>
                                        <form action="/bantuan/{{ $bantuan->id }}" method="POST">
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

@endsection