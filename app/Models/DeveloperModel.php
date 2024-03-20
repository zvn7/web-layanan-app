<?php

namespace App\Models;

use CodeIgniter\Model;

class DeveloperModel extends Model
{
    protected $table            = 'developer';
    protected $primaryKey       = 'id_developer';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $useTimestamps = true;
    protected $allowedFields    = ['fullname', 'nip', 'gender', 'email', 'foto', 'no_hp', 'foto', 'note', 'created_by',];
}
