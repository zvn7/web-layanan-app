<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username'       => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'email'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
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
            'password'       => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
            ],
            'foto'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'login_at'       => [
                'type'       => 'DATE',
                'null' => true,
            ],
            'ip_client'       => [
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
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
