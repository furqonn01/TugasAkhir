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
                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#ModalDiklat">Diklat</button>
                    <button type="button" class="btn btn-success" data-toggle="modal"
                        data-target="#ModalGapok">Gapok</button>
                    <button type="button" class="btn btn-warning" data-toggle="modal"
                        data-target="#ModalHukuman">Hukuman</button>
                    <hr> --}}
                    <!-- row 2
                    data-toggle="modal" data-target="#ModalJabatan"
                    data-toggle="modal" data-target="#ModalJabatanfungsional"
                    data-toggle="modal" data-target="#ModalJabatanfungsionaltambahan"
                    -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalJabatan">Jabatan
                        Tambahan</button>
                    <button type="button" class="btn btn-danger">Jabatan
                        Struktural</button>
                    <button type="button" class="btn btn-info">Jabatan Fungsional</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Data Jabatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab2" data-toggle="tab" href="#nav-home2"
                                role="tab" aria-controls="nav-home2" aria-selected="true">Home</a>
                            <a class="nav-item nav-link" id="nav-profile-tab2" data-toggle="tab" href="#nav-profile2"
                                role="tab" aria-controls="nav-profile2" aria-selected="false">Tambah</a>
                            <a class="nav-item nav-link" id="nav-hapus-tab2" data-toggle="tab" href="#nav-hapus2"
                                role="tab" aria-controls="nav-hapus2" aria-selected="false">Hapus</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home2" role="tabpanel"
                            aria-labelledby="nav-home-tab2">
                            <!-- start home jabatan -->
                            <div class="card p-3">
                                @if($jmlrp->pegawai !== 0)
                                <div class="row">
                                    <div class="col-md-5">
                                        Nama Jabatan
                                    </div>
                                    <div class="col-md-7">
                                        : @foreach($jmlrp->jabatanFungsional as $rjbt)<span class="badge badge-primary">
                                            {{$rjbt->nama_jabatan}} </span> @endforeach
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-5">
                                        No SK
                                    </div>
                                    <div class="col-md-7">
                                        : <span class="badge badge-primary">
                                            {{$jmlrp->no_sk}}</span>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-5">
                                        Terhitung Mulai
                                    </div>
                                    <div class="col-md-7">
                                        : <span class="badge badge-primary">
                                            {{$jmlrp->tmt}} </span>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-5">
                                        Kenaikan Jabatan Berikutnya
                                    </div>
                                    <div class="col-md-7">
                                        : <span class="badge badge-primary">
                                            {{$jmlrp->kj_berikutnya}} </span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-5">
                                        Aksi
                                    </div>
                                    <div class="col-md-7">
                                        : <a class="btn btn-primary btn-sm"
                                            href="/pegawai/jabatan/editpage/{{$jmlrp->kode_jabatan}}/{{$pegawai->nip_baru}}">Edit</a>
                                    </div>
                                </div>
                                <hr>

                                @else
                                Belum ada data
                                @endif

                            </div>
                            <!-- end home jabatan -->
                        </div>
                        <div class="tab-pane fade" id="nav-profile2" role="tabpanel" aria-labelledby="nav-profile-tab2">

                            <div class="card p-3">
                                <!-- card -->
                                <form action="/pegawai/jabatan/tambah" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id_peg" value="{{$pegawai->nip_baru}}">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>No. SK</label>
                                            <input type="text" name="no_sk" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Tanggal SK</label>
                                            <input type="date" name="tgl_sk" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Pejabat Pengesah</label>
                                            <input type="text" name="pejabat_sk" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Jabatan Struktural</label>
                                            <select name="kod
                                    e_jbts" class="form-control">
                                                {{-- @foreach($jbts as $jb)
                                                <option value="{{$jb->kode_jbts}}">{{$jb->nama_jabatan}}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Terhitung Mulai</label>
                                            <input type="date" name="tmt" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Golongan</label>
                                            <select name="kode_gol" class="form-control">
                                                {{-- @foreach($gol as $g)
                                                <option value="{{$g->kode_gol}}">{{$g->pangkat}}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Ket</label>
                                            <input type="text" name="ket" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row m-3">
                                        <input type="submit" value="Tambah" class="btn btn-success">
                                    </div>
                                </form>
                                <!-- end card -->
                            </div>

                        </div>
                        <div class="tab-pane fade" id="nav-hapus2" role="tabpanel" aria-labelledby="nav-hapus-tab2">
                            {{-- @if($pegawai->riwayatjabatan->count() !== 0)
                            <!-- start hapus diklat -->
                            @foreach($pegawai->riwayatjabatan as $rjbt)
                            <form action="/pegawai/jabatan/hapus/{{$rjbt->id_jabatan}}" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="id_peg" value="{{$rjbt->id_peg}}">
                            <button type="submit" class="btn btn-danger btn-sm m-2">Hapus riwayat dgn no. sk
                                {{$rjbt->no_sk}}</button>
                            </form>
                            @endforeach --}}
                            <!-- end hapus diklat -->
                            {{-- @else
                            Belum ada data jabatan
                            @endif --}}
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
