<?php

namespace App\Controllers;

use App\Models\DaftarSiswaModel;
use App\Models\AbsensiModel;

class Home extends BaseController
{
    protected $DaftarSiswaModel;
    protected $AbsensiModel;

    public function __construct()
    {
        $this->DaftarSiswaModel = new DaftarSiswaModel();
        $this->AbsensiModel = new AbsensiModel();
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

    public function save_attendance()
    {
        // Ambil data dari formulir
        $name = $this->request->getPost('name');
        $kelas = $this->request->getPost('kelas');
        $photoData = $this->request->getPost('photoData');
    
        // Decode base64 image
        list($type, $photoData) = explode(';', $photoData);
        list(, $photoData) = explode(',', $photoData);
        $photoData = base64_decode($photoData);
    
        // Simpan file ke folder images
        $fileName = uniqid() . '.png';
        if (file_put_contents('images/' . $fileName, $photoData)) {
            // Simpan data ke database
            $this->AbsensiModel->saveAttendance([
                'name' => $name,
                'kelas' => $kelas,
                'foto' => $fileName,
                'created_at' => date('Y-m-d H:i:s') // Menyimpan waktu saat absensi
            ]);
    
            // Set flashdata sukses
            session()->setFlashdata('success', 'Absensi berhasil disimpan.');
        } else {
            // Set flashdata gagal
            session()->setFlashdata('error', 'Gagal menyimpan absensi.');
        }
    
        // Redirect atau tampilkan pesan
        return redirect()->to(base_url('absensi'));
    }

    public function daftarabsen()
    {
        $absen = $this->AbsensiModel->findAll();
        $data = [
            'title' => 'Daftar Absensi',
            'absen' => $absen
        ];
        return view('daftarabsen', $data);
    }
}
