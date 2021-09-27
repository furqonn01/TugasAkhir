<?php

namespace App\Imports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;

class PegawaiImport implements ToModel
{
    /**
     * @param Collection $collection
     */
    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }
    public function model(array $row)
    {
        return new Pegawai([
            'nip_baru' => $row[0],
            'kode_gol' => $row[17],
            'nama' => $row[1],
            'nip_lama' => $row[2],
            'email' => $row[3],
            'gelar_depan' => $row[4],
            'gelar_belakang' => $row[5],
            'npwp' => $row[6],
            'status' => $row[7],
            'jns_kelamin' => $row[8],
            'tempat_lahir' => $row[9],
            'tanggal_lahir' => $this->transformDate($row[10]),
            'kode_agama' => $row[11],
            'gol_darah' => $row[12],
            'sts_marital' => $row[13],
            'nik' => $row[14],
            'alamat' => $row[15],
            'telepon' => $row[16],
            'foto' => $row[18],
        ]);
    }
}
