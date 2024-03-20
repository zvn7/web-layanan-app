<?php

namespace App\Models;

use CodeIgniter\Model;

class PermohonanAppModel extends Model
{
    protected $table            = 'permohonanapp';
    protected $primaryKey       = 'id_papp';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['id_pemohon', 'id_app', 'requested_at', 'cp_name', 'cp_number', 'application_letter_file', 'deadline', 'progress',];
    protected $useTimestamps = true;

    function getAll() {
        $this->select('*');
        $this->join('pemohon', 'pemohon.id_pemohon = permohonanapp.id_pemohon');
        $this->join('app', 'app.id_app = permohonanapp.id_app');
        $this->orderBy('permohonanapp.id_papp', 'asc');
        $query = $this->get();
        return $query->getResult();
    }

    function showdata($id)
    {
        $this->select('*');
        $this->join('pemohon', 'pemohon.id_pemohon = permohonanapp.id_pemohon');
        $this->join('app', 'app.id_app = permohonanapp.id_app');
        $this->where('permohonanapp.id_papp', $id);
        $query = $this->get();
        return $query->getRow();
    }
}
