<?php

namespace App\Exports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PegawaiExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Pegawai::all();
    }
    public function headings(): array
    {
        return [
            'NIP',
            'Nama',
            'NIP Lama',
            'Email',
            'Gelar Depan',
            'Gelar Belakang',
            'NPWP',
            'Status Pegawai',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Kode Agama',
            'Golongan Darah',
            'Status Marital',
            'NIK',
            'Alamat',
            'No Telepon',
            'Kode Golongan',
            'Foto',
        ];
    }
}
