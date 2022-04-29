<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateReplyTable extends Migration
{
    public function up()
    {
        $fields = [
            "id" => [
                "type"=> "INT",
                "unsigned"=> true,
                "auto_increment"=> true,
            ],
            "reply" => [
                "type"=> "TEXT",
                "null" => true,
            ],
            "user_id" => [
                "type"=> "INT",
                "unsigned"=> true,
                
            ],
            "post_id" => [
                "type"=> "INT",
                "unsigned"=> true,
                
            ],
            "user_name" => [
                "type"=> "VARCHAR",
                "constraint" => "200",
                
            ],
            "created_at DATETIME  DEFAULT CURRENT_TIMESTAMP",
            "deleted_at" => [
                "type"=> "DATETIME",
                "null" => true,
                
            ],
        ];
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('reply', true); //If NOT EXISTS create table posts
    }

    public function down()
    {
        $this->forge->dropTable('reply', true); //If Exists drop table posts
    }
}
