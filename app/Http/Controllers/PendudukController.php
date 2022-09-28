<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Http\Requests\StorePendudukRequest;
use App\Http\Requests\UpdatePendudukRequest;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "title" => "Sinforman | Data Penduduk",
            "penduduks" => Penduduk::all()->sortDesc(),
        ];

        // dd($data);
        return view('dashboard.penduduk.penduduk', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            "title" => "Sinforman | Tambah Data Penduduk"
        ];

        return view('dashboard.penduduk.tambahPenduduk', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePendudukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePendudukRequest $request)
    {
        $validated = $request->validate([
            "nik" => "required|min:16|numeric|unique:penduduks",
            "nama" => "required|regex:/^[\pL\s]+$/u|min:3",
            "jenis_kelamin" => "required",
            "tempat_lahir" => "required|regex:/^[\pL\s]+$/u|min:3",
            "tgl_lahir" => "required",
            "agama" => "required",
            "pendidikan" => "required",
            "pekerjaan" => "required|regex:/^[\pL\s]+$/u|min:3",
            "status" => "required"
        ]);

        // dd($request);

        Penduduk::create($validated);
        Alert::success('Done', 'Data has ben saved');
        return redirect('/penduduk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function show(Penduduk $penduduk)
    {
        $isi = "
Nik = $penduduk->nik
Nama = $penduduk->nama 
Gender = $penduduk->jenis_kelamin
Kota Lahir = $penduduk->tempat_lahir
Tgl Lahir = $penduduk->tgl_lahir
Agama = $penduduk->agama
Pendidikan = $penduduk->pendidikan
Pekerjaan = $penduduk->pekerjaan
Status = $penduduk->status
        ";
        $data = [
            "title" => "Data $penduduk->nama",
            "penduduk" => $penduduk,
            'qrcode' => QrCode::eye('circle')->size(200)->generate($isi)
            // format('png')->merge('/public/admin/assets/img/logo.png')->
        ];
        // dd($isi);
        return view('dashboard.penduduk.showPenduduk', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(Penduduk $penduduk)
    {
        $data = [
            'title' => 'Sinforman | Edit Data',
            'penduduk' => $penduduk
        ];

        return view('dashboard.penduduk.editPenduduk', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePendudukRequest  $request
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePendudukRequest $request, Penduduk $penduduk)
    {
        $validated = $request->validate([
            "nik" => ['required', 'min:16', 'numeric', 'unique:penduduks,nik,' . $penduduk->id],
            "nama" => "required|regex:/^[\pL\s]+$/u|min:3",
            "jenis_kelamin" => "required",
            "tempat_lahir" => "required|regex:/^[\pL\s]+$/u|min:3",
            "tgl_lahir" => "required",
            "agama" => "required",
            "pendidikan" => "required",
            "pekerjaan" => "required|regex:/^[\pL\s]+$/u|min:3",
            "status" => "required"
        ]);


        Penduduk::where('nik', $penduduk->nik)->update($validated);
        Alert::toast('Data has ben updated', 'success');
        return redirect('/penduduk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penduduk $penduduk)
    {
        Penduduk::destroy($penduduk->id);
        Alert::toast('Data has ben deleted', 'success');
        return redirect('/penduduk');
    }

    public function cetak()
    {
        $data =
            [
                'title' => 'Cetak Penduduk',
                'penduduks' => Penduduk::all(),
                'qrcode' => QrCode::eye('circle')->size(150)->generate('TTD, IMAM SYAHRONI (ALPHA 2022) SISTEM INFORMASI 2018, Untuk penduduk')
            ];

        return view('cetak.cetakPenduduk', $data);
    }
}
