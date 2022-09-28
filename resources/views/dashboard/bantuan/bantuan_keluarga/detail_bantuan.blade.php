@extends('layouts.main')

@section('container')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="/detailBantuan/create">
                        <button class="btn btn-sm btn-primary rounded-pill ms-1">
                            <div class="icon text-white">
                                <i class="bi bi-person-plus-fill"></i>
                                Tambah Data Bantuan
                            </div>
                        </button>
                    </a>

                </h5>
                <table class="table table-sm datatable">
                    <thead>
                        <tr style="font-weight: bolder">
                            <td>ID</td>
                            <td>No KK</td>
                            <td>Bantuan</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detailBantuans as $detailBantuan)
                        <tr>
                            <td>{{ $detailBantuan->id }}</td>
                            <td>{{ $detailBantuan->no_kk . ' - ' . $detailBantuan->kepala_keluarga }}</td>
                            <td>{{ $detailBantuan->bantuan }}</td>
                            <td>
                                @if ($detailBantuan->tahapan == 1 && $detailBantuan->tahap_1 == null)
                                Belum diambil
                                @elseif ($detailBantuan->tahapan == 1 && $detailBantuan->tahap_1 != null)
                                Selesai
                                @elseif ($detailBantuan->tahapan == 2 && $detailBantuan->tahap_1 == null &&
                                $detailBantuan->tahap_2 == null)
                                Belum diambil
                                @elseif ($detailBantuan->tahapan == 2 && $detailBantuan->tahap_1 != null &&
                                $detailBantuan->tahap_2 == null)
                                Tahap 1
                                @elseif ($detailBantuan->tahapan == 2 && $detailBantuan->tahap_1 != null &&
                                $detailBantuan->tahap_2 != null)
                                Selesai
                                @endif
                            </td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            <a href="detailBantuan/{{ $detailBantuan->id }}/edit">
                                                <div class="icon">
                                                    <i class="bi bi-pencil-fill text-warning"
                                                        style="font-size: 1.2em"></i>
                                                </div>
                                            </a>
                                        </td>
                                        <td style="width: 1em"> </td>
                                        <td>
                                            <a href="" class="text-danger" data-bs-toggle="modal"
                                                data-bs-target="#basicModal{{ $detailBantuan->id }}">
                                                <div class="icon">
                                                    <i class="bi bi-trash-fill text-danger"
                                                        style="font-size: 1.2em"></i>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                </table>




                            </td>
                        </tr>
                        <div class="modal fade" id="basicModal{{ $detailBantuan->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-danger fw-bolder fs-4">Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure?</p>
                                        <p>Deleting <b class="text-danger">{{ $detailBantuan->kepala_keluarga }}</b>
                                            <b class="text-danger">{{
                                                $detailBantuan->bantuan }}</b>
                                        </p>
                                        <p>Data can't be restore</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm rounded-pill"
                                            data-bs-dismiss="modal">
                                            Cancel
                                        </button>
                                        <form action="/detailBantuan/{{ $detailBantuan->id }}" method="POST">
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