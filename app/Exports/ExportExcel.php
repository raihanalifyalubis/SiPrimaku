<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportExcel implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $data;
    public function __construct($data)
    {
        return $this->data = $data;
    }

    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        return ["Nomor", "Username", "Password", "Nama Lengkap", "NIM", "Jenis Kelamin", "Program Studi", "Semester", "Tanggal Mulai", "Tanggal Akhir"];
    }
}
