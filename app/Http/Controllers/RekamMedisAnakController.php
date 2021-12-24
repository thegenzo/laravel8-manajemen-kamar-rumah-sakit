<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekamMedisAnak;
use App\Models\PasienAnak;
use App\Models\Kamar;
use App\Models\DiagnosaAnak;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Validator;

class RekamMedisAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $pasien = PasienAnak::find($id);
        $rekam = RekamMedisAnak::with('pasien_anak')->where('id_pasien_anak', $id)->get();

        return view('pages.rekammedis-anak.index', compact('rekam', 'pasien'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $rules = [
            'tensi_darah'          => 'required',
            'suhu_tubuh'           => 'required',
            'pernapasan'           => 'required',
            'nadi'                 => 'required',
            'anamnesis'            => 'required',
            'terapi'               => 'required',
        ];

        $messages = [
            'tensi_darah.required'         => 'Tensi darah wajib diisi',
            'suhu_tubuh.required'          => 'Suhu tubuh wajib diisi',
            'pernapasan.required'          => 'Pernapasan wajib diisi',
            'nadi.required'                => 'Nadi wajib diisi',
            'anamnesis.required'           => 'Anamnesis wajib diisi',
            'terapi.required'              => 'Terapi wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();
        $data['id_pasien_anak'] = $id;
        RekamMedisAnak::create($data);

        Alert::success('Berhasil', 'Rekam Medis Anak berhasil dicatat');

        return back();
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


    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        
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
