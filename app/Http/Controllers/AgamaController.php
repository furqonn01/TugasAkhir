<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tm.agama', [
            'agama' => Agama::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        DB::table('tm_agama')->insert([
            'nama' => $request->agama,
        ]);
        Alert::success('Sukses Tambah', 'Data berhasil ditambahkan');
        // alihkan halaman ke halaman pegawai
        return redirect('pegawai/tmagama/tambah/');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        DB::table('tm_agama')->where('id_agama', $id)->delete();
        Alert::success('Sukses Hapus', 'Data berhasil Dihapus');
        return redirect('pegawai/tmagama/tambah');
    }
}
