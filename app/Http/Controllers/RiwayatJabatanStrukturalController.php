<?php

namespace App\Http\Controllers;

use App\Models\JabatanStruktural;
use App\Models\Pegawai;
use App\Models\RiwayatJabatanStruktural;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RiwayatJabatanStrukturalController extends Controller
{
    public function tambah(Request $request)
    {
        $jabatan = new RiwayatJabatanStruktural;
        $jabatan->nip = $request->nip_baru;
        $jabatan->kode_struktural = $request->kode_struktural;
        $jabatan->no_sk = $request->no_sk;
        $jabatan->kj_berikutnya = $request->kj_berikutnya;
        $jabatan->tmt = $request->tmt;
        $jabatan->save();

        Alert::success('Sukses Tambah', 'Data berhasil ditambahkan');
        return redirect("/pegawai/profile/$request->nip_baru");
    }
    public function editpage($id1)
    {
        $jabatan = JabatanStruktural::all();
        $pegawai = Pegawai::where('nip_baru', $id1)->first();
        $jbts = RiwayatJabatanStruktural::where('nip', $id1)->with(['pegawai', 'jabatanStruktural'])->first();
        return view('pegawai.editjabatanf', [
            'jabatan' => $jabatan,
            'pegawai' => $pegawai,
            'jbts' => $jbts,
        ]);

        //  return dd($hukuman);
    }
    public function edit($id, Request $request)
    {
        DB::table('riwayat_struktural')->where('nip', $id)->update([
            'nip' => $request->nip,
            'kode_struktural' => $request->kode_struktural,
            'no_sk' => $request->no_sk,
            'tmt' => $request->tmt,
            'kj_berikutnya' => $request->kj_berikutnya
        ]);
        Alert::success('Sukses Edit', 'Data berhasil di-Edit');
        return redirect("/pegawai/profile/$request->nip");
    }
}
