<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PermohonanApp extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_papp'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_pemohon'       => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
            'id_app'       => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
            'requested_at'       => [
                'type'       => 'DATETIME',
                'null' => true,
            ],
            'cp_name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'cp_number'       => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'application_letter_file'       => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'deadline'       => [
                'type'       => 'DATETIME',
                'null' => true,
            ],
            'finished'       => [
                'type'       => 'DATETIME',
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
        $this->forge->addKey('id_papp', true);
        $this->forge->addForeignKey('id_app', 'app', 'id_app');
        $this->forge->addForeignKey('id_pemohon', 'pemohon', 'id_pemohon');
        $this->forge->createTable('papp');
    }

    public function down()
    {
        $this->forge->dropForeignKey('papp', 'papp_id_app_foreign');
        $this->forge->dropForeignKey('papp', 'papp_id_pemohon_foreign');
        $this->forge->dropTable('papp');
    }
}
