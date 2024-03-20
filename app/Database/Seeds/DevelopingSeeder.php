<?php

namespace App\Database\Seeds;
use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class DevelopingSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id_app' => '1',
            'id_developer' => '2',
            'created_at' => \CodeIgniter\I18n\Time::now(),
        ];
        $this->db->table('developing')->insert($data);
    }
}
