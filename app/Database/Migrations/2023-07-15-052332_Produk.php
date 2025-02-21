<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => false,
            ],
            'product_id' => [
                'type' => 'VARCHAR',
                'constraint' => '7',
                'null' => false,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
                'null' => false,
            ],
            'desc' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'price' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => false,
            ],
            'pict' => [
                'type' => 'TEXT',
                'null' => false,
            ],
        ]);
        $this->forge->addKey('product_id', true);
        $this->forge->createTable('produk');
    }

    public function down()
    {
        $this->forge->dropTable('produk');
    }
}
