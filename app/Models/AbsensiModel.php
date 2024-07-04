<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model
{
    protected $table = 'absensi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'kelas', 'foto', 'created_at'];

    // Jika Anda menggunakan CodeIgniter fitur auto-timestamp
    protected $useTimestamps = false;
    protected $createdField = 'created_at';

    // Fungsi untuk menyimpan data absensi
    public function saveAttendance($data)
    {
        return $this->insert($data);
    }
}
