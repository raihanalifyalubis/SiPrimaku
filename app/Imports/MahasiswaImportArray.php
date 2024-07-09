<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;

class MahasiswaImportArray implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    private $rows = 0;
    private $all_row = 0;
    private $num_rows = [];
    private $usernames = [];

    public function model(array $row)
    {
        if (!array_filter($row)) {
            return null;
        }
        ++$this->rows;
        $username = rand(1000000000, 9999999999);
        array_push($this->usernames, $username);
        array_push($this->num_rows, $this->all_row);
        ++$this->all_row;
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
