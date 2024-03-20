<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\AppModel;
use App\Models\PemohonModel;
use App\Models\PermohonanAppModel;

class Permohonanapp extends ResourceController
{
    protected $helpers = ['custom_helpers'];
    function __construct()
    {
        $this->app = new AppModel();
        $this->pemohon = new PemohonModel();
        $this->permohonanapp = new permohonanappModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data['permohonanapp'] = $this->permohonanapp->getAll();
        return view('permohonanapp/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data['permohonanapp'] = $this->permohonanapp->showdata($id);
        if (empty($data['permohonanapp'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('permohonanapp/show', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data['app'] = $this->app->findAll();
        $data['pemohon'] = $this->pemohon->findAll();
        return view('permohonanapp/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if (!$this->validate([
            'application_letter_file' => [
                'rules' => 'uploaded[application_letter_file]',
                'errors' => [
                    'uploaded[application_letter_file]' => 'Pilih file',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $post_file = $this->request->getFile('application_letter_file');

        $image_name = $post_file->getName().'-'.$post_file->getRandomName();
        $post_file->move('file/', $image_name);

        $data = [
            'id_pemohon' => $this->request->getPost('id_pemohon'),
            'id_app' => $this->request->getPost('id_app'),
            'requested_at' => $this->request->getPost('requested_at'),
            'cp_name' => $this->request->getPost('cp_name'),
            'cp_number' => $this->request->getPost('cp_number'),
            'application_letter_file' => $image_name,
            'deadline' => $this->request->getPost('deadline'),
            'progress' => $this->request->getPost('progress'),
        ];
        $this->permohonanapp->insert($data);
        return redirect()->to(site_url('permohonanapp'))->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $permohonanapp = $this->permohonanapp->find($id);
        if (is_object($permohonanapp)) {
            $data['permohonanapp'] = $permohonanapp;
            $data['app'] = $this->app->findAll();
            $data['pemohon'] = $this->pemohon->findAll();
            return view('permohonanapp/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('permohonanapp/edit');
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if (!$this->validate([
            'application_letter_file' => [
                'rules' => 'uploaded[application_letter_file]',
                'errors' => [
                    'uploaded[application_letter_file]' => 'Pilih file',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $post_file = $this->request->getFile('application_letter_file');
        
        if ($post_file->getError() == 4) {
            $image_name = $this->request->getVar('application_letter_file_old');
        } else {
            $image_name = $post_file->getName().'-'.$post_file->getRandomName();
            $post_file->move('file/', $image_name);
            unlink('file/' . $this->request->getVar('application_letter_file_old'));
        }
        $data = [
            'id_pemohon' => $this->request->getPost('id_pemohon'),
            'id_app' => $this->request->getPost('id_app'),
            'requested_at' => $this->request->getPost('requested_at'),
            'cp_name' => $this->request->getPost('cp_name'),
            'cp_number' => $this->request->getPost('cp_number'),
            'application_letter_file' => $image_name,
            'deadline' => $this->request->getPost('deadline'),
            'progress' => $this->request->getPost('progress'),
        ];
        
        $this->permohonanapp->update($id, $data);
        return redirect()->to(site_url('permohonanapp'))->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->permohonanapp->delete($id);
        return redirect()->to(site_url('permohonanapp'))->with('success', 'Data Berhasil Dihapus');
    }

    public function trash()
    {
        $data['permohonanapp'] = $this->permohonanapp->onlyDeleted()->findAll();
        return view('permohonanapp/trash', $data);
    }

    public function restore($id = null)
    {
        $this->db      = \Config\Database::connect();

        if ($id != null) {
            $this->db->table('papp')
                ->set('deleted_at', null, true)
                ->where(['id_developer' => $id])
                ->update();
        } else {
            $this->db->table('permohonanapp')
                ->set('deleted_at', null, true)
                ->where(['deleted_at is NOT NULL', NULL, FALSE])
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('permohonanapp'))->with('success', 'Data Berhasil Direstore');
        }
    }

    public function delete2($id = null)
    {
        if ($id != null) {
            $this->permohonanapp->delete($id, true);
            return redirect()->to(site_url('permohonanapp/trash'))->with('success', 'Data Berhasil Dihapus Permanen');
        } else {
            $this->permohonanapp->purgeDeleted();
            return redirect()->to(site_url('permohonanapp/trash'))->with('success', 'Data Trash Berhasil Dihapus Permanen');
        }
    }
}
