<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'          => 'Admin',
                'email'         => 'admin@example.com',
                'password'      => password_hash('admin1234', PASSWORD_DEFAULT),
                'role'          => 'admin',
                'job'           => '-',
                'department'    => '-',
                'salary'        => '-'
            ],
            [
                'name'          => 'Dani',
                'email'         => 'dani@example.com',
                'password'      => password_hash('dani1234', PASSWORD_DEFAULT),
                'role'          => 'user',
                'job'           => 'Lead DevOps',
                'department'    => 'IT',
                'salary'        => '5500000'
            ],
            [
                'name'          => 'Michael',
                'email'         => 'michael@example.com',
                'password'      => password_hash('michael1234', PASSWORD_DEFAULT),
                'role'          => 'user',
                'job'           => 'UI / UX',
                'department'    => 'Design',
                'salary'        => '4850000'
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
