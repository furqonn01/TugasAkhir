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

    <div class="card p-3">
        @if($jbts->pegawai !== 0)
        <!-- start tambah jabatan -->

        <form action="/pegawai/jabatan/edit/{{$jbts->nip_baru}}" method="post">
            {{ csrf_field()}}
            <input type="hidden" name="id_peg" value="{{$pegawai->nip_baru}}">
            <div class="row">

                <div class="col-md-12">
                    <label>Pemilik Jabatan</label>
                    <input type="text" class="form-control" value="{{$pegawai->nama}}" disabled>
                </div>
            </div>
            <div class="row mt-2">

                <div class="col-md-6">
                    <label>Jabatan</label>
                    <select name="kode_jbts" class="form-control">
                        @foreach($jabatan as $j)
                        <option value="{{$j->id_jabatan}}">{{$j->nama_jabatan}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label>No. SK</label>
                    <input type="text" name="no_sk" class="form-control" value="{{$jbts->no_sk}}">
                </div>

            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    <label> Terhitung Mulai</label>
                    <input type="date" name="tmt" class="form-control" value="{{$jbts->tmt}}">
                </div>
                <div class="col-md-6">
                    <label> Kenaikan Jabatan Berikutnya</label>
                    <input type="date" name="tmt" class="form-control" value="{{$jbts->kj_berikutnya}}">
                </div>
            </div>
            <div class="row m-3">
                <input type="submit" value="Edit" class="btn btn-primary">
            </div>
        </form>
        <!-- end tambah jabatan -->
        @else
        Belum ada data
        @endif

        <!-- end card -->
    </div>

</div>


@endsection
