<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Pasien;
use App\Models\PasienAnak;
use App\Models\Diagnosa;
use App\Models\DiagnosaAnak;

class HomeController extends Controller
{
    public function index()
    {
        // gedung flamboyan
        $flamKosong = Kamar::where('gedung', 'Flamboyan')->where('jumlah_kasur', '>', '0')->count();
        $flamTerisi = $flamKosong - (Pasien::where('status_inap', 1)->where('gedung', 'Flamboyan')->count() + PasienAnak::where('status_inap', 1)->where('gedung', 'Flamboyan')->count());

        // gedung bougenville
        $bougenKosong = Kamar::where('gedung', 'Bougenville')->where('jumlah_kasur', '>', '0')->count();
        $bougenTerisi = $bougenKosong - (Pasien::where('status_inap', 1)->where('gedung', 'Bougenville')->count() + PasienAnak::where('status_inap', 1)->where('gedung', 'Bougenville')->count());


        // gedung kamboja
        $kambKosong = Kamar::where('gedung', 'Kamboja')->where('jumlah_kasur', '>', '0')->count();
        $kambTerisi = $kambKosong - (Pasien::where('status_inap', 1)->where('gedung', 'Kamboja')->count() + PasienAnak::where('status_inap', 1)->where('gedung', 'Kamboja')->count());


        // gedung melati
        $melKosong = Kamar::where('gedung', 'Melati')->where('jumlah_kasur', '>', '0')->count();
        $melTerisi = $melKosong - (Pasien::where('status_inap', 1)->where('gedung', 'Melati')->count() + PasienAnak::where('status_inap', 1)->where('gedung', 'Melati')->count());

        // gedung kebidanan
        $kebidKosong = Kamar::where('gedung', 'Kebidanan')->where('jumlah_kasur', '>', '0')->count();
        $kebidTerisi = $kebidKosong - (Pasien::where('status_inap', 1)->where('gedung', 'Kebidanan')->count() + PasienAnak::where('status_inap', 1)->where('gedung', 'Kebidanan')->count());


        $pasienAktif = Pasien::where('status_inap', 1)->get();
        $pasienAktifAnak = PasienAnak::where('status_inap', 1)->get();

        // ----------- DATA UNTUK CHARTJS ------------ //
        // Status Pasien Dewasa
        $sembuh = Diagnosa::where('status_pasien', 'Sembuh')->count();
        $rujukan = Diagnosa::where('status_pasien', 'Rujukan')->count();
        $meninggal = Diagnosa::where('status_pasien', 'Meninggal')->count();

        // Status Pasien Anak
        $sembuhAnak = DiagnosaAnak::where('status_pasien', 'Sembuh')->count();
        $rujukanAnak = DiagnosaAnak::where('status_pasien', 'Rujukan')->count();
        $meninggalAnak = DiagnosaAnak::where('status_pasien', 'Meninggal')->count();

        return view('pages.dashboard', compact('flamKosong', 'flamTerisi', 'bougenKosong', 'bougenTerisi', 'kambKosong', 'kambTerisi', 'melKosong', 'melTerisi', 'kebidKosong', 'kebidTerisi', 'pasienAktif',
                                            'pasienAktifAnak', 'sembuh', 'rujukan', 'meninggal', 'sembuhAnak', 'rujukanAnak', 'meninggalAnak'));
    }
}
