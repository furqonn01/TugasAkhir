<?php

namespace App\Http\Controllers;

use App\Models\JabatanTambahan;
use App\Models\Pegawai;
use App\Models\RiwayatTambahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Response;

class RiwayatJabatanTambahanController extends Controller
{
    public function tambah(Request $request)
    {
        $sk = $request->no_sk;
        $file = $request->file('fileSk');
        $tujuan_upload = 'sktam_pegawai'; //nama folder
        $file->move($tujuan_upload, $sk . '.' . $file->getClientOriginalExtension());
        $jabatan = new RiwayatTambahan();
        $jabatan->nip = $request->nip_baru;
        $jabatan->kode_tambahan = $request->kode_jabatan;
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
        $jabatan = JabatanTambahan::all();
        $pegawai = Pegawai::where('nip_baru', $id1)->first();
        $jbts = RiwayatTambahan::where('id', $id)->with(['pegawai', 'jabatanTambahan'])->first();
        return view('pegawai.editjabatanft', [
            'jabatan' => $jabatan,
            'pegawai' => $pegawai,
            'jbts' => $jbts,
        ]);

        //  return dd($hukuman);
    }
    public function edit($id, Request $request)
    {
        DB::table('riwayat_tambahan')->where('id', $id)->update([
            'nip' => $request->nip,
            'kode_tambahan' => $request->kode_jabatan,
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
        DB::table('riwayat_tambahan')->where('id', $id)->delete();

        Alert::success('Sukses Hapus', 'Data berhasil dihapus');

        // alihkan halaman ke halaman pegawai
        return redirect("/pegawai/profile/$request->nip");
    }
    public function unduh($id)
    {
        $riwayats = RiwayatTambahan::where('id', $id)->first();
        $unduh = $riwayats->file_sk;;
        $filepath = public_path('sktam_pegawai/' . $unduh);
        return Response::download($filepath);
        Alert::success('Sukses Unduh', 'File berhasil diunduh');
    }
}
