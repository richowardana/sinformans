@extends('layouts.main')
@section('container')
<div class="card">
    <div class="card-body">
        <h5 class="card-title mb-3">
            <a href="/keluarga">
                <button type="button" class="btn btn-sm btn-primary rounded-pill">
                    <div class="icon">
                        <i class="bi bi-box-arrow-in-left"></i> Kembali
                    </div>
                </button>
            </a>
        </h5>
        <form class="row g-3" action="/keluarga" method="POST">
            @csrf
            <div class="col-md-4">
                <label for="no_kk" class="form-label">Nomor KK</label>
                <input type="text" class="form-control @error('no_kk')
                    is-invalid
                @enderror" id="no_kk" name="no_kk" value="{{ old('no_kk') }}">
                @error('no_kk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="kepala_keluarga" class="form-label">Kepala Keluarga</label>
                <input type="text" class="form-control @error('kepala_keluarga')
                    is-invalid
                @enderror" id="kepala_keluarga" name="kepala_keluarga" value="{{ old('kepala_keluarga') }}">
                @error('kepala_keluarga')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="nik_kepala_keluarga" class="form-label">NIK Kepala Keluarga</label>
                <input type="text" class="form-control @error('nik_kepala_keluarga')
                    is-invalid
                @enderror" id="nik_kepala_keluarga" name="nik_kepala_keluarga"
                    value="{{ old('nik_kepala_keluarga') }}">
                @error('nik_kepala_keluarga')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-1">
                <label for="rt" class="form-label">RT</label>
                <input type="text" class="form-control @error('rt')
                    is-invalid
                @enderror" id="rt" name="rt" value="{{ old('rt') }}">
                @error('rt')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-1">
                <label for="rw" class="form-label">RW</label>
                <input type="text" class="form-control @error('rw')
                    is-invalid
                @enderror" id="rw" name="rw" value="{{ old('rw') }}">
                @error('rw')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-3">
                <label for="dusun" class="form-label">Dusun</label>
                <input type="text" class="form-control @error('dusun')
                    is-invalid
                @enderror" id="dusun" name="dusun" value="{{ old('dusun') }}">
                @error('dusun')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="desa" class="form-label">Desa</label>
                <input type="text" class="form-control @error('desa')
                    is-invalid
                @enderror" id="desa" name="desa" value="{{ old('desa') }}">
                @error('desa')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-3">
                <label for="kode_pos" class="form-label">Kode Pos</label>
                <input type="text" class="form-control @error('kode_pos')
                    is-invalid
                @enderror" id="kode_pos" name="kode_pos" value="{{ old('kode_pos') }}">
                @error('kode_pos')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <input type="text" class="form-control @error('kecamatan')
                    is-invalid
                @enderror" id="kecamatan" name="kecamatan" value="{{ old('kecamatan') }}">
                @error('kecamatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="kabupaten_kota" class="form-label">Kabupaten/Kota</label>
                <input type="text" class="form-control @error('kabupaten_kota')
                    is-invalid
                @enderror" id="kabupaten_kota" name="kabupaten_kota" value="{{ old('kabupaten_kota') }}">
                @error('kabupaten_kota')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="provinsi" class="form-label">Provinsi</label>
                <input type="text" class="form-control @error('provinsi')
                    is-invalid
                @enderror" id="provinsi" name="provinsi" value="{{ old('provinsi') }}">
                @error('provinsi')
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