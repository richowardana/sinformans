@extends('layouts.main')
@section('container')
<div class="card">
    <div class="card-body">
        <h5 class="card-title mb-3">
            <a href="/detailBantuan">
                <button type="button" class="btn btn-sm btn-primary rounded-pill">
                    <div class="icon">
                        <i class="bi bi-box-arrow-in-left"></i> Kembali
                    </div>
                </button>
            </a>
        </h5>
        <form class="row g-3" action="/detailBantuan" method="POST">
            @csrf
            <div class="col-md-12">
                <label for="keluarga_id" class="form-label">No KK</label>
                <select id="keluarga_id" class="form-select 
                @error('keluarga_id')
                    is-invalid
                @enderror" name="keluarga_id">
                    <option value=""> - Pilih Satu - </option>
                    @foreach ($keluargas as $keluarga)
                    <option value="{{ $keluarga->id }}">
                        {{ $keluarga->no_kk . ' - ' . $keluarga->kepala_keluarga }}
                    </option>
                    @endforeach

                </select>
                @error('keluarga_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="bantuan_id" class="form-label">Jenis Bantuan</label>
                <select id="bantuan_id" class="form-select 
                @error('bantuan_id')
                    is-invalid
                @enderror" name="bantuan_id">
                    <option value=""> - Pilih Satu - </option>
                    @foreach ($bantuans as $bantuan)
                    <option value="{{ $bantuan->id }}">
                        {{ $bantuan->bantuan}}
                    </option>
                    @endforeach
                </select>
                @error('bantuan_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-sm btn-primary rounded-pill">
                    <div class="icon">
                        <i class="bi bi-folder-plus"></i> Save
                    </div>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection