<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'Upin',
            'email'    => 'upin@gmail.com',
            'password'    => md5("secret"),
            'created_at' => 2022-04-28,
        ];

        // Simple Queries
        $this->db->table('users')->insert($data);

        $data = [
            'name' => 'Ipin',
            'email'    => 'ipin@mail.com',
            'password'    => md5("secret123"),
            'created_at' => 2022-04-29,
        ];

        // Simple Queries
        $this->db->table('users')->insert($data);
    }
}