<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id_user';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $useTimestamps = true;
    protected $allowedFields    = ['username', 'fullname', 'password', 'email', 'nip', 'gender', 'foto', 'created_by',  'note',];

}
