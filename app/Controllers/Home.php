<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\AttendanceModel;

class Home extends BaseController
{
    public function index()
    {
        // return view('dashboard/halaman');
        echo view('index');
    }


    public function siswa()
    {
        echo view('daftarsiswa');
    }

    public function absen()
    {

        // Render the absensi view
        echo view('absensi');
    }
}
