<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Pasien;
use App\Models\PasienAnak;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Validator;


class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bougenville = Kamar::where('gedung', 'bougenville')->get();
        $flamboyan = Kamar::where('gedung', 'flamboyan')->get();
        $melati = Kamar::where('gedung', 'melati')->get();
        $kamboja = Kamar::where('gedung', 'kamboja')->get();
        $kebidanan = Kamar::where('gedung', 'kebidanan')->get();

        return view('pages.kamar.index', compact('bougenville', 'flamboyan', 'melati', 'kamboja', 'kebidanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.kamar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_kamar'        => 'required',
            'gedung'            => 'required',
            'kelas'             => 'required',
            'jumlah_kasur'      => 'required|numeric',
        ];

        $messages = [
            'nama_kamar.required'       => 'Nama kamar wajib diisi',
            'gedung.required'           => 'Gedung wajib diisi',
            'kelas.required'            => 'Kelas wajib diisi',
            'jumlah_kasur.required'     => 'Jumlah Kasur wajib diisi',
            'jumlah_kasur.numeric'      => 'Jumlah Kasur harus berupa angka',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();
        $data['status'] = 'kosong'; // <----- status awal kamar masih kosong (belum ditempati oleh pasien)

        Kamar::create($data);

        Alert::success('Berhasil', 'Kamar berhasil ditambahkan');

        return redirect('/kamar');
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
        $kamar = Kamar::find($id);

        return view('pages.kamar.edit', compact('kamar'));
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
        $rules = [
            'nama_kamar'        => 'required',
            'gedung'            => 'required',
            'kelas'             => 'required',
            'jumlah_kasur'      => 'required|numeric',
        ];

        $messages = [
            'nama_kamar.required'       => 'Nama kamar wajib diisi',
            'gedung.required'           => 'Gedung wajib diisi',
            'kelas.required'            => 'Kelas wajib diisi',
            'jumlah_kasur.required'     => 'Jumlah Kasur wajib diisi',
            'jumlah_kasur.numeric'      => 'Jumlah Kasur harus berupa angka',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $kamar = Kamar::find($id);
        $data = $request->all();
        $kamar->update($data);

        Alert::success('Berhasil', 'Kamar berhasil diedit');

        return redirect('/kamar');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kamar = Kamar::find($id);
        if ($kamar->pasien()->count()) {
            Alert::error('Gagal', 'Kamar memiliki data terkait dengan pasien');
            return back();
        }
        else if ($kamar->pasien_anak()->count()) {
            Alert::error('Gagal', 'Kamar memiliki data terkait dengan pasien anak');
            return back();
        }
        else {
            $kamar->delete();

            Alert::success('Berhasil', 'Kamar berhasil dihapus');

            return redirect('/kamar');
        } 
    }

    public function lihatPasien($id)
    {
        $kamar = Kamar::find($id);
        $pasien = Pasien::where('id_kamar', $id)->where('status_inap', '1')->get();
        $pasienAnak = PasienAnak::where('id_kamar', $id)->where('status_inap', '1')->get();

        return view('pages.kamar.detail', compact('kamar', 'pasien', 'pasienAnak'));
    }
}
