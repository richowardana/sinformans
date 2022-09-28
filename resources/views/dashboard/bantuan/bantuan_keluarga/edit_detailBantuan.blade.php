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
        @foreach ($detailBantuan as $data)
        <form class="row g-3" action="/detailBantuan/{{ $data->id }}" method="POST">

            @method('put')
            @csrf
            <div class="col-md-12">
                <label for="keluarga_id" class="form-label">No KK</label>

                <input type="hidden" name="keluarga_id" id="keluarga_id" value="{{ $data->keluarga_id }}">

                <select id="keluarga_id" class="form-select 
                @error('keluarga_id')
                    is-invalid
                @enderror" name="keluarga_id" disabled>
                    <option value="">{{ $data->no_kk . ' - ' . $data->kepala_keluarga}} </option>
                </select>
                @error('keluarga_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="bantuan_id" class="form-label">Jenis Bantuan</label>

                <input type="hidden" name="bantuan_id" id="bantuan_id" value="{{ $data->bantuan_id }}">

                <select id="bantuan_id" class="form-select 
                @error('bantuan_id')
                    is-invalid
                @enderror" name="bantuan_id" disabled>
                    <option value="">{{ $data->bantuan }}</option>
                </select>
                @error('bantuan_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="tahap_1" class="form-label">Tahap 1</label>
                <input type="date" class="form-control @error('tahap_1')
                    is-invalid
                @enderror" id="tahap_1" name="tahap_1" value="{{ old('tahap_1', $data->tahap_1) }}">
                @error('tahap_1')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            @if ($data->tahapan == 2 )
            <div class="col-md-4">
                <label for="tahap_2" class="form-label">Tahap 2</label>
                <input type="date" class="form-control @error('tahap_2')
                    is-invalid
                @enderror" id="tahap_2" name="tahap_2" value="{{ old('tahap_2', $data->tahap_2) }}">
                @error('tahap_2')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            @endif
            <div class="text-center">
                <button type="submit" class="btn btn-sm btn-primary rounded-pill">
                    <div class="icon">
                        <i class="bi bi-folder-plus"></i> Save
                    </div>
                </button>
            </div>

        </form>
        @endforeach

    </div>
</div>
@endsection