<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Developing extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_developing'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_app'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
            'id_developer'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
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
        $this->forge->addKey('id_developing', true);
        $this->forge->addForeignKey('id_app', 'app', 'id_app');
        $this->forge->addForeignKey('id_developer', 'developer', 'id_developer');
        $this->forge->createTable('developing');
    }

    public function down()
    {
        $this->forge->dropForeignKey('developing', 'developing_id_app_foreign');
        $this->forge->dropForeignKey('developing', 'developing_id_developer_foreign');
        $this->forge->dropTable('developing');
    }
}
