<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nisn', 'nama', 'kelas', 'email', 'password'];

    protected $useTimestamps = false; // Jika Anda menggunakan timestamp
}
