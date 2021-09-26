<?php

namespace App\Http\Controllers;

use App\Models\JabatanTambahan;
use App\Models\Pegawai;
use App\Models\RiwayatTambahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RiwayatJabatanTambahanController extends Controller
{
    public function tambah(Request $request)
    {
        $jabatan = new RiwayatTambahan();
        $jabatan->nip = $request->nip_baru;
        $jabatan->kode_tambahan = $request->kode_jabatan;
        $jabatan->no_sk = $request->no_sk;
        $jabatan->kj_berikutnya = $request->kj_berikutnya;
        $jabatan->tmt = $request->tmt;
        $jabatan->save();

        Alert::success('Sukses Tambah', 'Data berhasil ditambahkan');
        return redirect("/pegawai/profile/$request->nip_baru");
    }
    public function editpage($id1)
    {
        $jabatan = JabatanTambahan::all();
        $pegawai = Pegawai::where('nip_baru', $id1)->first();
        $jbts = RiwayatTambahan::where('nip', $id1)->with(['pegawai', 'jabatanTambahan'])->first();
        return view('pegawai.editjabatanft', [
            'jabatan' => $jabatan,
            'pegawai' => $pegawai,
            'jbts' => $jbts,
        ]);

        //  return dd($hukuman);
    }
    public function edit($id, Request $request)
    {
        DB::table('riwayat_tambahan')->where('nip', $id)->update([
            'nip' => $request->nip,
            'kode_tambahan' => $request->kode_jabatan,
            'no_sk' => $request->no_sk,
            'tmt' => $request->tmt,
            'kj_berikutnya' => $request->kj_berikutnya
        ]);
        Alert::success('Sukses Edit', 'Data berhasil di-Edit');
        return redirect("/pegawai/profile/$request->nip");
    }
}
