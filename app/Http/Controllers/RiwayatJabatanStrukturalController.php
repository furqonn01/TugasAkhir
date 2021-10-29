<?php

namespace App\Http\Controllers;

use App\Models\JabatanStruktural;
use App\Models\Pegawai;
use App\Models\RiwayatJabatanStruktural;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RiwayatJabatanStrukturalController extends Controller
{
    public function tambah(Request $request)
    {
        $sk = $request->no_sk;
        $file = $request->file('fileSk');
        $tujuan_upload = 'sk_pegawai'; //nama folder
        $file->move($tujuan_upload, $sk . '.' . $file->getClientOriginalExtension());

        $jabatan = new RiwayatJabatanStruktural;
        $jabatan->nip = $request->nip_baru;
        $jabatan->kode_struktural = $request->kode_jabatan;
        $jabatan->no_sk = $request->no_sk;
        $jabatan->kj_berikutnya = $request->kj_berikutnya;
        $jabatan->tmt = $request->tmt;
        $jabatan->file_sk = $request->no_sk . '.' . $file->getClientOriginalExtension();
        $jabatan->save();

        Alert::success('Sukses Tambah', 'Data berhasil ditambahkan');
        return redirect("/pegawai/profile/$request->nip_baru");
    }
    public function editpage($id, $id1)
    {
        $jabatan = JabatanStruktural::all();
        $pegawai = Pegawai::where('nip_baru', $id1)->first();
        $jbts = RiwayatJabatanStruktural::where('id', $id)->with(['pegawai', 'jabatanStruktural'])->first();
        return view('pegawai.editjabatanf', [
            'jabatan' => $jabatan,
            'pegawai' => $pegawai,
            'jbts' => $jbts,
        ]);

        //  return dd($hukuman);
    }
    public function edit($id, Request $request)
    {
        DB::table('riwayat_struktural')->where('id', $id)->update([
            'nip' => $request->nip,
            'kode_struktural' => $request->kode_struktural,
            'no_sk' => $request->no_sk,
            'tmt' => $request->tmt,
            'kj_berikutnya' => $request->kj_berikutnya
        ]);
        Alert::success('Sukses Edit', 'Data berhasil di-Edit');
        return redirect("/pegawai/profile/$request->nip");
    }
    public function hapus($id, Request $request)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('riwayat_struktural')->where('id', $id)->delete();

        Alert::success('Sukses Hapus', 'Data berhasil dihapus');

        // alihkan halaman ke halaman pegawai
        return redirect("/pegawai/profile/$request->nip");
    }
    public function unduh($id)
    {
        $riwayats = RiwayatJabatanStruktural::where('id', $id)->first();
        $unduh = $riwayats->file_sk;;
        $filepath = public_path('sk_pegawai/' . $unduh);
        return Response::download($filepath);
        Alert::success('Sukses Unduh', 'File berhasil diunduh');
    }
}
