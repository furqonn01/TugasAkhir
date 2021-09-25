<?php

namespace App\Http\Controllers;

use App\Models\JabatanFungsional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class FungsionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tm.jabatanf', [
            'jbtf' => JabatanFungsional::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        DB::table('jabatan_fungsional')->insert([
            'nama_jabatan' => $request->nama_jabatan,
        ]);
        Alert::success('Sukses Tambah', 'Data berhasil ditambahkan');
        // alihkan halaman ke halaman pegawai
        return redirect('pegawai/tmjabatanf/tambah/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
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
        DB::table('jabtan_fungsional')->where('id_jabatan', $id)->delete();
        Alert::success('Sukses Hapus', 'Data berhasil Dihapus');
        return redirect('pegawai/tmjabatanf/tambah');
    }
}
