<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function processLogin()
    {
        // $session = session();
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if (empty($email) || empty($password)) {
            return redirect()->to('/')->with('error', 'Email dan password wajib diisi.');
        }

        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->to('/')->with('error', 'Email tidak ditemukan.');
        }

        // echo "Password input: " . $password . "<br>";
        // echo "Hash di database: " . $user['password'] . "<br>";
        // var_dump(password_verify($password, $user['password']));
        // exit;


        if (!password_verify($password, $user['password'])) {
            return redirect()->to('/')->with('error', 'Password salah. Coba lagi.');
        }

        session()->set([
            'id'        => $user['id'],
            'name'      => $user['name'],
            'email'     => $user['email'],
            'role'      => $user['role'],
            'isLogin'   => true,
        ]);

        return redirect()->to('/user');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/')->with('message', 'Anda telah Log Out');
    }
}
