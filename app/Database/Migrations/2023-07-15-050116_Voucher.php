<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Voucher extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'voucher_key' => [
                'type' => 'CHAR',
                'constraint' => '5',
                'null' => true,
            ],
            'persentase' => [
                'type' => 'INT',
                'constraint' => 3,
                'null' => false,
            ],
            'diskon' => [
                'type' => 'FLOAT',
                'null' => true,
            ],
        ]);
        $this->forge->createTable('vocer');
    }

    public function down()
    {
        $this->forge->dropTable('vocer');
    }
}
