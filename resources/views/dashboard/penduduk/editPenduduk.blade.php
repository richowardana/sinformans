@extends('layouts.main')
@section('container')
<div class="card">
    <div class="card-body">
        <h5 class="card-title mb-3">
            <a href="/penduduk">
                <button type="button" class="btn btn-sm btn-primary rounded-pill">
                    <div class="icon">
                        <i class="bi bi-box-arrow-in-left"></i> Kembali
                    </div>
                </button>
            </a>
        </h5>
        <form class="row g-3" action="/penduduk/{{ $penduduk->nik }}" method="POST">
            @method('put')
            @csrf
            <div class="col-md-4">
                <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK)</label>
                <input type="text" class="form-control @error('nik')
                    is-invalid
                @enderror" id="nik" name="nik" value="{{ old('nik', $penduduk->nik) }}">
                @error('nik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama')
                    is-invalid
                @enderror" id="nama" name="nama" value="{{ old('nama', $penduduk->nama) }}">
                @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <br>

                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input @error('jenis_kelamin')
                        is-invalid
                    @enderror" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-laki" {{--autoautoauto --}}
                        @if (old('jenis_kelamin')=='Laki-laki' || $penduduk->jenis_kelamin == 'Laki-laki' )
                    checked @endif>
                    <label class="form-check-label" for="laki-laki">
                        Laki-Laki
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input 
                    @error('jenis_kelamin')
                    is-invalid
                    @enderror" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" {{--autoautoauto --}}
                        @if (old('jenis_kelamin')=='Perempuan' || $penduduk->jenis_kelamin == 'Perempuan')
                    checked @endif>
                    <label class="form-check-label" for="perempuan">
                        Perempuan
                    </label>
                </div>
                @error('jenis_kelamin')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="tempat_lahir" class="form-label">Kota Lahir</label>
                <input type="text" class="form-control @error('tempat_lahir')
                    is-invalid
                @enderror" id="tempat_lahir" name="tempat_lahir"
                    value="{{ old('tempat_lahir', $penduduk->tempat_lahir) }}">
                @error('tempat_lahir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control @error('tgl_lahir')
                    is-invalid
                @enderror" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir', $penduduk->tgl_lahir) }}">
                @error('tgl_lahir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="agama" class="form-label">Agama</label>
                <select id="agama" class="form-select 
                @error('agama')
                    is-invalid
                @enderror" name="agama">
                    <option value="">- Pilih Satu -</option>
                    <option value="Islam" @if (old('agama')=='Islam' || $penduduk->agama == 'Islam' ) selected
                        @endif>Islam</option>
                    <option value="Kristen" @if (old('agama')=='Kristen' || $penduduk->agama == 'Kristen')
                        selected @endif>Kristen</option>
                    <option value="Khatolik" @if (old('agama')=='Khatolik' || $penduduk->agama == 'Khatolik' )
                        selected @endif>Khatolik</option>
                    <option value="Hindu" @if (old('agama')=='Hindu' || $penduduk->agama == 'Hindu' ) selected
                        @endif>Hindu</option>
                    <option value="Budha" @if (old('agama')=='Budha' || $penduduk->agama == 'Budha' ) selected
                        @endif>Budha</option>
                    <option value="Konghucu" @if (old('agama')=='Konghucu' || $penduduk->agama == 'Konghucu' ) selected
                        @endif>Konghucu</option>
                    <option value="Lainnya" @if (old('agama')=='Lainnya' | $penduduk->agama == 'Lainnya' )
                        selected @endif>Lainnya</option>
                </select>
                @error('agama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="pendidikan" class="form-label">Pendidikan</label>
                <select id="pendidikan" class="form-select 
                @error('pendidikan')
                    is-invalid
                @enderror" name="pendidikan">
                    <option value="">- Pilih Satu -</option>
                    <option value="SD" @if (old('pendidikan')=='SD' || $penduduk->pendidikan == 'SD' ) selected
                        @endif>SD</option>
                    <option value="SMP/Sederajat" {{--
                        autoautoautoautoautoautoautoautoautoautoautoautoautoautoautoautoautoautoautoautoautoauto --}}
                        @if (old('pendidikan')=='SMP/Sederajat' || $penduduk->pendidikan == 'SMP/Sederajat') selected
                        @endif> SMP/Sederajat</option>
                    <option value="SMA/Sederajat" {{--
                        autoautoautoautoautoautoautoautoautoautoautoautoautoautoautoautoautoautoautoautoautoauto --}}
                        @if (old('pendidikan')=='SMA/Sederajat' || $penduduk-> pendidikan == 'SMA/Sederajat' )
                        selected @endif> SMA/Sederajat</option>
                    <option value="D1/D2" @if (old('pendidikan')=='D1/D2' || $penduduk->pendidikan == 'D1/D2' )
                        selected @endif>D1/D2</option>
                    <option value="D3" @if (old('pendidikan')=='D3' || $penduduk->pendidikan == 'D3' )
                        selected
                        @endif>D3</option>
                    <option value="D4/S1" @if (old('pendidikan')=='D4/S1' || $penduduk->pendidikan == 'D4/S1')
                        selected @endif>D4/S1</option>
                    <option value="S2" @if (old('pendidikan')=='S2' || $penduduk->pendidikan == 'S2')
                        selected
                        @endif>S2</option>
                    <option value="S3" @if (old('pendidikan')=='S3' || $penduduk->pendidikan == 'S3' ) selected
                        @endif>S3</option>
                </select>
                @error('pendidikan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                <input type="text" class="form-control @error('pekerjaan')
                    is-invalid
                @enderror" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan', $penduduk->pekerjaan) }}">
                @error('pekerjaan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="status" class="form-label">Status</label>
                <select id="inputState" class="form-select @error('status')
                    is-invalid
                @enderror" name="status">
                    <option value="">- Pilih Satu -</option>
                    <option value="Belum Menikah" {{--
                        autoautoautoautoautoautoautoautoautoautoautoautoautoautoautoautoautoautoautoautoautoauto --}}
                        @if (old('status')=='Belum Menikah' || $penduduk->status == 'Belum Menikah')
                        selected @endif>Belum Menikah
                    </option>
                    <option value="Menikah" @if (old('status')=='Menikah' || $penduduk->status == 'Menikah')
                        selected @endif>Menikah</option>
                    <option value="Cerai" @if (old('status')=='Cerai' || $penduduk->status == 'Cerai' ) selected
                        @endif>Cerai</option>
                </select>
                @error('status')
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