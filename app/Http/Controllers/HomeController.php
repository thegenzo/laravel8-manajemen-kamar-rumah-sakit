<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Pasien;
use App\Models\Diagnosa;
use App\Models\DiagnosaAnak;

class HomeController extends Controller
{
    public function index()
    {
        // gedung flamboyan
        $flamKosong = Kamar::where('gedung', 'Flamboyan')->where('status', 'kosong')->count();
        $flamTerisi = Kamar::where('gedung', 'Flamboyan')->where('status', 'terisi')->count();

        // gedung bougenville
        $bougenKosong = Kamar::where('gedung', 'Bougenville')->where('status', 'kosong')->count();
        $bougenTerisi = Kamar::where('gedung', 'Bougenville')->where('status', 'terisi')->count();

        // gedung kamboja
        $kambKosong = Kamar::where('gedung', 'Kamboja')->where('status', 'kosong')->count();
        $kambTerisi = Kamar::where('gedung', 'Kamboja')->where('status', 'terisi')->count();

        // gedung melati
        $melKosong = Kamar::where('gedung', 'Melati')->where('status', 'kosong')->count();
        $melTerisi = Kamar::where('gedung', 'Melati')->where('status', 'terisi')->count();

        $pasienAktif = Pasien::where('status_inap', 1)->get();

        // ----------- DATA UNTUK CHARTJS ------------ //
        // Status Pasien Dewasa
        $sembuh = Diagnosa::where('status_pasien', 'Sembuh')->count();
        $rujukan = Diagnosa::where('status_pasien', 'Rujukan')->count();
        $meninggal = Diagnosa::where('status_pasien', 'Meninggal')->count();

        // Status Pasien Anak
        $sembuhAnak = DiagnosaAnak::where('status_pasien', 'Sembuh')->count();
        $rujukanAnak = DiagnosaAnak::where('status_pasien', 'Rujukan')->count();
        $meninggalAnak = DiagnosaAnak::where('status_pasien', 'Meninggal')->count();

        return view('pages.home', compact('flamKosong', 'flamTerisi', 'bougenKosong', 'bougenTerisi', 'kambKosong', 'kambTerisi', 'melKosong', 'melTerisi', 'pasienAktif',
                                            'sembuh', 'rujukan', 'meninggal', 'sembuhAnak', 'rujukanAnak', 'meninggalAnak'));
    }
}
