<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateArticleTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "type" => 'INT', // uppercase
                "null" => 'false',
                "auto_increment" => true,
            ],
            "title" => [
                "type" => "VARCHAR",
                "constraint" => 128, // caracters
                "null" => false,
            ],
            "content" => [
                "type" => "TEXT", // can accept no values
                "null" => true,
            ]
        ]);
        
        $this->forge->addPrimaryKey("id");

        $this->forge->createTable("article");
    }

    public function down()
    {
        $this->forge->dropTable("article");
    }
}
