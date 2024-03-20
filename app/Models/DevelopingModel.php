<?php

namespace App\Models;

use CodeIgniter\Model;

class DevelopingModel extends Model
{
    protected $table            = 'developing';
    protected $primaryKey       = 'id_developing';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['id_app', 'id_developer',];
    protected $useTimestamps = true;

    function getAll() {
        $builder = $this->db->table('developing');
        $builder->join('app', 'app.id_app = developing.id_app');
        $builder->join('developer', 'developer.id_developer = developing.id_developer');
        $query = $builder->get();
        return $query->getResult();
    }
}
