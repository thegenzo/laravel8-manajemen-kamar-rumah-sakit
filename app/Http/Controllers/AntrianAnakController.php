<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AntrianAnak;
use App\Models\PasienAnak;
use App\Models\Kamar;
use App\Models\Dokter;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Validator;

class AntrianAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $antrian = AntrianAnak::orderBy('created_at', 'ASC')->get();

        return view('pages.antrian-anak.index', compact('antrian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.antrian-anak.create');
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
            'nama_pasien'          => 'required',
            'umur'                 => 'required|numeric',
            'ttl'                  => 'required',
            'alamat'               => 'required',
            'no_hp'                => 'required|numeric',
            'jenis_kelamin'        => 'required',
            'nama_kepala_keluarga' => 'required',
            'diagnosa_masuk'       => 'required',
            'jenis_pasien'         => 'required',

        ];

        $messages = [
            'nama_pasien.required'               => 'Nama pasien wajib diisi',
            'umur.required'                      => 'Umur wajib diisi',
            'umur.numeric'                       => 'Umur harus berupa angka',
            'ttl.required'                       => 'Tempat, Tanggal Lahir wajib diisi',
            'alamat.required'                    => 'Alamat wajib diisi',
            'no_hp.required'                     => 'Nomor yang bisa diisi wajib diisi',
            'no_hp.numeric'                      => 'Nomor yang bisa diisi harus berupa angka',
            'jenis_kelamin.required'             => 'Jenis kelamin wajib diisi',
            'nama_kepala_keluarga.required'      => 'Nama kepala keluarga wajib diisi',
            'diagnosa_masuk.required'            => 'Diagnosa masuk wajib diisi',
            'jenis_pasien.required'              => 'Jenis pasien wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();

        AntrianAnak::create($data); 

        Alert::success('Berhasil', 'Antrian Pasien Berhasil Ditambahkan');

        return redirect('/antrian-anak');
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
     * function untuk memasukkan pasien yang mengantri ke kamar pasien (pasien masuk)
     */
    public function edit($id)
    {
        $antrian = AntrianAnak::find($id);
        $kamar = Kamar::where('status', 'kosong')->get();
        $dokter = Dokter::all();

        $kamarTersedia = Kamar::where('status', 'kosong')->count();

        // generate angka acak sebanyak 8 digit untuk nomor pasien
        $nomor_pasien = mt_rand(10000000, 99999999);

        return view('pages.antrian-anak.edit', compact('antrian', 'nomor_pasien', 'kamar', 'dokter' , 'kamarTersedia'));
    }

    /**
     * mengirim data dari tabel antrian ke tabel pasien
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'nama_pasien'          => 'required',
            'umur'                 => 'required|numeric',
            'ttl'                  => 'required',
            'alamat'               => 'required',
            'jenis_kelamin'        => 'required',
            'nama_kepala_keluarga' => 'required',
            'diagnosa_masuk'       => 'required',
            'jenis_pasien'         => 'required',
            'id_kamar'             => 'required',
            'id_dokter'            => 'required',

        ];

        $messages = [
            'nama_pasien.required'               => 'Nama pasien wajib diisi',
            'umur.required'                      => 'Umur wajib diisi',
            'umur.numeric'                       => 'Umur harus berupa angka',
            'ttl.required'                       => 'Tempat, Tanggal Lahir wajib diisi',
            'alamat.required'                    => 'Alamat wajib diisi',
            'jenis_kelamin.required'             => 'Jenis kelamin wajib diisi',
            'nama_kepala_keluarga.required'      => 'Nama kepala keluarga wajib diisi',
            'diagnosa_masuk.required'            => 'Diagnosa masuk wajib diisi',
            'jenis_pasien.required'              => 'Jenis pasien wajib diisi',
            'id_kamar.required'                  => 'Kamar wajib diisi',
            'id_dokter.required'                 => 'Dokter wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();
        $data['nomor_pasien'] = $request->nomor_pasien;
        $data['status_inap'] = 1; // status pasien masuk
        $data['id_dokter'] = $request->id_dokter;
        $data['id_kamar'] = $request->id_kamar;
        $data['gedung'] = Kamar::where('id', $request->id_kamar)->first()->gedung;

        PasienAnak::create($data);  // dan menambahkan calon pasien ke dalam status pasien (pasien masuk) 
        AntrianAnak::where('id', $id)->delete(); // menghapus calon pasien dari data antrian

        Kamar::where('id', $request->id_kamar)->update(['status' => 'terisi']); // mengupdate data kamar kalau kamar yang terpilih sudah terisi

        Alert::success('Berhasil', 'Status pasien antri anak telah diubah ke pasien masuk anak');

        return redirect('/antrian-anak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $antrian = AntrianAnak::find($id);
        $antrian->delete();

        Alert::success('Berhasil', 'Antrian anak berhasil dihapus');

        return redirect('/antrian-anak');
    }
}
