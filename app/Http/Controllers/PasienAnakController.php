<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Dokter;
use App\Models\PasienAnak;
use App\Models\DiagnosaAnak;
use App\Models\Perawat;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

use Validator;

class PasienAnakController extends Controller
{
    /**
     * Pasien masuk
     */
    public function index()
    {
        if(auth()->user()->level == 'admin') {
            $pasien = PasienAnak::where('status_inap', '1')->get();

            
            return view('pages.pasien-anak.index', compact('pasien'));
        }
        else {
            $gedung = Perawat::where('id_user', auth()->user()->id)->first()->staf_gedung;

            $pasien = PasienAnak::with('kamar')->where('gedung', $gedung)->where('status_inap', 1)->get();

            return view('pages.pasien-anak.index', compact('pasien', 'gedung'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dokter = Dokter::where('status', 1)->get();
        $kamar = Kamar::where('jumlah_kasur', '>', 0)->orderBy('gedung', 'ASC')->get();

        $kamarTersedia = Kamar::where('jumlah_kasur', '>', 0)->count();

        // generate angka acak sebanyak 8 digit untuk nomor pasien
        $nomor_pasien = mt_rand(10000000, 99999999);

        return view('pages.pasien-anak.create', compact('dokter', 'kamar', 'nomor_pasien', 'kamarTersedia'));
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
            'nama_pasien'           => 'required',
            'umur'                  => 'required|numeric',
            'ttl'                   => 'required',
            'alamat'                => 'required',
            'jenis_kelamin'         => 'required',
            'nama_kepala_keluarga'  => 'required',
            'sumber_informasi'      => 'required',
            'keluhan_utama'         => 'required',
            'riwayat_keluhan_utama' => 'required',
            'diagnosa_masuk'        => 'required',
            'jenis_pasien'          => 'required',
            'id_kamar'              => 'required',
            'id_dokter'             => 'required',

        ];

        $messages = [
            'nama_pasien.required'               => 'Nama pasien wajib diisi',
            'umur.required'                      => 'Umur wajib diisi',
            'umur.numeric'                       => 'Umur harus berupa angka',
            'ttl.required'                       => 'Tempat, Tanggal Lahir wajib diisi',
            'alamat.required'                    => 'Alamat wajib diisi',
            'jenis_kelamin.required'             => 'Jenis kelamin wajib diisi',
            'nama_kepala_keluarga.required'      => 'Nama kepala keluarga wajib diisi',
            'sumber_informasi.required'          => 'Sumber Informasi wajib diisi',
            'keluhan_utama.required'             => 'Keluhan utama wajib diisi',
            'riwayat_keluhan_utama.required'     => 'Rijayt keluhan utama wajib diisi',
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
        $data['status_inap'] = 1; // status pasien masuk
        $data['id_dokter'] = $request->id_dokter;
        $data['id_kamar'] = $request->id_kamar;
        $data['gedung'] = Kamar::where('id', $request->id_kamar)->first()->gedung;

        PasienAnak::create($data);

        Alert::success('Berhasil', 'Pasien Anak berhasil ditambahkan');

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
        $pasien = PasienAnak::find($id);

        return view('pages.pasien-anak.show', compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pasien = PasienAnak::find($id);
        $dokter = Dokter::where('status', 1)->get();
        $kamar = Kamar::where('status', 'kosong')->orderBy('gedung', 'ASC')->get();

        $kamarTersedia = Kamar::where('jumlah_kasur', '>', 0)->count();

        return view('pages.pasien-anak.edit', compact('pasien', 'dokter', 'kamar', 'kamarTersedia'));
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
            'nama_pasien'           => 'required',
            'umur'                  => 'required|numeric',
            'ttl'                   => 'required',
            'alamat'                => 'required',
            'jenis_kelamin'         => 'required',
            'nama_kepala_keluarga'  => 'required',
            'sumber_informasi'      => 'required',
            'keluhan_utama'         => 'required',
            'riwayat_keluhan_utama' => 'required',
            'diagnosa_masuk'        => 'required',
            'jenis_pasien'          => 'required',
            'id_kamar'              => 'required',
            'id_dokter'             => 'required',

        ];

        $messages = [
            'nama_pasien.required'               => 'Nama pasien wajib diisi',
            'umur.required'                      => 'Umur wajib diisi',
            'umur.numeric'                       => 'Umur harus berupa angka',
            'ttl.required'                       => 'Tempat, Tanggal Lahir wajib diisi',
            'alamat.required'                    => 'Alamat wajib diisi',
            'jenis_kelamin.required'             => 'Jenis kelamin wajib diisi',
            'nama_kepala_keluarga.required'      => 'Nama kepala keluarga wajib diisi',
            'sumber_informasi.required'          => 'Sumber Informasi wajib diisi',
            'keluhan_utama.required'             => 'Keluhan utama wajib diisi',
            'riwayat_keluhan_utama.required'     => 'Riwayat keluhan utama wajib diisi',
            'diagnosa_masuk.required'            => 'Diagnosa masuk wajib diisi',
            'jenis_pasien.required'              => 'Jenis pasien wajib diisi',
            'id_kamar.required'                  => 'Kamar wajib diisi',
            'id_dokter.required'                 => 'Dokter wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $pasien = PasienAnak::find($id);
        $data = $request->all();
        $data['status_inap'] = '1'; // pasien masuk
        $data['id_dokter'] = $request->id_dokter;
        $data['id_kamar'] = $request->id_kamar;
        $data['gedung'] = Kamar::where('id', $request->id_kamar)->first()->gedung;
        $pasien->update($data);

        Alert::success('Berhasil', 'Pasien berhasil diedit');

        return redirect('/pasien-anak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = PasienAnak::find($id);
        $pasien->delete();

        Alert::success('Berhasil', 'Pasien Anak berhasil dihapus');

        return redirect('/pasien-anak');
    }

    /**
     * Pasien keluar
     */
    public function pasienKeluar()
    {
        $diagnosa = DiagnosaAnak::all();

        return view('pages.pasien-anak.pasienkeluar', compact('diagnosa'));
    }

    public function laporanPasienMasukAnak()
    {
        $pasien = PasienAnak::where('status_inap', '1')->get();
        $waktu = Carbon::now();

        return view('pages.pasien-anak.laporan-pasien-masuk-anak', compact('pasien', 'waktu'));
    }

    public function laporanPasienKeluarAnak()
    {
        $diagnosa = DiagnosaAnak::all();
        $waktu = Carbon::now();

        return view('pages.pasien-anak.laporan-pasien-keluar-anak', compact('diagnosa', 'waktu'));
    }
}
