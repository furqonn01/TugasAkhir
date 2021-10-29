<!DOCTYPE html>
<html lang="en">

<head>
    <title>Daftar Pegawai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div style="margin-bottom: 20px">
        <center>Profil Pegawai</center>
    </div>
    <div style="margin-top:50px">
        <center>
            <img src="{{$path}}" width="120px">
        </center>
    </div>
    <table class="table-borderless ">
        <thead>
            <tr>
                <td>
                    Nama
                </td>
                <td>: {{$pegawai->nama}}</td>
            </tr>
            <tr>
                <td>
                    NIP
                </td>
                <td>: {{$pegawai->nip_baru}}</td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td>: {{$pegawai->email}}</td>
            </tr>
            <tr>
                <td>
                    No. Telepon
                </td>
                <td>: {{$pegawai->telepon}}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>: {{$pegawai->agama->nama}}</td>
            </tr>
            <tr>
                <td>
                    Umur
                </td>
                <td>: {{$pegawai->age}} Tahun</td>
            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir </td>
                <td>: {{$pegawai->tempat_lahir}}, {{$pegawai->tanggal_lahir}}</td>
            </tr>
            <tr>
                <td>
                    NIK
                </td>
                <td>: {{$pegawai->nik}}</td>
            </tr>
            <tr>
                <td>
                    NPWP
                </td>
                <td>: {{$pegawai->npwp}}</td>
            </tr>
            <tr>
                <td>
                    Status Pegawai
                </td>
                <td>: {{$pegawai->status}}</td>
            </tr>
            <tr>
                <td>Pangkat</td>
                <td>: {{$pegawai->golongan->pangkat}}</td>
            </tr>
            <tr>
                <td>Golongan</td>
                <td>: {{$pegawai->golongan->golongan}}</td>
            </tr>
            <tr>
                <td>Ruang</td>
                <td>: {{$pegawai->golongan->ruang}}</td>
            </tr>
            <tr>
                <td>Pangkat</td>
                <td>: {{$pegawai->golongan->pangkat}}</td>
            </tr>
        </thead>
    </table>
</body>
