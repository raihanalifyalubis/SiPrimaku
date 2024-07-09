<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    private $rows = 0;
    private $all_row = -1;
    private $num_rows = [];
    private $usernames = [];

    public function model(array $row)
    {
        ++$this->all_row;
        if (!array_filter($row)) {
            return null;
        }
        array_push($this->num_rows, $this->all_row);
        ++$this->rows;
        $username = rand(1000000000, 9999999999);
        array_push($this->usernames, $username);
        return new Mahasiswa([
            'username' => $username,
            'password' => md5($username),
            'nama'     => $row['nama_lengkap'],
            'nim'      => $row['nim'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'program_studi'     => $row['program_studi'],
            'semester' => $row['semester'],
            'status' => 'aktif',
            'tanggal_mulai' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(intval($row['tanggal_awal'])),
            'tanggal_akhir' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(intval($row['tanggal_awal']) + 30),
            'id_pembimbing' => session('idUser')
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }

    public function getNotNullRow()
    {
        return $this->num_rows;
    }

    public function getUsername()
    {
        return $this->usernames;
    }
}
