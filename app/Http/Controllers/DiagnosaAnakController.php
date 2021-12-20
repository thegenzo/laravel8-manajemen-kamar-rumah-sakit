<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PasienAnak;
use App\Models\Kamar;
use App\Models\DiagnosaAnak;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Validator;

class DiagnosaAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diagnosa = DiagnosaAnak::with('pasien_anak')->get();

        return view('pages.diagnosa-anak.pasienkeluar', compact('diagnosa'));
    }

    /**
     * Route untuk diagnosa akhir pasien
     */
    public function create($id)
    {
        $pasien = PasienAnak::find($id);

        return view('pages.diagnosa-anak.create', compact('pasien'));
    }

    /**
     * update status_inap pasien menjadi 0 (pasien keluar) dan update status kamar menjadi 'kosong'
     */
    public function store(Request $request, $id)
    {
        $rules = [
            'diagnosa_akhir'           => 'required',
            'status_pasien'            => 'required',
        ];

        $messages = [
            'diagnosa_akhir.required'          => 'Diagnosa Akhir wajib diisi',
            'status_pasien.required'           => 'Status Pasien wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $pasien = PasienAnak::find($id);
        $pasien->status_inap = '0'; // mengubah status pasien menjadi pasien keluar
        $pasien->save();

        $diagnosa = new DiagnosaAnak();
        $diagnosa->id_pasien_anak = $id;
        $diagnosa->diagnosa_akhir = $request->diagnosa_akhir;
        $diagnosa->obat = $request->obat;
        $diagnosa->status_pasien = $request->status_pasien; // nilainya sembuh, rujukan, atau meninggal
        $diagnosa->rs_rujukan = $request->rs_rujukan;
        $diagnosa->save();

        Alert::success('Berhasil', 'Pemeriksaan pasien anak telah selesai');

        return redirect('/pasien-anak');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
