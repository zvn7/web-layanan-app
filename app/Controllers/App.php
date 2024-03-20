<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\AppModel;

class App extends ResourceController
{
    protected $helpers = ['custom_helpers'];
    function __construct()
    {
        $this->app = new AppModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $data['app'] = $this->app->findAll();
        return view('app/index', $data);
    }

    /**
     * Present a view to present a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data['app'] = $this->app->where('id_app', $id)->first();
        // jika app tidak ada di tabel
        if (empty($data['app'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('app/show', $data);
    }

    /**
     * Present a view to present a new single resource object
     *
     * @return mixed
     */
    public function new()
    {
        return view('app/new');
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getPost();
        $this->app->insert($data);
        return redirect()->to(site_url('app'))->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id = null)
    {

        $app = $this->app->where('id_app', $id)->first();
        if (is_object($app)) {
            $data['app'] = $app;
            return view('app/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Process the updating, full or partial, of a specific resource object.
     * This should be a POST.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->app->update($id, $data);
        return redirect()->to(site_url('app'))->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Present a view to confirm the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function remove($id = null)
    {
        //
    }

    /**
     * Process the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->app->where('id_app', $id)->delete();
        return redirect()->to(site_url('app'))->with('success', 'Data Berhasil Dihapus');
    }

    public function trash()
    {
        $data['app'] = $this->app->onlyDeleted()->findAll();
        return view('app/trash', $data);
    }

    public function restore($id = null)
    {
        $this->db      = \Config\Database::connect();
        
        if ($id != null) {
            $this->db->table('app')
                ->set('deleted_at', null, true)
                ->where(['id_app' => $id])
                ->update();
        } else {
            $this->db->table('app')
                ->set('deleted_at', null, true)
                ->where(['deleted_at is NOT NULL', NULL, FALSE])
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('app'))->with('success', 'Data Berhasil Direstore');
        }
    }

    public function delete2($id = null)
    {
        if ($id != null) {
            $this->app->delete($id, true);
            return redirect()->to(site_url('app/trash'))->with('success', 'Data Berhasil Dihapus Permanen');
        }else{
            $this->app->purgeDeleted();
            return redirect()->to(site_url('app/trash'))->with('success', 'Data Trash Berhasil Dihapus Permanen');
        }
        
    }
}
