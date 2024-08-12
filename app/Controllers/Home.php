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
        helper('url');
    }

    private function checkLogin()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }
    }

    public function index()
    {
        $this->checkLogin();
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
        $this->checkLogin();
        $daftar = $this->DaftarSiswaModel->findAll();
        $data = [
            'title' => 'Daftar Siswa',
            'daftar' => $daftar
        ];
        return view('daftarsiswa', $data);
    }

    public function tambahSiswa()
    {
        $this->checkLogin();
        $data = [
            'title' => 'Tambah Siswa'
        ];
        return view('/siswa/tambah', $data);
    }

    public function saveSiswa()
    {
        $this->checkLogin();

        // Ambil data dari formulir
        $nis = $this->request->getPost('nis');
        $nama = $this->request->getPost('nama');
        $kelas = $this->request->getPost('kelas');

        // Validasi form
        $rules = [
            'nis' => 'required|is_unique[daftar_siswa.nis]',
            'nama' => 'required',
            'kelas' => 'required'
        ];

        if (!$this->validate($rules)) {
            $valid = \Config\Services::validation();
            return redirect()->to('/tambahsiswa')->withInput()->with('validation', $valid);
        }

        // Simpan ke database
        $this->DaftarSiswaModel->save([
            'nis' => $nis,
            'nama' => $nama,
            'kelas' => $kelas
        ]);

        // Set flashdata sukses
        session()->setFlashdata('success', 'Siswa berhasil ditambahkan.');

        return redirect()->to('/siswa');
    }

    public function lihat($nis)
    {
        $this->checkLogin();

        // Retrieve student data based on nis
        $student = $this->DaftarSiswaModel->where('nis', $nis)->first();

        if (!$student) {
            session()->setFlashdata('error', 'Student not found.');
            return redirect()->to('/siswa');
        }

        $data = [
            'title' => 'Info Siswa',
            'student' => $student
        ];

        return view('/siswa/lihat', $data);
    }


    public function hapus($nis)
    {
        $this->checkLogin();

        // Find student by nis and delete
        $this->DaftarSiswaModel->where('nis', $nis)->delete();

        session()->setFlashdata('success', 'Student successfully deleted.');
        return redirect()->to('/siswa');
    }



    public function absen()
    {
        $this->checkLogin();
        $data = [
            'title' => 'Absensi'
        ];
        return view('absensi', $data);
    }

    public function save_attendance()
    {
        $this->checkLogin();
        // Ambil data dari formulir
        $name = $this->request->getPost('name');
        $kelas = $this->request->getPost('kelas');
        // $photoData = $this->request->getPost('photoData');
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
        $this->checkLogin();
        // $absen = $this->AbsensiModel->findAll();
        // Ambil data absensi terbaru terlebih dahulu
        $absen = $this->AbsensiModel->orderBy('created_at', 'DESC')->findAll();
        $data = [
            'title' => 'Daftar Absensi',
            'absen' => $absen
        ];
        return view('daftarabsen', $data);
    }
}
