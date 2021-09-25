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
        return view('pegawai.list', [
            'data' => Pegawai::all(),
            'user' => User::all(),
            'agama' => Agama::all(),
            'gol' => Golongan::all(),
            'jbts' => JabatanStruktural::all()
        ]);
    }

    public function profile($id)
    {
        $pegawai = Pegawai::where('nip_baru', $id)->with([
            'agama',
            'golongan',
        ])->first();
        //  alihkan halaman ke halaman pegawai
        //  return dd($pegawai);
        return view('pegawai.profile', [
            'pegawai' => $pegawai,
        ]);
        //return dd($pegawai);
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

        $total_pegawai = Pegawai::all()->count();
        $total_user = User::all()->count();
        $lk = Pegawai::where('jns_kelamin', 'L')->count();
        $pr = Pegawai::where('jns_kelamin', 'P')->count();
        return view('pegawai.index', [
            'pegawai' => $pegawai,
            'total_pegawai' => $total_pegawai,
            'total_user' => $total_user,
            'lk' => $lk,
            'pr' => $pr
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

        $pdf = PDF::loadview('pegawai.pegawai_pdf', ['pegawai' => $pegawai]);
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
}
