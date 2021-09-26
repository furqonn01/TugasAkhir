<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\JabatanFungsional;
use App\Models\JabatanStruktural;
use App\Models\Pegawai;
use App\Models\RiwayatJabatan;
use Illuminate\Http\Request;

class RiwayatJabatanController extends Controller
{
    public function editpage($id, $id1)
    {
        $jabatan = JabatanFungsional::all();
        $pegawai = Pegawai::where('nip_baru', $id1)->first();
        $jbts = RiwayatJabatan::where('nip', $id1)->with(['pegawai', 'jabatanFungsional'])->first();
        $gol = Golongan::all();
        return view('pegawai.editjabatan', [
            'jabatan' => $jabatan,
            'pegawai' => $pegawai,
            'jbts' => $jbts,
            'gol' => $gol
        ]);

        //  return dd($hukuman);
    }
}
