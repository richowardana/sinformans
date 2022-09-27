<?php

namespace App\Http\Controllers;

use App\Models\DetailBantuan;
use App\Http\Requests\StoreDetailBantuanRequest;
use App\Http\Requests\UpdateDetailBantuanRequest;
use App\Models\JenisBantuan;
use App\Models\Keluarga;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DetailBantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Sinforman | Detail Bantuan',
            'detailBantuans' => DetailBantuan::select('detail_bantuans.*', 'keluargas.no_kk', 'keluargas.kepala_keluarga', 'jenis_bantuans.bantuan', 'jenis_bantuans.tahapan')
                ->join('keluargas', 'detail_bantuans.keluarga_id', '=', 'keluargas.id')
                ->join('jenis_bantuans', 'detail_bantuans.bantuan_id', '=', 'jenis_bantuans.id')->get()

        ];

        // dd($data);

        return view('dashboard.bantuan.bantuan_keluarga.detail_bantuan', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Sinforman | Tambah Data Bantuan',
            'keluargas' => Keluarga::all(),
            'bantuans' => JenisBantuan::all()
        ];

        return view('dashboard.bantuan.bantuan_keluarga.tambah_detailBantuan', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDetailBantuanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetailBantuanRequest $request)
    {
        $validated = $request->validate([
            'keluarga_id' => 'required',
            'bantuan_id' => 'required',
            'tahap_1' => 'nullable',
            'tahap_2' => 'nullable'
        ]);
        // dd($validated);
        DetailBantuan::create($validated);
        Alert::success('Done', 'Data has ben saved');
        return redirect('/detailBantuan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailBantuan  $detailBantuan
     * @return \Illuminate\Http\Response
     */
    public function show(DetailBantuan $detailBantuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailBantuan  $detailBantuan
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailBantuan $detailBantuan)
    {
        $data = [
            'title' => 'Sinforman | Detail Bantuan',
            'detailBantuan' => DetailBantuan::select('detail_bantuans.*', 'keluargas.no_kk', 'keluargas.kepala_keluarga', 'jenis_bantuans.bantuan', 'jenis_bantuans.tahapan')
                ->join('keluargas', 'detail_bantuans.keluarga_id', '=', 'keluargas.id')
                ->join('jenis_bantuans', 'detail_bantuans.bantuan_id', '=', 'jenis_bantuans.id')
                ->where('detail_bantuans.id', $detailBantuan['id'])->get()

        ];
        // dd($data);
        return view('dashboard.bantuan.bantuan_keluarga.edit_detailBantuan', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetailBantuanRequest  $request
     * @param  \App\Models\DetailBantuan  $detailBantuan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailBantuanRequest $request, DetailBantuan $detailBantuan)
    {
        $validated = $request->validate([
            'keluarga_id' => 'required',
            'bantuan_id' => 'required',
            'tahap_1' => 'nullable',
            'tahap_2' => 'nullable'
        ]);

        DetailBantuan::where('id', $detailBantuan->id)->update($validated);
        Alert::toast('Data has ben updated', 'success');
        return redirect('/detailBantuan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailBantuan  $detailBantuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailBantuan $detailBantuan)
    {
        DetailBantuan::destroy($detailBantuan->id);
        Alert::toast('Data has ben deleted', 'success');
        return redirect('/detailBantuan');
    }
}
