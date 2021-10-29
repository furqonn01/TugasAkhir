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
                        data-target="#ModalJabatanTambahan">Jabatan Tambahan</button>
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
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                role="tab" aria-controls="nav-profile" aria-selected="false">Tambah</a>
                            <a class="nav-item nav-link" id="nav-hapus-tab" data-toggle="tab" href="#nav-hapus"
                                role="tab" aria-controls="nav-hapus" aria-selected="false">Hapus</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <!-- start home jabatan -->
                            @if(is_null($jmlrp))
                            <div class="card p-3 mt-2">
                                Belum ada data
                            </div>
                            @else
                            @foreach ($forec as $r)
                            <div class="card mt-2 p-3">
                                <div class="row">
                                    <div class="col-md-5">
                                        Nama Jabatan
                                    </div>
                                    <div class="col-md-7">
                                        : {{$r->jabatanFungsional->nama_jabatan}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-5">
                                        No SK
                                    </div>
                                    <div class="col-md-7">
                                        : {{$r->no_sk}}
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-5">
                                        Terhitung Mulai
                                    </div>
                                    <div class="col-md-7">
                                        : {{$r->tmt}}
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-5">
                                        Kenaikan Jabatan Berikutnya
                                    </div>
                                    <div class="col-md-7">
                                        : {{$r->kj_berikutnya}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-5">
                                        Aksi
                                    </div>
                                    <div class="col-md-2">
                                        :<a class="btn btn-primary btn-sm"
                                            href="/pegawai/jabatan/editpage/{{$r->id}}/{{$r->nip}}">Edit</a>
                                    </div>
                                    <div class="col-md-3"><a class="btn btn-danger btn-sm"
                                            href="/pegawai/jabatan/unduh/{{$r->id}}">Unduh SK</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <!-- start home jabatan -->
                            <div class="card p-3">
                                <form action="/pegawai/jabatan/tambah" method="POST" enctype="multipart/form-data">
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
                                    <div class="form-row p-2">
                                        <div class="form-group col-8">
                                            <div class="mb-3">
                                                <label for="jabsk">File SK</label>
                                                <input type="file" class="form-control" name="jabsk" id="jabsk"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row m-2">
                                        <input type="submit" value="Tambah" class="btn btn-success">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-hapus" role="tabpanel" aria-labelledby="nav-hapus-tab">
                            @if(is_null($jmlrp))
                            <div class="card p-3">
                                Belum ada data jabatan
                            </div>
                            @else
                            @foreach($forec as $rjbtf)
                            <form action="/pegawai/jabatan/hapus/{{$rjbtf->id}}" method="POST"
                                enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="nip" value="{{$rjbtf->nip}}">
                                <button type="submit" class="btn btn-danger btn-sm m-2">Hapus Jabatan dgn no. sk
                                    {{$rjbtf->no_sk}}</button>
                            </form>
                            @endforeach
                            <!-- end hapus diklat -->
                            @endif
                        </div>
                    </div>
                    <!-- end home jabatan -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal jabatan -->

    <!-- start modal jabatan -->
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
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab1" data-toggle="tab" href="#nav-home1"
                                role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile1"
                                role="tab" aria-controls="nav-profile1" aria-selected="false">Tambah</a>
                            <a class="nav-item nav-link" id="nav-hapus-tab1" data-toggle="tab" href="#nav-hapus1"
                                role="tab" aria-controls="nav-hapus" aria-selected="false">Hapus</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home1" role="tabpanel"
                            aria-labelledby="nav-home-tab1">
                            <!-- start home jabatan -->
                            @if(is_null($rstruk))
                            <div class="card body mt-2 p-3">
                                Belum ada data
                            </div>
                            @else
                            @foreach ($forec2 as $r)
                            <div class="card mt-2 p-3">
                                <div class="row">
                                    <div class="col-md-5">
                                        Nama Jabatan
                                    </div>
                                    <div class="col-md-7">
                                        : {{$r->jabatanStruktural->nama_jabatan}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-5">
                                        No SK
                                    </div>
                                    <div class="col-md-7">
                                        : {{$r->no_sk}}
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-5">
                                        Terhitung Mulai
                                    </div>
                                    <div class="col-md-7">
                                        : {{$r->tmt}}
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-5">
                                        Kenaikan Jabatan Berikutnya
                                    </div>
                                    <div class="col-md-7">
                                        : {{$r->kj_berikutnya}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-5">
                                        Aksi
                                    </div>
                                    <div class="col-md-2">
                                        :<a class="btn btn-primary btn-sm"
                                            href="/pegawai/jabatans/editpage/{{$r->id}}/{{$r->nip}}">Edit</a>
                                    </div>
                                    <div class="col-md-3"><a class="btn btn-danger btn-sm"
                                            href="/pegawai/jabatans/unduh/{{$r->id}}">Unduh SK</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="tab-pane fade" id="nav-profile1" role="tabpanel" aria-labelledby="nav-profile-tab1">
                            <!-- start home jabatan -->
                            <div class="card p-3">
                                <form action="/pegawai/jabatans/tambah" method="POST" enctype="multipart/form-data">
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
                                    <div class="form-row p-2">
                                        <div class="form-group col-8">
                                            <div class="mb-3">
                                                <label for="formFile">File SK</label>
                                                <input type="file" class="form-control" name="fileSk" id="formFile"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row m-2">
                                        <input type="submit" value="Tambah" class="btn btn-success">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-hapus1" role="tabpanel" aria-labelledby="nav-hapus-tab1">
                            @if(is_null($rstruk))
                            <div class="card p-3">
                                Belum ada data jabatan
                            </div>
                            @else
                            @foreach($forec2 as $rjbtf)
                            <form action="/pegawai/jabatans/hapus/{{$rjbtf->id}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="nip" value="{{$rjbtf->nip}}">
                                <button type="submit" class="btn btn-danger btn-sm m-2">Hapus Jabatan dgn no. sk
                                    {{$rjbtf->no_sk}}</button>
                            </form>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- end home jabatan -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- start modal jabatan -->
    <div class="modal fade" id="ModalJabatanTambahan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Jabatan Tambahan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab1" data-toggle="tab" href="#nav-home2"
                                role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile2"
                                role="tab" aria-controls="nav-profile1" aria-selected="false">Tambah</a>
                            <a class="nav-item nav-link" id="nav-hapus-tab1" data-toggle="tab" href="#nav-hapus2"
                                role="tab" aria-controls="nav-hapus" aria-selected="false">Hapus</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home2" role="tabpanel"
                            aria-labelledby="nav-home-tab1">
                            <!-- start home jabatan -->
                            @if(is_null($rtam))
                            <div class="card body mt-2 p-3">
                                Belum ada data
                            </div>
                            @else
                            @foreach ($forec3 as $r)
                            <div class="card mt-2 p-3">
                                <div class="row">
                                    <div class="col-md-5">
                                        Nama Jabatan
                                    </div>
                                    <div class="col-md-7">
                                        : {{$r->jabatanTambahan->nama}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-5">
                                        No SK
                                    </div>
                                    <div class="col-md-7">
                                        : {{$r->no_sk}}
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-5">
                                        Terhitung Mulai
                                    </div>
                                    <div class="col-md-7">
                                        : {{$r->tmt}}
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-5">
                                        Kenaikan Jabatan Berikutnya
                                    </div>
                                    <div class="col-md-7">
                                        : {{$r->kj_berikutnya}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-5">
                                        Aksi
                                    </div>
                                    <div class="col-md-2">
                                        :<a class="btn btn-primary btn-sm"
                                            href="/pegawai/jabatant/editpage/{{$r->id}}/{{$r->nip}}">Edit</a>
                                    </div>
                                    <div class="col-md-3"><a class="btn btn-danger btn-sm"
                                            href="/pegawai/jabatant/unduh/{{$r->id}}">Unduh SK</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="tab-pane fade" id="nav-profile2" role="tabpanel" aria-labelledby="nav-profile-tab1">
                            <!-- start home jabatan -->
                            <div class="card p-3">
                                <form action="/pegawai/jabatant/tambah" method="POST" enctype="multipart/form-data">
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

                                    <div class="form-row p-2">
                                        <div class="form-group col-8">
                                            <div class="mb-3">
                                                <label for="formFile">File SK</label>
                                                <input type="file" class="form-control" name="fileSk" id="formFile"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row m-2">
                                        <input type="submit" value="Tambah" class="btn btn-success">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-hapus2" role="tabpanel" aria-labelledby="nav-hapus-tab1">
                            @if(is_null($forec3))
                            <div class="card p-3">
                                Belum ada data jabatan
                            </div>
                            @else
                            @foreach($forec3 as $rjbtf)
                            <form action="/pegawai/jabatant/hapus/{{$rjbtf->id}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="nip" value="{{$rjbtf->nip}}">
                                <button type="submit" class="btn btn-danger btn-sm m-2">Hapus Jabatan dgn no. sk
                                    {{$rjbtf->no_sk}}</button>
                            </form>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- end home jabatan -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal jabatan -->
    @endsection
