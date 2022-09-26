<?php

namespace App\Http\Controllers;

use App\Models\DetailKeluarga;
use App\Http\Requests\StoreDetailKeluargaRequest;
use App\Http\Requests\UpdateDetailKeluargaRequest;
use RealRashid\SweetAlert\Facades\Alert;

class DetailKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDetailKeluargaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetailKeluargaRequest $request)
    {

        $validated = $request->validate([
            "keluarga_id" => "required",
            "penduduk_id" => "required|unique:detail_keluargas",
            "jabatan" => "required",

        ]);
        DetailKeluarga::create($validated);
        Alert::success('Done', 'Data has ben saved');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailKeluarga  $detailKeluarga
     * @return \Illuminate\Http\Response
     */
    public function show(DetailKeluarga $detailKeluarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailKeluarga  $detailKeluarga
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailKeluarga $detailKeluarga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetailKeluargaRequest  $request
     * @param  \App\Models\DetailKeluarga  $detailKeluarga
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailKeluargaRequest $request, DetailKeluarga $detailKeluarga)
    {
        $validated = $request->validate([
            "keluarga_id" => "required",
            "penduduk_id" => "required",
            "jabatan" => "required",
        ]);
        // dd($validated);

        DetailKeluarga::where('id', $detailKeluarga->id)->update($validated);
        Alert::toast('Data has ben updated', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailKeluarga  $detailKeluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailKeluarga $detailKeluarga)
    {
        DetailKeluarga::destroy($detailKeluarga->id);
        Alert::toast('Data has ben deleted', 'success');
        return back();
    }
}
