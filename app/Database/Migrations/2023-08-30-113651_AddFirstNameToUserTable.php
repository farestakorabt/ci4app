<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFirstNameToUserTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn("users", [
            "first_name" => [
                "type" => "VARCHAR",
                "constraint" => 64,
                null => false,
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn("users", "first_name");
    }
}
