<?php

namespace App\Http\Controllers;

use App\Models\JenisBantuan;
use App\Http\Requests\StoreJenisBantuanRequest;
use App\Http\Requests\UpdateJenisBantuanRequest;
use RealRashid\SweetAlert\Facades\Alert;

class JenisBantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Sinforman | Bantuan',
            'jenisBantuans' => JenisBantuan::all()
        ];
        // dd($data);
        return view('dashboard.bantuan.jenis_bantuan.bantuan', $data);
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
        ];

        return view('dashboard.bantuan.jenis_bantuan.tambahBantuan', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJenisBantuanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJenisBantuanRequest $request)
    {
        $validated = $request->validate([
            "bantuan" => "required|regex:/^[\pL\s]+$/u",
            "tahapan" => "required",
            "tgl_mulai" => "required",
            "tgl_selesai" => "required",
        ]);

        JenisBantuan::create($validated);
        Alert::success('Done', 'Data has ben saved');
        return redirect('/jenisBantuan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisBantuan  $jenisBantuan
     * @return \Illuminate\Http\Response
     */
    public function show(JenisBantuan $jenisBantuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisBantuan  $jenisBantuan
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisBantuan $jenisBantuan)
    {
        $data = [
            'title' => 'Sinforman | Edit Data Bantuan',
            'jenisBantuan' => $jenisBantuan
        ];
        // dd($data);
        return view('dashboard.bantuan.jenis_bantuan.editBantuan', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenisBantuanRequest  $request
     * @param  \App\Models\JenisBantuan  $jenisBantuan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJenisBantuanRequest $request, JenisBantuan $jenisBantuan)
    {


        $validated = $request->validate([
            "bantuan" => "required|regex:/^[\pL\s]+$/u|alpha_num",
            "tahapan" => "required",
            "tgl_mulai" => "required",
            "tgl_selesai" => "required",
        ]);

        JenisBantuan::where('id', $jenisBantuan->id)->update($validated);
        Alert::toast('Data has ben updated', 'success');
        return redirect('/jenisBantuan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisBantuan  $jenisBantuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisBantuan $jenisBantuan)
    {
        JenisBantuan::destroy($jenisBantuan->id);
        Alert::success('Done', 'Data has ben saved');
        return redirect('/jenisBantuan');
    }
}
