<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDetailKeluargaRequest;
use App\Models\Keluarga;
use App\Http\Requests\StoreKeluargaRequest;
use App\Http\Requests\UpdateKeluargaRequest;
use App\Models\DetailKeluarga;
use App\Models\Penduduk;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "title" => "Sinforman | Data Keluarga",
            "keluargas" => Keluarga::all()->sortDesc()
            // "keluargas" => Keluarga::all()->join('keluargas', 'keluargas.penduduk_id', '=', 'penduduks.id'),
            // "keluargas" => Penduduk::join('penduduks', 'penduduks.id', '=', 'keluargas.penduduk_id'),
        ];

        // dd($data);
        return view('dashboard.keluarga.keluarga', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Siban | Tambah Data Keluarga',
        ];

        return view('dashboard.keluarga.tambahKeluarga', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKeluargaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKeluargaRequest $request)
    {
        $validated = $request->validate([
            "no_kk" => "required|min:15|numeric|unique:keluargas",
            "kepala_keluarga" => "required|regex:/^[\pL\s]+$/u|min:3",
            "nik_kepala_keluarga" => "required|min:15|numeric|unique:keluargas",
            "dusun" => "required|regex:/^[\pL\s]+$/u|min:3",
            "rt" => "required|numeric",
            "rw" => "required|numeric",
            "desa" => "required|regex:/^[\pL\s]+$/u|min:3",
            "kode_pos" => "required|numeric",
            "kecamatan" => "required|regex:/^[\pL\s]+$/u|min:3",
            "kabupaten_kota" => "required|regex:/^[\pL\s]+$/u|min:3",
            "provinsi" => "required|regex:/^[\pL\s]+$/u|min:3",
        ]);
        // dd($validated);
        Keluarga::create($validated);
        Alert::success('Done', 'Data has ben saved');
        return redirect('/keluarga');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function show(Keluarga $keluarga)
    {
        $data = [
            'title' => 'Sinforman | Detail Keluarga',
            'keluarga' => $keluarga
        ];

        return view('dashboard.keluarga.showKeluarga', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function edit(Keluarga $keluarga)
    {
        $data = [
            'title' => 'Sinforman | Edit Data Keluarga',
            'keluarga' => $keluarga
        ];

        return view('dashboard.keluarga.editKeluarga', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKeluargaRequest  $request
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKeluargaRequest $request, Keluarga $keluarga)
    {

        $validated = $request->validate([
            "no_kk" => ['required', 'min:15', 'numeric', 'unique:keluargas,no_kk,' . $keluarga->id],
            "kepala_keluarga" => "required|regex:/^[\pL\s]+$/u|min:3",
            "nik_kepala_keluarga" => ['required', 'min:15', 'numeric', 'unique:keluargas,nik_kepala_keluarga,' . $keluarga->id],
            "dusun" => "required|regex:/^[\pL\s]+$/u|min:3",
            "rt" => "required|numeric",
            "rw" => "required|numeric",
            "desa" => "required|regex:/^[\pL\s]+$/u|min:3",
            "kode_pos" => "required|numeric",
            "kecamatan" => "required|regex:/^[\pL\s]+$/u|min:3",
            "kabupaten_kota" => "required|regex:/^[\pL\s]+$/u|min:3",
            "provinsi" => "required|regex:/^[\pL\s]+$/u|min:3",
        ]);
        // dd($validated);
        Keluarga::where('no_kk', $keluarga->no_kk)->update($validated);
        Alert::toast('Data has ben updated', 'success');
        return redirect('/keluarga');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keluarga $keluarga)
    {
        Keluarga::destroy($keluarga->id);
        Alert::toast('Data has ben deleted', 'success');
        return redirect('/keluarga');
    }

    public function anggotaKeluarga(Keluarga $no_kk)
    {
        $data = [
            'title' => 'Sinforman | Detail Keluarga',
            'keluargas' => DB::table('keluargas')->select('keluargas.*')->where('no_kk', $no_kk['no_kk'])->get(),
            'anggotaKeluargas' => DB::table('detail_keluargas')
                ->join('keluargas', 'detail_keluargas.keluarga_id', '=', 'keluargas.id')
                ->join('penduduks', 'detail_keluargas.penduduk_id', '=', 'penduduks.id')
                ->select('detail_keluargas.*', 'keluargas.*', 'penduduks.*')->where('keluarga_id', $no_kk['id'])->get(),
            'penduduks' => Penduduk::all(),
        ];
        // dd($data);
        return view('dashboard.keluarga.anggota_keluarga.anggotaKeluarga', $data);
    }
}
