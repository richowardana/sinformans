@extends('layouts.main')
@section('container')
<div class="card">
    <div class="card-body">
        <h5 class="card-title mb-3">
            <a href="/jenisBantuan">
                <button type="button" class="btn btn-sm btn-primary rounded-pill">
                    <div class="icon">
                        <i class="bi bi-box-arrow-in-left"></i> Kembali
                    </div>
                </button>
            </a>
        </h5>
        <form class="row g-3" action="/jenisBantuan/{{ $jenisBantuan->id }}" method="POST">
            @method('put')
            @csrf
            <div class="col-md-12">
                <label for="bantuan" class="form-label">Bantuan</label>
                <input type="text" class="form-control @error('bantuan')
                    is-invalid
                @enderror" id="bantuan" name="bantuan" value="{{ old('bantuan', $jenisBantuan->bantuan) }}">
                @error('bantuan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="tahapan" class="form-label">Tahapan</label>
                <br>

                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input @error('tahapan')
                        is-invalid
                    @enderror" type="radio" name="tahapan" id="tahapan" value="1" {{--autoautoauto autoautoauto --}}
                        @if(old('tahapan') || $jenisBantuan->tahapan =='1' ) checked @endif>
                    <label class="form-check-label" for="1">
                        1 Tahapan
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input 
                    @error('tahapan')
                    is-invalid
                    @enderror" type="radio" name="tahapan" id="tahapan" value="2" {{--autoautoautoautoautoauto --}}
                        @if(old('tahapan') || $jenisBantuan->tahapan =='2' ) checked @endif>
                    <label class="form-check-label" for="2">
                        2 Tahapan
                    </label>
                </div>
                @error('tahapan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control @error('tgl_mulai')
                    is-invalid
                @enderror" id="tgl_mulai" name="tgl_mulai" value="{{ old('tgl_mulai', $jenisBantuan->tgl_mulai) }}">
                @error('tgl_mulai')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                <input type="date" class="form-control @error('tgl_selesai')
                    is-invalid
                @enderror" id="tgl_selesai" name="tgl_selesai"
                    value="{{ old('tgl_selesai', $jenisBantuan->tgl_selesai) }}">
                @error('tgl_selesai')
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