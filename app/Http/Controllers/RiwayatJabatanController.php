<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\JabatanFungsional;
use App\Models\JabatanStruktural;
use App\Models\Pegawai;
use App\Models\RiwayatJabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RiwayatJabatanController extends Controller
{
    public function tambah(Request $request)
    {
        $jabatan = new RiwayatJabatan;
        $jabatan->nip = $request->nip_baru;
        $jabatan->kode_jabatan = $request->kode_jabatan;
        $jabatan->no_sk = $request->no_sk;
        $jabatan->kj_berikutnya = $request->kj_berikutnya;
        $jabatan->tmt = $request->tmt;
        $jabatan->save();

        Alert::success('Sukses Tambah', 'Data berhasil ditambahkan');
        return redirect("/pegawai/profile/$request->nip_baru");
    }
    public function editpage($id1)
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
    public function edit($id, Request $request)
    {
        DB::table('riwayat_jabatan')->where('nip', $id)->update([
            'nip' => $request->nip,
            'kode_jabatan' => $request->kode_jabatan,
            'no_sk' => $request->no_sk,
            'tmt' => $request->tmt,
            'kj_berikutnya' => $request->kj_berikutnya
        ]);
        Alert::success('Sukses Edit', 'Data berhasil di-Edit');
        return redirect("/pegawai/profile/$request->nip");
    }
}
