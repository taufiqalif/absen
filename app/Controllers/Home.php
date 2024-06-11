<?php

namespace App\Controllers;

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
        echo view('absensi');
    }
}
