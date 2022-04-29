<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ReplySeeder extends Seeder
{
    public function run()
    {
        $data = [
            'reply'=> 'Halo bro!',
            'user_id'=> 1,
            'post_id'=> 1,
            'user_name'=> 'Upin',
            'created_at' => 2022-04-29,
        ];

        // Simple Queries
        $this->db->table('users')->insert($data);

    }
}