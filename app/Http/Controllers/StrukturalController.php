<?php

namespace App\Http\Controllers;

use App\Models\JabatanStruktural;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class StrukturalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jbts = JabatanStruktural::all();
        return view('tm.jabatans', ['jbts' => $jbts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        DB::table('jabatan_struktural')->insert([
            'nama_jabatan' => $request->nama_jabatan,
        ]);
        Alert::success('Sukses Tambah', 'Data berhasil ditambahkan');
        // alihkan halaman ke halaman pegawai
        return redirect('pegawai/tmjabatans/tambah/');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        DB::table('jabatan_struktural')->where('id_struktural', $id)->delete();
        Alert::success('Sukses Hapus', 'Data berhasil Dihapus');
        return redirect('pegawai/tmjabatans/tambah');
    }
}
