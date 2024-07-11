<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class LoginController extends Controller
{
  public function login()
  {
    return view('users/login');
  }

  public function submit()
  {
    $session = session();
    $userModel = new UserModel();

    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');

    $data = $userModel->where('email', $email)->first();

    if ($data) {
      $pass = $data['password'];
      $authenticatePassword = password_verify($password, $pass);
      if ($authenticatePassword) {
        $sessionData = [
          'id' => $data['id'],
          'email' => $data['email'],
          'role' => $data['role'], // Simpan role di session
          'logged_in' => TRUE
        ];
        $session->set($sessionData);
        if ($data['role'] == 'admin') {
          return redirect()->to('/admin/dashboard'); // Redirect ke halaman admin
        } else {
          return redirect()->to('/dashboard'); // Redirect ke halaman siswa
        }
      } else {
        $session->setFlashdata('error', 'Password salah.');
        return redirect()->to('./');
      }
    } else {
      $session->setFlashdata('error', 'Email tidak ditemukan.');
      return redirect()->to('./');
    }
  }

  public function registrasi()
  {
    $data = [
      'title' => 'Registrasi'
    ];

    return view('/users/registrasi', $data);
  }

  public function submit_registration()
  {
    $session = session();
    $userModel = new UserModel();

    // Ambil data dari form
    $nisn = $this->request->getVar('nisn');
    $nama = $this->request->getVar('nama');
    $kelas = $this->request->getVar('kelas');
    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');
    $confirm_password = $this->request->getVar('confirm_password');
    $role = $this->request->getVar('role'); // Ambil nilai role dari form

    // Validasi form
    $rules = [
      'nisn' => 'required',
      'nama' => 'required',
      'kelas' => 'required',
      'email' => 'required|valid_email|is_unique[users.email]',
      'password' => 'required|min_length[6]',
      'confirm_password' => 'matches[password]',
      'role' => 'required|in_list[admin,siswa]' // Validasi role
    ];


    if (!$this->validate($rules)) {
      $valid = \Config\Services::validation();
      return redirect()->to('/registrasi')->withInput()->with('validation', $valid);
    }

    // Encrypt password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Simpan ke database
    $userData = [
      'nisn' => $nisn,
      'nama' => $nama,
      'kelas' => $kelas,
      'email' => $email,
      'password' => $hashed_password,
      'role' => $role // Simpan role ke dalam database
    ];

    $userModel->save($userData);

    // Set flashdata sukses
    $session->setFlashdata('success', 'Registrasi berhasil.');

    return redirect()->to('./');
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    return redirect()->to('./');
  }
}
