<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrafikController extends Controller
{
    public function index()
    {
        $lk = Pegawai::where('jns_kelamin', 'L')->count();
        $pr = Pegawai::where('jns_kelamin', 'P')->count();
        $tot = Pegawai::all()->count();
        $menikah = Pegawai::where('sts_marital', 'Menikah')->count();
        $bmenikah = Pegawai::where('sts_marital', 'Belum menikah')->count();
        $aktif = Pegawai::where('status', 'Aktif')->count();
        $pensiun = Pegawai::where('status', 'Pensiun')->count();
        $pindah = Pegawai::where('status', 'Pindah')->count();
        $meninggal = Pegawai::where('status', 'Meninggal')->count();
        return view('pegawai.grafik', [
            'lk' => $lk,
            'pr' => $pr,
            'menikah' => $menikah,
            'bmenikah' => $bmenikah,
            'tot' => $tot,
            'aktif' => $aktif,
            'pensiun' => $pensiun,
            'pindah' => $pindah,
            'meninggal' => $meninggal,
        ]);
    }
}
