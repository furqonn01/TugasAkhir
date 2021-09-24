<!doctype html>
<html>

<head>
    <title>Daftar Pegawai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
    * {
        box-sizing: border-box;
    }

    /* Create two unequal columns that floats next to each other */
    .column {
        float: left;
        padding: 10px;
        height: 300px;
        /* Should be removed. Only for demonstration */
    }

    .left {
        width: 20%;
    }

    .right {
        width: 80%;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
</style>

<body>
    <center style="font-size: 15px">Profil Pegawai</center>

    <div style="row">
        <div class="column left">
            <br>
            <img src="{{$path}}" width="120px">
        </div>
        <div class="column right">
            <p>
                Nama : {{$pegawai->nama}}
                <br>
                NIP : {{$pegawai->nip_baru}}
                <br>
                Usia : {{$pegawai->age}}
                <br>
                Tempat, Tanggal Lahir : {{$pegawai->tempat_lahir}}, {{$pegawai->tanggal_lahir}}
                <br>
                Pangkat :{{$pegawai->golongan->pangkat}}
                <br>
                Golongan :{{$pegawai->golongan->golongan}}
                <br>
                Ruang :{{$pegawai->golongan->ruang}}
                <br>
                Agama :{{$pegawai->agama->nama}}
            </p>
        </div>
    </div>
</body>
