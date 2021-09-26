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
    @if ($message = Session::get('alert-success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">{{$pegawai->nama}}</h6>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="card-body float-left">
                            <img src="../../foto/{{$pegawai->foto}}" width="180px" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-body">
                            <i class="fa fa-address-card"></i> {{$pegawai->nip_baru}}
                            <hr>
                            <i class="fa fa-phone"></i> {{$pegawai->telepon}}
                            <hr>
                            <i class="fa fa-envelope"></i> {{$pegawai->email}}
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Aksi</h6>
                </div>
                <div class="card-body">
                    <!-- row 2
                    data-toggle="modal" data-target="#ModalJabatan"
                    data-toggle="modal" data-target="#ModalJabatanfungsional"
                    data-toggle="modal" data-target="#ModalJabatanfungsionaltambahan"
                    -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalJabatan">Jabatan
                        Fungsional</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#ModalJabatanStruktural">Jabatan
                        Struktural</button>
                    <button type="button" class="btn btn-info" data-toggle="modal"
                        data-target="#ModalJabatanfungsionaltambahan">Jabatan Tambahan</button>
                    <hr>
                    <button type="button" class="btn btn-success">
                        <a class="text-white" href="/pegawai/cetak_profil/{{$pegawai->nip_baru}}"> Cetak PDF
                        </a></button>
                </div>
            </div>
        </div>

        <!-- row -->
    </div>


    <div class="row">
        <div class="col">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                    aria-labelledby="v-pills-home-tab">

                    <div class="col">
                        <div class="card shadow mb-4 pl-5 pt-5 pr-5">

                            <!-- row 1 -->
                            <div class="row">
                                <div class="col-md-4"> NIP
                                </div>
                                <div class="col-md-8"> : {{$pegawai->nip_baru}}
                                </div>
                            </div>
                            <hr>

                            <!-- row 2 -->

                            <div class="row">
                                <div class="col-md-4"> Nama
                                </div>
                                <div class="col-md-8"> : {{$pegawai->nama}}
                                </div>
                            </div>
                            <hr>

                            <!-- row 3 -->

                            <div class="row">
                                <div class="col-md-4"> Tempat, Tanggal Lahir
                                </div>
                                <div class="col-md-8"> : {{$pegawai->tempat_lahir}}, {{$pegawai->tanggal_lahir}}
                                </div>
                            </div>
                            <hr>

                            <!-- row 4 -->

                            <div class="row">
                                <div class="col-md-4"> Agama
                                </div>
                                <div class="col-md-8"> : {{$pegawai->agama->nama}}
                                </div>
                            </div>
                            <hr>

                            <!-- row 5 -->

                            <div class="row">
                                <div class="col-md-4"> Jenis Kelamin
                                </div>
                                <div class="col-md-8"> : @if($pegawai->jns_kelamin == 'L') Laki-laki @else Perempuan
                                    @endif
                                </div>
                            </div>
                            <hr>


                            <div class="row">
                                <div class="col-md-4"> NPWP
                                </div>
                                <div class="col-md-8"> : {{$pegawai->npwp}}
                                </div>
                            </div>
                            <hr>



                            <div class="row">
                                <div class="col-md-4"> NIK
                                </div>
                                <div class="col-md-8"> : {{$pegawai->nik}}
                                </div>
                            </div>
                            <hr>

                            <!-- row 6 -->

                            <div class="row">
                                <div class="col-md-4"> Usia
                                </div>
                                <div class="col-md-8"> : {{$pegawai->age}}
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-4"> Pangkat
                                </div>
                                <div class="col-md-8"> : {{$pegawai->golongan->pangkat}}
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-4"> Golongan
                                </div>
                                <div class="col-md-8"> : {{$pegawai->golongan->golongan}}
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-4"> Ruang
                                </div>
                                <div class="col-md-8"> : {{$pegawai->golongan->ruang}}
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-4"> Alamat
                                </div>
                                <div class="col-md-8"> : {{$pegawai->alamat}}
                                </div>
                            </div>
                            <hr>

                            <!-- row 7 -->

                            <div class="row">
                                <div class="col-md-4"> Status Pernikahan
                                </div>
                                <div class="col-md-8"> : {{$pegawai->sts_marital}}
                                </div>
                            </div>
                            <hr>

                            <!-- row 8 -->

                            <div class="row">
                                <div class="col-md-4"> Status Kepegawaian
                                </div>
                                <div class="col-md-8"> : {{$pegawai->status}}
                                </div>
                            </div>
                            <hr>

                            <!-- row 10 -->

                            <div class="row">
                                <div class="col-md-4"> No. Telp
                                </div>
                                <div class="col-md-8"> : {{$pegawai->telepon}}
                                </div>
                            </div>
                            <br>
                            <!-- card shadow -->
                        </div>
                        <!-- col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- start modal jabatan -->
    <div class="modal fade" id="ModalJabatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Jabatan Fungsional</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home2" role="tabpanel"
                            aria-labelledby="nav-home-tab2">
                            <!-- start home jabatan -->
                            @if(is_null($jmlrp))
                            <form action="/pegawai/jabatan/tambah" method="POST">
                                {{csrf_field()}}

                                <input type="hidden" name="nip_baru" value="{{$pegawai->nip_baru}}">

                                <div class="form-row p-2">
                                    <div class="col-md-6">
                                        <label>No SK</label>
                                        <input type="text" name="no_sk" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Jabatan</label>
                                        <select name="kode_jabatan" class="form-control">
                                            <option value="">--</option>
                                            @foreach($jab as $j)
                                            <option value="{{$j->id_jabatan}}">{{$j->nama_jabatan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- form-row -->
                                </div>

                                <div class="form-row p-2">
                                    <div class="col-md-6">
                                        <label>Terhitung Mulai</label>
                                        <input type="date" name="tmt" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Naik Selanjutnya</label>
                                        <input type="date" name="kj_berikutnya" class="form-control">
                                    </div>
                                    <!-- form-row -->
                                </div>
                                <div class="form-row m-2">
                                    <input type="submit" value="Tambah" class="btn btn-success">
                                </div>
                            </form>

                            @else
                            <div class="card p-3">
                                <div class="row">
                                    <div class="col-md-5">
                                        Nama Jabatan
                                    </div>
                                    <div class="col-md-7">
                                        : {{$jmlrp->jabatanFungsional->nama_jabatan}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-5">
                                        No SK
                                    </div>
                                    <div class="col-md-7">
                                        : {{$jmlrp->no_sk}}
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-5">
                                        Terhitung Mulai
                                    </div>
                                    <div class="col-md-7">
                                        : {{$jmlrp->tmt}}
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-5">
                                        Kenaikan Jabatan Berikutnya
                                    </div>
                                    <div class="col-md-7">
                                        : {{$jmlrp->kj_berikutnya}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-5">
                                        Aksi
                                    </div>
                                    <div class="col-md-6">
                                        :<a class="btn btn-primary btn-sm"
                                            href="/pegawai/jabatan/editpage/{{$jmlrp->pegawai->nip_baru}}">Edit</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!-- end home jabatan -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal jabatan -->

    <div class="modal fade" id="ModalJabatanStruktural" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Jabatan Struktural</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home2" role="tabpanel"
                            aria-labelledby="nav-home-tab2">
                            <!-- start home jabatan -->
                            @if(is_null($rstruk))
                            <form action="/pegawai/jabatans/tambah" method="POST">
                                {{csrf_field()}}

                                <input type="hidden" name="nip_baru" value="{{$pegawai->nip_baru}}">

                                <div class="form-row p-2">
                                    <div class="col-md-6">
                                        <label>No SK</label>
                                        <input type="text" name="no_sk" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Jabatan</label>
                                        <select name="kode_struktural" class="form-control">
                                            <option value="">--</option>
                                            @foreach($jabs as $j)
                                            <option value="{{$j->id_struktural}}">{{$j->nama_jabatan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- form-row -->
                                </div>

                                <div class="form-row p-2">
                                    <div class="col-md-6">
                                        <label>Terhitung Mulai</label>
                                        <input type="date" name="tmt" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Naik Selanjutnya</label>
                                        <input type="date" name="kj_berikutnya" class="form-control">
                                    </div>
                                    <!-- form-row -->
                                </div>
                                <div class="form-row m-2">
                                    <input type="submit" value="Tambah" class="btn btn-success">
                                </div>
                            </form>

                            @else
                            <div class="card p-3">
                                <div class="row">
                                    <div class="col-md-5">
                                        Nama Jabatan
                                    </div>
                                    <div class="col-md-7">
                                        : {{$rstruk->jabatanStruktural->nama_jabatan}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-5">
                                        No SK
                                    </div>
                                    <div class="col-md-7">
                                        : {{$rstruk->no_sk}}
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-5">
                                        Terhitung Mulai
                                    </div>
                                    <div class="col-md-7">
                                        : {{$rstruk->tmt}}
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-5">
                                        Kenaikan Jabatan Berikutnya
                                    </div>
                                    <div class="col-md-7">
                                        : {{$rstruk->kj_berikutnya}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-5">
                                        Aksi
                                    </div>
                                    <div class="col-md-6">
                                        :<a class="btn btn-primary btn-sm"
                                            href="/pegawai/jabatans/editpage/{{$rstruk->pegawai->nip_baru}}">Edit</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!-- end home jabatan -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal jabatan -->

    <div class="modal fade" id="ModalJabatanfungsionaltambahan" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Jabatan Struktural</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home2" role="tabpanel"
                            aria-labelledby="nav-home-tab2">
                            <!-- start home jabatan -->
                            @if(is_null($rtam))
                            <form action="/pegawai/jabatant/tambah" method="POST">
                                {{csrf_field()}}

                                <input type="hidden" name="nip_baru" value="{{$pegawai->nip_baru}}">

                                <div class="form-row p-2">
                                    <div class="col-md-6">
                                        <label>No SK</label>
                                        <input type="text" name="no_sk" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Jabatan</label>
                                        <select name="kode_jabatan" class="form-control">
                                            <option value="">--</option>
                                            @foreach($jabt as $j)
                                            <option value="{{$j->id_tambahan}}">{{$j->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- form-row -->
                                </div>

                                <div class="form-row p-2">
                                    <div class="col-md-6">
                                        <label>Terhitung Mulai</label>
                                        <input type="date" name="tmt" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Naik Selanjutnya</label>
                                        <input type="date" name="kj_berikutnya" class="form-control">
                                    </div>
                                    <!-- form-row -->
                                </div>
                                <div class="form-row m-2">
                                    <input type="submit" value="Tambah" class="btn btn-success">
                                </div>
                            </form>

                            @else
                            <div class="card p-3">
                                <div class="row">
                                    <div class="col-md-5">
                                        Nama Jabatan
                                    </div>
                                    <div class="col-md-7">
                                        : {{$rtam->jabatanTambahan->nama}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-5">
                                        No SK
                                    </div>
                                    <div class="col-md-7">
                                        : {{$rtam->no_sk}}
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-5">
                                        Terhitung Mulai
                                    </div>
                                    <div class="col-md-7">
                                        : {{$rtam->tmt}}
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-5">
                                        Kenaikan Jabatan Berikutnya
                                    </div>
                                    <div class="col-md-7">
                                        : {{$rtam->kj_berikutnya}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-5">
                                        Aksi
                                    </div>
                                    <div class="col-md-6">
                                        :<a class="btn btn-primary btn-sm"
                                            href="/pegawai/jabatant/editpage/{{$rtam->pegawai->nip_baru}}">Edit</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!-- end home jabatan -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal jabatan -->
    @endsection
