<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UtilizadoresTable extends Migration
{
    public function up()
    {
        // Create table utilizadores
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'utilizador' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true
            ],
            'passwrd' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('utilizadores');
    }

    public function down()
    {
        // Rollback
        $this->forge->dropTable('utilizadores');

    }
}
