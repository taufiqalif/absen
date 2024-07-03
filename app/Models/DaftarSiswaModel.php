<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarSiswaModel extends Model
{
  protected $table      = 'daftar_siswa';
  protected $primaryKey = 'id_siswa';
  protected $useTimestamps = true;
}
