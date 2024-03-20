<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pemohon extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pemohon'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'category'       => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'created_at'       => [
                'type'       => 'DATETIME',
                'null' => true,
            ],
            'updated_at'       => [
                'type'       => 'DATETIME',
                'null' => true,
            ],
            'deleted_at'       => [
                'type'       => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_pemohon', true);
        $this->forge->createTable('pemohon');
    }

    public function down()
    {
        $this->forge->dropTable('pemohon');
    }
}
