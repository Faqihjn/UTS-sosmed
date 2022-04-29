<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TodoSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'title' => 'Faqih tidur',
            'description' => 'Faqih ngantuk',
            'finished_at' => "2022-04-04-01:00",
            
        ];

        // Simple Queries
        $this->db->table('todos')->insert($data);
        
        $data = [
            'title' => 'Faqih makan',
            'description' => 'Faqih lapar',
            'finished_at' => "2022-04-04-03:00",
            
        ];

        // Simple Queries
        $this->db->table('todos')->insert($data);
        
        $data = [
            'title' => 'Faqih tidur lagi',
            'description' => 'Faqih ngantuk lagi',
            'finished_at' => "2022-04-04-05:30",
            
        ];

        // Simple Queries
        $this->db->table('todos')->insert($data);
        
    }
}