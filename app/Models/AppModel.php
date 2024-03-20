<?php

namespace App\Models;

use CodeIgniter\Model;

class AppModel extends Model
{
    protected $table            = 'app';
    protected $primaryKey       = 'id_app';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $useTimestamps = true;
    protected $allowedFields    = ['name_app', 'desc_app', 'url_app', 'base_app', 'ip_server', 'lang', 'lang_version', 'framework',  'app_version', 'status', 'start_developed', 'end_developed', 'live_at', 'created_by',  'url_app',];
}
