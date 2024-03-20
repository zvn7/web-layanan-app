<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class App extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_app'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name_app'       => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'desc_app'       => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'url_app'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'base_app'       => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'ordered_by'       => [
                'type'       => 'DATE'
            ],
            'ip_server'       => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'lang'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'lang_version'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'framework'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'app_version'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'status'       => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'status_integration'       => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'integrated_with'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'is_optimal'       => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'numb0f_duplicated'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'start_developed'       => [
                'type'       => 'DATE'
            ],
            'end_developed'       => [
                'type'       => 'DATE'
            ],
            'live_at'       => [
                'type'       => 'DATE'
            ],
            'created_at'       => [
                'type'       => 'DATE',
                'null' => true,
            ],
            'updated_at'       => [
                'type'       => 'DATE',
                'null' => true,
            ],
            'created_by'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'isactive'       => [
                'type'       => 'INT',
                'constraint' => '1',
            ],
            'note'       => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'deleted_at'       => [
                'type'       => 'INT',
                'constraint' => '11',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_app', true);
        $this->forge->createTable('app');
    }

    public function down()
    {
        $this->forge->dropTable('app');
    }
}
