<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Transaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'transaction_id' => [
                'type' => 'CHAR',
                'constraint' => '15',
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
            'total_price' => [
                'type' => 'INT',
                'constraint' => 15,
                'null' => false,
                'default' => 0,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => false,
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);
        $this->forge->createTable('transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi');
    }
}
