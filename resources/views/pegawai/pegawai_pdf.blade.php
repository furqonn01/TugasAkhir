<!DOCTYPE html>
<html>

<head>
    <title>Daftar Pegawai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td {
            font-size: 6pt;
        }

        ,
        table tr th {
            font-size: 8pt;
        }
    </style>
    <center>
        <h5>Laporan Data Pegawai
            <h6>Politeknik Negeri Semarang</h6>
        </h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Usia</th>
                <th>Agama</th>
                <th>Pangkat</th>
                <th>Gol</th>
                <th>Ruang</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No Telp</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($pegawai as $p)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{$p->gelar_depan}}. {{$p->nama}}, {{$p->gelar_belakang}}</td>
                <td>{{$p->nip_baru}}</td>
                <td>{{$p->age}} Tahun</td>
                <td> {{$p->agama->nama}} </td>
                <td>{{$p->golongan->pangkat}}</td>
                <td>{{$p->golongan->golongan}}</td>
                <td>{{$p->golongan->ruang}}</td>
                <td>@if($p->jns_kelamin == 'L')Laki-laki @else Perempuan @endif</td>
                <td>{{$p->alamat}}</td>
                <td>{{$p->telepon}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
