<?php

namespace App\Controllers;

use App\Models\PemohonModel;
use CodeIgniter\RESTful\ResourceController;

class Pemohon extends ResourceController
{
    protected $helpers = ['custom_helpers'];
    function __construct()
    {
        $this->pemohon = new PemohonModel();
    }

    public function index()
    {
        $data['pemohon'] = $this->pemohon->findAll();
        return view('pemohon/index', $data);
    }

    public function show($id = null)
    {
        $data['pemohon'] = $this->pemohon->where('id_pemohon', $id)->first();
        if (empty($data['pemohon'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('pemohon/show', $data);
    }

    public function new()
    {
        return view('pemohon/new');
    }

    public function create()
    {
        $data = $this->request->getPost();
        $this->pemohon->insert($data);
        return redirect()->to(site_url('pemohon'))->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id = null)
    {
        $pemohon = $this->pemohon->where('id_pemohon', $id)->first();
        if (is_object($pemohon)) {
            $data['pemohon'] = $pemohon;
            return view('pemohon/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->pemohon->update($id, $data);
        return redirect()->to(site_url('pemohon'))->with('success', 'Data Berhasil Diupdate');
    }

    public function remove($id = null)
    {
        //
    }

    public function delete($id = null)
    {
        $this->pemohon->where('id_pemohon', $id)->delete();
        return redirect()->to(site_url('pemohon'))->with('success', 'Data Berhasil Dihapus');
    }

    public function trash()
    {
        $data['pemohon'] = $this->pemohon->onlyDeleted()->findAll();
        return view('pemohon/trash', $data);
    }

    public function restore($id = null)
    {
        $this->db      = \Config\Database::connect();
        
        if ($id != null) {
            $this->db->table('pemohon')
                ->set('deleted_at', null, true)
                ->where(['id_pemohon' => $id])
                ->update();
        } else {
            $this->db->table('pemohon')
                ->set('deleted_at', null, true)
                ->where(['deleted_at is NOT NULL', NULL, FALSE])
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('pemohon'))->with('success', 'Data Berhasil Direstore');
        }
    }

    public function delete2($id = null)
    {
        if ($id != null) {
            $this->pemohon->delete($id, true);
            return redirect()->to(site_url('pemohon/trash'))->with('success', 'Data Berhasil Dihapus Permanen');
        }else{
            $this->pemohon->purgeDeleted();
            return redirect()->to(site_url('pemohon/trash'))->with('success', 'Data Trash Berhasil Dihapus Permanen');
        }
        
    }
}
