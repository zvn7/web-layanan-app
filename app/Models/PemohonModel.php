<?php

namespace App\Models;

use CodeIgniter\Model;

class PemohonModel extends Model
{
    protected $table            = 'pemohon';
    protected $primaryKey       = 'id_pemohon';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $useTimestamps = true;
    protected $allowedFields    = ['name', 'category',];
}
