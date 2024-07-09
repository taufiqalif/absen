<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('users/login');
    }

    public function submit()
    {
        $session = session();
        $userModel = new UserModel();

        $nisn = $this->request->getVar('nisn');
        $nama = $this->request->getVar('nama');
        $kelas = $this->request->getVar('kelas');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $confirm_password = $this->request->getVar('confirm_password');

        // Validasi form
        $rules = [
            'nisn' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'matches[password]'
        ];

        if (!$this->validate($rules)) {
            $validation = \Config\Services::validation();
            return redirect()->to('/registrasi')->withInput()->with('validation', $validation);
        }

        // Encrypt password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Simpan ke database
        $userData = [
            'nisn' => $nisn,
            'nama' => $nama,
            'kelas' => $kelas,
            'email' => $email,
            'password' => $hashed_password
        ];

        $userModel->save($userData);

        // Set flashdata sukses
        $session->setFlashdata('success', 'Registrasi berhasil.');

        return redirect()->to('/login');
    }

    public function registrasi()
    {
        $data = [
            'title' => 'Registrasi'
        ];

        return view('users/registrasi', $data);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
