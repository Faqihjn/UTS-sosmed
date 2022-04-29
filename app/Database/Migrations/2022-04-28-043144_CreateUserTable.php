<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {
        $fields = [
            "id" => [
                "type"=> "INT",
                "unsigned"=> true,
                "auto_increment"=> true,
            ],
            "name" => [
                "type"=> "VARCHAR",
                "constraint" => "200",
                "null" => false,
            ],
            "email" => [
                "type"=> "TEXT",
                "null" => true,
            ],
            "password" => [
                "type"=> "VARCHAR",
                "constraint" => "200",
                "null" => false,
                
            ],
            "created_at DATETIME  DEFAULT CURRENT_TIMESTAMP",
            "deleted_at" => [
                "type"=> "DATETIME",
                "null" => true,
                
            ],
        ];
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('user', true); //If NOT EXISTS create table user
    }

    public function down()
    {
        $this->forge->dropTable('user', true); //If Exists drop table user
    }
}