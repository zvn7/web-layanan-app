<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Developer extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_developer'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'fullname'      => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nip'       => [
                'type'       => 'VARCHAR',
                'constraint' => '16',
            ],
            'gender'       => [
                'type'       => 'CHAR',
                'constraint' => '1',
            ],
            'email'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'no_hp'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'foto'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'note'       => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'isactive'       => [
                'type'       => 'INT',
                'constraint' => '1',
            ],
            'created_by'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'created_at'       => [
                'type'       => 'DATE',
                'null' => true,
            ],
            'updated_at'       => [
                'type'       => 'DATE',
                'null' => true,
            ],
            'deleted_at'       => [
                'type'       => 'INT',
                'constraint' => '11',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_developer', true);
        $this->forge->createTable('developer');
    }

    public function down()
    {
        $this->forge->dropTable('developer');
    }
}
