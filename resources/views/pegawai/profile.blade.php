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
                    <button type="button" class="btn btn-danger">Jabatan Tambahan</button>
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
    @endsection
