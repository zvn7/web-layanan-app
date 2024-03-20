<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\AppModel;
use App\Models\DeveloperModel;
use App\Models\DevelopingModel;

class Developing extends ResourceController
{
    protected $helpers = ['custom_helpers'];
    function __construct()
    {
        $this->app = new AppModel();
        $this->developer = new DeveloperModel();
        $this->developing = new DevelopingModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data['developing'] = $this->developing->getAll();
        return view('developing/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data['app'] = $this->app->findAll();
        $data['developer'] = $this->developer->findAll();
        return view('developing/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getPost();
        $this->developing->insert($data);
        return redirect()->to(site_url('developing'))->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $developing = $this->developing->find($id);
        if (is_object($developing)) {
            $data['developing'] = $developing;
            $data['app'] = $this->app->findAll();
            $data['developer'] = $this->developer->findAll();
            return view('developing/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('developing/edit');
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->developing->update($id, $data);
        return redirect()->to(site_url('developing'))->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->developing->delete($id);
        return redirect()->to(site_url('developing'))->with('success', 'Data Berhasil Dihapus');
    }

    public function trash()
    {
        $data['developing'] = $this->developing->onlyDeleted()->findAll();
        return view('developing/trash', $data);
    }

    public function restore($id = null)
    {
        $this->db      = \Config\Database::connect();

        if ($id != null) {
            $this->db->table('developing')
                ->set('deleted_at', null, true)
                ->where(['id_developer' => $id])
                ->update();
        } else {
            $this->db->table('developing')
                ->set('deleted_at', null, true)
                ->where(['deleted_at is NOT NULL', NULL, FALSE])
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('developing'))->with('success', 'Data Berhasil Direstore');
        }
    }

    public function delete2($id = null)
    {
        if ($id != null) {
            $this->developing->delete($id, true);
            return redirect()->to(site_url('developing/trash'))->with('success', 'Data Berhasil Dihapus Permanen');
        } else {
            $this->developing->purgeDeleted();
            return redirect()->to(site_url('developing/trash'))->with('success', 'Data Trash Berhasil Dihapus Permanen');
        }
    }
}
