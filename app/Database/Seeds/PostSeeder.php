<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'post'=> 'Halo nama saya Ipin',
            'user_id'=> 2,
            'user_name'=> 'Ipin',
            'created_at' => 2022-04-29,
        ];

        // Simple Queries
        $this->db->table('users')->insert($data);
    }
}