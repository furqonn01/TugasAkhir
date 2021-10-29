<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\JabatanStruktural;
use App\Models\Pegawai;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\PegawaiExport;
use App\Imports\PegawaiImport;
use App\Models\Golongan;
use App\Models\JabatanFungsional;
use App\Models\JabatanTambahan;
use App\Models\RiwayatJabatan;
use App\Models\RiwayatJabatanStruktural;
use App\Models\RiwayatTambahan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now("Asia/Jakarta");
        return view('pegawai.list', [
            'data' => Pegawai::all(),
            'user' => User::all(),
            'agama' => Agama::all(),
            'gol' => Golongan::all(),
            'now' => $now,
            'jbts' => JabatanStruktural::all()
        ]);
    }

    public function profile($id)
    {
        $pegawai = Pegawai::where('nip_baru', $id)->with([
            'agama',
            'golongan',
            'riwayatJabatan',
        ])->first();
        $riwayat = RiwayatJabatan::where('nip', $id)->with([
            'pegawai',
            'jabatanFungsional'
        ])->latest()->first();
        $rwyt = RiwayatJabatan::where('nip', $id)->get();
        $rwyt2 = RiwayatJabatanStruktural::where('nip', $id)->get();
        $rwyt3 = RiwayatTambahan::where('nip', $id)->get();
        $riwayats = RiwayatJabatanStruktural::where('nip', $id)->with([
            'pegawai',
            'jabatanStruktural'
        ])->first();
        $riwayatt = RiwayatTambahan::where('nip', $id)->with([
            'pegawai',
            'jabatanTambahan'
        ])->first();
        $jab = JabatanFungsional::all();
        $jabs = JabatanStruktural::all();
        $jabt = JabatanTambahan::all();
        //  alihkan halaman ke halaman pegawai
        // return $riwayat;
        return view('pegawai.profile', [
            'pegawai' => $pegawai,
            'jmlrp' => $riwayat,
            'rstruk' => $riwayats,
            'rtam' => $riwayatt,
            'forec' => $rwyt,
            'forec2' => $rwyt2,
            'forec3' => $rwyt3,
            'jab' => $jab,
            'jabs' => $jabs,
            'jabt' => $jabt
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'foto' => 'required',
            'nip_baru' => 'required',
            'nama' => 'required',
            'jns_kelamin' => 'required',
            'sts_marital' => 'required',
            'status' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'telepon' => 'required',
            'nip_lama' => 'required', //tab 2
            'kode_agama' => 'required',
            'nik' => 'required',
            'gelar_depan' => 'required',
            'gelar_belakang' => 'required',
            'email' => 'required',
        ]);
        $nip = $request->nip_baru;
        $file = $request->file('foto');
        $tujuan_upload = 'foto'; //nama folder
        $file->move($tujuan_upload, $nip . '.' . $file->getClientOriginalExtension());
        // insert data ke table pegawai
        DB::table('pegawai')->insert([
            'nip_baru' => $request->nip_baru,
            'nama' => $request->nama,
            'email' => $request->email,
            'nik' => $request->nik,
            'npwp' => $request->npwp,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'telepon' => $request->telepon,
            'jns_kelamin' => $request->jns_kelamin,
            'status' => $request->status,
            'foto' => $request->nip_baru . '.' . $file->getClientOriginalExtension(),
            'nip_lama' => $request->nip_lama,
            'kode_agama' => $request->kode_agama,
            'kode_gol' => $request->kode_gol,
            'gelar_depan' => $request->gelar_depan,
            'gelar_belakang' => $request->gelar_belakang,
            'alamat' => $request->alamat,
            'sts_marital' => $request->sts_marital,

        ]);
        Alert::success('Sukses Tambah', 'Data berhasil ditambahkan');
        // alihkan halaman ke halaman pegawai
        return redirect('/list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $pegawai = Pegawai::with(['agama', 'golongan'])->orderBy('nip_baru', 'DESC')->limit(5)->get();
        $now = Carbon::now("Asia/Jakarta");
        $total_pegawai = Pegawai::all()->count();
        $total_user = User::all()->count();
        $lk = Pegawai::where('jns_kelamin', 'L')->count();
        $pr = Pegawai::where('jns_kelamin', 'P')->count();
        return view('pegawai.index', [
            'pegawai' => $pegawai,
            'total_pegawai' => $total_pegawai,
            'total_user' => $total_user,
            'lk' => $lk,
            'pr' => $pr,
            'now' => $now
        ]);
        // return dd($peg);
        // return response()->json(['data' => $pegawai]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $this->validate($request, [
            'foto' => 'required',
            'nip_baru' => 'required',
            'nama' => 'required',
            'jns_kelamin' => 'required',
            'sts_marital' => 'required',
            'status' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'telepon' => 'required',
            'nip_lama' => 'required', //tab 2
            'kode_agama' => 'required',
            'nik' => 'required',
            'gelar_depan' => 'required',
            'gelar_belakang' => 'required',
            'email' => 'required',

        ]);

        $nip = $request->nip_baru;
        $file = $request->file('foto');
        $tujuan_upload = 'foto'; //nama folder
        $file->move($tujuan_upload, $nip . '.' . $file->getClientOriginalExtension());

        // insert data ke table pegawai
        DB::table('pegawai')->where('nip_baru', $id)->update([
            'nip_baru' => $request->nip_baru,
            'nama' => $request->nama,
            'email' => $request->email,
            'nik' => $request->nik,
            'npwp' => $request->npwp,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'telepon' => $request->telepon,
            'jns_kelamin' => $request->jns_kelamin,
            'status' => $request->status,
            'foto' => $request->nip_baru . '.' . $file->getClientOriginalExtension(),
            'nip_lama' => $request->nip_lama,
            'kode_agama' => $request->kode_agama,
            'kode_gol' => $request->kode_gol,
            'gelar_depan' => $request->gelar_depan,
            'gelar_belakang' => $request->gelar_belakang,
            'alamat' => $request->alamat,
            'sts_marital' => $request->sts_marital,
        ]);
        Alert::success('Sukses Edit', 'Data berhasil di-Edit');
        // alihkan halaman ke halaman pegawai
        return redirect('/list');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        DB::table('pegawai')->where('nip_baru', $id)->delete();

        Alert::success('Sukses Hapus', 'Data berhasil Dihapus');
        // alihkan halaman ke halaman pegawai
        return redirect('/list');
    }
    public function cetak()
    {
        $pegawai = Pegawai::all();
        $now = Carbon::now("Asia/Jakarta");

        $pdf = PDF::loadview('pegawai.pegawai_pdf', ['pegawai' => $pegawai, 'now' => $now]);
        // return $pdf->download('laporan-pegawai-pdf');
        return $pdf->stream();
    }
    public function cetakProfile($id)
    {
        $pegawai = Pegawai::where('nip_baru', $id)->with([
            'agama',
            'golongan',
        ])->first();
        $foto = $pegawai->foto;
        $path = public_path('foto/' . $foto);

        $pdf = PDF::loadview('pegawai.profile_cetak', ['pegawai' => $pegawai, 'path' => $path]);
        // return $pdf->download('laporan-pegawai-pdf');
        return $pdf->stream();
    }
    public function export()
    {
        return Excel::download(new PegawaiExport, 'pegawai.xlsx');
    }
    public function import(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_pegawai di dalam folder public
        $file->move('file_pegawai', $nama_file);

        // import data
        Excel::import(new PegawaiImport, public_path('/file_pegawai/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Data Pegawai Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect('/list');
    }
}
