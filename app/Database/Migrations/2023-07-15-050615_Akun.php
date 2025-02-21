<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class akun extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'CHAR',
                'constraint' => '7',
                'null' => false,
            ],
            'pass' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
                'null' => false,
            ],
            'is_admin' => [
                'type' => 'TINYINT',
                'constraint' => '1',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('akun');
    }

    public function down()
    {
        $this->forge->dropTable('akun');
    }
}
