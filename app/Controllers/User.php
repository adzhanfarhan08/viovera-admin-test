<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Anda tidak memiliki akses untuk halaman ini');
        }
        $this->userModel = new UserModel();
    }

    public function index()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses anda ditolak');
        }
        $data['users'] = $this->userModel->findAll();
        return view('user/index', $data);
    }

    public function create()
    {
        return view('user/create');
    }

    public function store()
    {
        $this->userModel->save([
            'name'      => $this->request->getPost('name'),
            'email'     => $this->request->getPost('email'),
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'job'        => $this->request->getPost('job'),
            'department' => $this->request->getPost('department'),
            'salary'     => $this->request->getPost('salary'),
        ]);
        return redirect()->to('/user')->with('success', 'Karyawan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['user'] = $this->userModel->find($id);
        return view('user/edit', $data);
    }

    public function update($id)
    {
        $userModel = new UserModel();

        $user = $userModel->find($id);

        if (!$user) {
            return redirect()->to('/user')->with('error', 'User tidak ditemukan.');
        }

        $data = [
            'name'      => $this->request->getPost('name'),
            'email'     => $this->request->getPost('email'),
            'password'  => $this->request->getPost('password'),
            'job'        => $this->request->getPost('job'),
            'department' => $this->request->getPost('department'),
            'salary'     => $this->request->getPost('salary'),
        ];

        if (!empty($this->request->getPost('password'))) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        if ($userModel->updateUser($id, $data)) {
            return redirect()->to('/user')->with('success', 'Profile berhasil diupdate');
        } else {
            return redirect()->to('/user')->with('error', 'Gagal memperbarui profile');
        }
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        return redirect()->to('/user')->with('success', 'Data telah dihapus');
    }
}
