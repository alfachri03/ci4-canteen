<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Keranjang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'order_id' => [
                'type' => 'CHAR',
                'constraint' => '7',
                'null' => false,
            ],
            'acc_id' => [
                'type' => 'CHAR',
                'constraint' => '7',
                'null' => false,
            ],
            'product_id' => [
                'type' => 'CHAR',
                'constraint' => '7',
                'null' => false,
            ],
            'product_qty' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => false,
            ],
        ]);
        $this->forge->createTable('keranjang');
    }

    public function down()
    {
        $this->forge->dropTable('keranjang');
    }
}
