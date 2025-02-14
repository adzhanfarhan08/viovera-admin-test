<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'password', 'job', 'department', 'salary'];
    protected $useTimestamps = true;

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function updateUser($id, $data)
    {
        if (!empty($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        } else {
            unset($data['password']);
        }

        return $this->where('id', $id)->set($data)->update();
    }
}
