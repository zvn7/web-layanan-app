<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'Administrator',
            'email' => 'admin@gmail.com',
            'fullname' => 'admin tok',
            'nip' => '123456789',
            'gender' => 'p',
            'password' => password_hash('12345', PASSWORD_BCRYPT),
            'foto' => 'foto.png',
            'ip_client' => '21344155',
            'created_by' => 'super admin',
            'note' => 'ppp'
        ];
        $this->db->table('users')->insert($data);
    }
}
