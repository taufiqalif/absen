<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarSiswaModel extends Model
{
  protected $table = 'daftar_siswa';
  protected $primaryKey = 'id_siswa';
  protected $useTimestamps = true;

  // Allow these fields to be set via save()
  protected $allowedFields = ['nis', 'nama', 'kelas'];

  // Set validation rules if needed
  protected $validationRules = [
    'nis' => 'required|is_unique[daftar_siswa.nis]',
    'nama' => 'required',
    'kelas' => 'required'
  ];

  // Optionally, you can define custom error messages
  protected $validationMessages = [
    'nis' => [
      'required' => 'NIS is required',
      'is_unique' => 'NIS must be unique'
    ],
    'nama' => [
      'required' => 'Nama Siswa is required'
    ],
    'kelas' => [
      'required' => 'Kelas is required'
    ]
  ];
}
