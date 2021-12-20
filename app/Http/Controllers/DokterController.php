<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Validator;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokter = Dokter::all();

        return view('pages.dokter.index', compact('dokter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dokter.create');
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
            'nama_dokter'          => 'required',
            'spesialis'            => 'required',
            'jadwal'               => 'required',
        ];

        $messages = [
            'nama_dokter.required'         => 'Nama dokter wajib diisi',
            'spesialis.required'           => 'Spesialis wajib diisi',
            'jadwal.required'              => 'Jadwal wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();
        $data['status'] = 1;
        Dokter::create($data);

        Alert::success('Berhasil', 'Dokter berhasil ditambahkan');

        return redirect('/dokter');
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
        $dokter = Dokter::find($id);
        return view('pages.dokter.edit', compact('dokter'));
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
            'nama_dokter'          => 'required',
            'spesialis'            => 'required',
            'jadwal'               => 'required',
        ];

        $messages = [
            'nama_dokter.required'         => 'Nama dokter wajib diisi',
            'spesialis.required'           => 'Spesialis wajib diisi',
            'jadwal.required'              => 'Jadwal wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $dokter = Dokter::find($id);
        $data = $request->all();
        $dokter->update($data);

        Alert::success('Berhasil', 'Data berhasil diubah');

        return redirect('/dokter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokter = Dokter::find($id);
        if ($dokter->pasien()->count() > 0) {
            Alert::error('Gagal', 'Dokter memiliki data terkait dengan pasien');
            return back();
        }
        else if ($dokter->pasien_anak()->count() > 0) {
            Alert::error('Gagal', 'Dokter memiliki data terkait dengan pasien anak');
            return back();
        }
        else {
            $dokter->delete();

            Alert::success('Berhasil', 'Dokter berhasil dihapus');

            return redirect('/dokter');
        }
    }
}
