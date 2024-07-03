<?php

namespace App\Controllers;

use App\Models\DaftarSiswaModel;

class Home extends BaseController
{
    protected $DaftarSiswaModel;
    public function __construct()
    {
        $this->DaftarSiswaModel = new DaftarSiswaModel();
    }
    public function index()
    {
        $daftar = $this->DaftarSiswaModel->findAll();
        $JumlahSiswa = count($daftar);
        $data = [
            'title' => 'Dashboard',
            'daftar' => $daftar,
            'jumlahsiswa' => $JumlahSiswa
        ];
        return view('index', $data);
    }

    public function siswa()
    {
        $daftar = $this->DaftarSiswaModel->findAll();
        $data = [
            'title' => 'Daftar Siswa',
            'daftar' => $daftar
        ];

        // $DaftarSiswaModel = new DaftarSiswaModel();


        return view('daftarsiswa', $data);
    }

    public function absen()
    {
        $data = [
            'title' => 'Absensi'
        ];
        return view('absensi', $data);
    }
}
