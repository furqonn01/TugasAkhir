@extends('layouts.induk')
@section('konten')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{ $error }} <br />
                @endforeach
            </div>
            @endif
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Pegawai</h6>
        </div>
        <div class="row">
            <div class="col-2">
                <div class=" card-body">
                    <button type="button" class="btn btn-primary">
                        <a class="text-white" href="/pegawai/cetak"> Cetak PDF </a></button>
                </div>
            </div>
            <div class="col-8">
                <div class="card-body">
                    <button type="button" style="margin-right: -5rem" class="btn btn-success float-right">
                        <a class="text-white" href="/pegawai/export"> Cetak Excel </a></button>
                </div>
            </div>
            <div class="col-2">
                <div class="card-body">
                    <button type="button" class="btn btn-success float-right" data-toggle="modal"
                        data-target="#importExcel">
                        Import Excel
                    </button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post" action="/list/import" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                        </div>
                        <div class="modal-body">

                            {{ csrf_field() }}

                            <label>Pilih file excel</label>
                            <div class="form-group">
                                <input type="file" name="file" required="required">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i>
            </button>
            <p></p>
            <div class="table-responsive">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" role="grid"
                            aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" style="width: 150px;" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending">Foto</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        style="width: 150px;" aria-label="Position: activate to sort column ascending">
                                        NIP</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        style="width: 220px;" aria-label="Office: activate to sort column ascending">
                                        Nama</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        style="width: 116px;" aria-label="Office: activate to sort column ascending">
                                        Tempat, Tanggal Lahir
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        style="width: 116px;" aria-label="Office: activate to sort column ascending">
                                        Jenis Kelamin
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        style="width: 116px;" aria-label="Office: activate to sort column ascending">
                                        Usia
                                    </th>
                                    {{-- <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        style="width: 116px;" aria-label="Office: activate to sort column ascending">
                                        Pangkat
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        style="width: 116px;" aria-label="Office: activate to sort column ascending">
                                        Golongan
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        style="width: 116px;" aria-label="Office: activate to sort column ascending">
                                        Ruang
                                    </th> --}}
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        style="width: 116px;" aria-label="Office: activate to sort column ascending">
                                        No.Telp</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        style="width: 116px;" aria-label="Office: activate to sort column ascending">
                                        Aksi</th>
                            </thead>
                            <tfoot>
                            </tfoot>
                            <tbody>
                                @foreach($data as $p)
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><img src="foto/{{$p->foto}}" width="120px" /></td>
                                    <td>{{$p->nip_baru}}</td>
                                    <td>{{$p->gelar_depan}}. {{$p->nama}}, {{$p->gelar_belakang}}</td>
                                    <td>{{$p->tempat_lahir}}, {{$p->tanggal_lahir}}</td>
                                    <td>@if($p->jns_kelamin == 'L')Laki-Laki @else Perempuan @endif</td>
                                    <td>{{$p->age}} Tahun</td>
                                    {{-- <td>{{$p->golongan->pangkat}}</td>
                                    <td>{{$p->golongan->golongan}}</td>
                                    <td>{{$p->golongan->ruang}}</td> --}}
                                    <td>{{$p->telepon}}</td>
                                    <td><a class="btn btn-secondary" href="/pegawai/profile/{{$p->nip_baru}}"><i
                                                class="fa fa-list"></i></a>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#ModalEdit{{$p->nip_baru}}"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger mt-1" data-toggle="modal"
                                            data-target="#ModalDelete{{$p->nip_baru }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>


                                <!-- modal edit -->

                                <div class="modal fade" id="ModalEdit{{$p->nip_baru}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- form -->
                                                @if(count($errors) > 0)
                                                <div class="alert alert-danger">
                                                    @foreach ($errors->all() as $error)
                                                    {{ $error }} <br />
                                                    @endforeach
                                                </div>
                                                @endif
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="home-tab" data-toggle="tab"
                                                            href="#home{{$p->nip_baru}}" role="tab"
                                                            aria-controls="home{{$p->nip_baru}}"
                                                            aria-selected="true">Utama</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade show active" id="home{{$p->nip_baru}}"
                                                        role="tabpanel" aria-labelledby="home-tab{{$p->nip_baru}}">
                                                        <form action="/pegawai/edit/{{$p->nip_baru}}" method="post"
                                                            enctype="multipart/form-data">
                                                            {{csrf_field()}}

                                                            <!-- Start tab 1 -->
                                                            <div>
                                                                <p></p>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputNip">NIP</label>
                                                                    <input type="number" class="form-control"
                                                                        value="{{$p->nip_baru}}" id="inputNip"
                                                                        name="nip_baru" required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputNama">Nama</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{$p->nama}}" id="inputNama" name="nama"
                                                                        required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputNama">Gelar Depan</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{$p->gelar_depan}}" id="inputNama"
                                                                        name="gelar_depan" required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputNama">Gelar Belakang</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{$p->gelar_belakang}}" id="inputNama"
                                                                        name="gelar_belakang" required>
                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputNama">Email</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{$p->email}}" id="inputNama"
                                                                        name="email" required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputNama">NIP Lama</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{$p->nip_lama}}" id="inputNama"
                                                                        name="nip_lama" required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputTtl">Tempat</label>
                                                                    <input type="text" name="tempat_lahir"
                                                                        value="{{$p->tempat_lahir}}"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputTgl">Tgl Lahir</label>
                                                                    <input type="date" name="tanggal_lahir"
                                                                        value="{{$p->tanggal_lahir}}"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label for="inputFoto">Foto</label>
                                                                    <hr>
                                                                    <input class="input" type="file"
                                                                        class="form-control" name="foto" id="inputFoto">
                                                                    <hr>
                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputTgl">No.Telp</label>
                                                                    <input type="number" id="inputTgl" name="telepon"
                                                                        value="{{$p->telepon}}" class="form-control">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputKelamin">Jenis Kelamin</label>
                                                                    <select name="jns_kelamin" id="inputKelamin"
                                                                        class="form-control" required>
                                                                        <option>---</option>
                                                                        <option value="L" @if($p->jns_kelamin =='L')
                                                                            selected @endif>Laki-laki</option>
                                                                        <option value="P" @if($p->jns_kelamin =='P')
                                                                            selected @endif>Perempuan</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label for="inputStatus">Status Pegawai</label>
                                                                    <select name="status" id="inputStatus"
                                                                        class="form-control" required>
                                                                        <option>---</option>
                                                                        <option value="Aktif" @if($p->status ==
                                                                            "Aktif") selected @endif >Aktif</option>
                                                                        <option value="pensiun" @if($p->status
                                                                            == "Pensiun") selected @endif>
                                                                            Pensiun</option>
                                                                        <option value="pindah" @if($p->status
                                                                            == "Pindah") selected @endif>
                                                                            Pindah</option>
                                                                        <option value="meninggal" @if($p->status
                                                                            == "Meninggal") selected @endif>
                                                                            Meninggal
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="inputStatus">Pangkat</label>
                                                                    <select name="kode_gol" id="inputUser"
                                                                        class="form-control" required>
                                                                        <option>---</option>
                                                                        @foreach($gol as $g)
                                                                        <option value="{{$g->id_gol}}" @if($p->
                                                                            kode_gol == $g->id_gol) selected
                                                                            @endif>{{$g->pangkat}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <!-- form row -->
                                                            </div>

                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputKarpeg">Alamat</label>
                                                            <input type="text" value="{{$p->alamat}}" name="alamat"
                                                                id="inputKarpeg" class="form-control" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputStatus">Agama</label>
                                                            <select name="kode_agama" id="inputUser"
                                                                class="form-control" required>
                                                                <option>---</option>
                                                                @foreach($agama as $a)
                                                                <option value="{{$a->id_agama}}" @if($p->
                                                                    kode_agama == $a->id_agama) selected
                                                                    @endif>{{$a->nama}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <!-- form row -->
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputKarpeg">NIK</label>
                                                            <input type="text" value="{{$p->nik}}" name="nik"
                                                                id="inputKarpeg" class="form-control" required>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputStatus">Status Pernikahan</label>
                                                            <select name="sts_marital" id="inputUser"
                                                                class="form-control" required>
                                                                <option>---</option>
                                                                <option value="Menikah" @if($p->sts_marital ==
                                                                    'Menikah') selected @endif >Menikah</option>
                                                                <option value="Belum menikah" @if($p->sts_marital ==
                                                                    'Belum menikah') selected @endif >Belum
                                                                    menikah
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Ubah</button></form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>

                    <!--  modal delete -->

                    <div class="modal fade" id="ModalDelete{{$p->nip_baru}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Anda yakin ingin menghapus?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                    <a href="/pegawai/hapus/{{$p->nip_baru}}" class="btn btn-primary">Iya</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                    </tbody>
                    </table>
                </div>
            </div>




            <!-- Modal Tambah -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- form -->

                            <form action="/pegawai/tambah" method="POST" enctype="multipart/form-data">
                                <!-- <form action="http://127.0.0.1:8000/api/list" method="POST" enctype="multipart/form-data"> -->
                                {{ csrf_field() }}


                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                            href="#nav-home" role="tab" aria-controls="nav-home"
                                            aria-selected="true">Utama</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <!-- Tab 1 -->

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputNip">NIP</label>
                                                <input type="number" class="form-control" id="inputNip" name="nip_baru"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputNama">Nama</label>
                                                <input type="text" class="form-control" id="inputNama" name="nama"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputNama">Email</label>
                                                <input type="email" class="form-control" id="inputEmail" name="email"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputStatus">Pangkat</label>
                                                <select name="kode_gol" id="inputUser" class="form-control" required>
                                                    <option>---</option>
                                                    @foreach($gol as $g)
                                                    <option value="{{$g->id_gol}}">{{$g->pangkat}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputTtl">Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputTgl">Tanggal Lahir</label>
                                                <input type="date" name="tanggal_lahir" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputKelamin">Jenis Kelamin</label>
                                                <select name="jns_kelamin" id="inputKelamin" class="form-control"
                                                    required>
                                                    <option>---</option>
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputStatus">Status Pegawai</label>
                                                <select name="status" id="inputStatus" class="form-control" required>
                                                    <option>---</option>
                                                    <option value="Aktif">Aktif</option>
                                                    <option value="Pensiun">Pensiun</option>
                                                    <option value="Meninggal">Meninggal</option>
                                                    <option value="Pindah">Pindah</option>
                                                </select>
                                            </div>
                                            <!-- form row -->
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label for="inputFoto">Foto</label>
                                                <hr>
                                                <input class="input" type="file" class="form-control" name="foto"
                                                    id="inputFoto" required>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputNip">NIP Lama</label>
                                                <input type="number" class="form-control" id="inputNip" name="nip_lama"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputNip">NIK</label>
                                                <input type="number" class="form-control" id="inputNik" name="nik"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputStatus">Agama</label>
                                                <select name="kode_agama" id="inputUser" class="form-control" required>
                                                    <option>---</option>
                                                    @foreach($agama as $agama)
                                                    <option value="{{$agama->id_agama}}">{{$agama->nama}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputTgl">No.Telp</label>
                                                <input type="number" id="inputTelp" name="telepon" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputKarsu">Gelar Depan</label>
                                                <input type="text" name="gelar_depan" id="inputKarsu"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputAskes">Gelar Belakang</label>
                                                <input type="text" name="gelar_belakang" id="inputAskes"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-9">
                                                <label for="inputKarpeg">Alamat</label>
                                                <input type="text" name="alamat" id="inputKarpeg" class="form-control"
                                                    required>
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="inputStatus">Status Pernikahan</label>
                                                <select name="sts_marital" id="inputUser" class="form-control" required>
                                                    <option>---</option>
                                                    <option value="Menikah">Menikah</option>
                                                    <option value="Belum menikah">Belum menikah</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Tab 2 end -->

                                        <!-- Tab 1 end -->

                                    </div>
                                </div>

                                <!-- end form -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-primary">Tambah</button></form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end modal -->
        </div>

        @endsection
