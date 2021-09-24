<?php

namespace App\Imports;
use App\ListPegawai;
use Illuminate\Support\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class PegawaiImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new ListPegawai([
                'nip'=>$row[1],
                'nama'=>$row[2],
                'nip_lama'=>$row[3],
                't_lahir'=>$row[4],
		        'tgl_lahir'=>$row[5],
                'jns_kelamin'=>$row[6],
                'kode_agama'=>$row[7],
                'sts_marital'=>$row[8],
                'kode_pdd'=>$row[9],
                'nama_sekolah'=>$row[10],
                'tahun_sttb'=>$row[11],
                'gelar_depan'=>$row[12],
                'gelar_belakang'=>$row[13],
                'hobi'=>$row[14],
                'sts_pegawai'=>$row[15],
                'id_user'=>$row[16],
                'kode_gol'=>$row[17],
                'tmt'=>$row[18],
                'kode_jbts'=>$row[19],
                'tmt_jab'=>$row[20],
                'no_telp'=>$row[21],
                'foto'=>$row[22],
            ]);
    }
}
