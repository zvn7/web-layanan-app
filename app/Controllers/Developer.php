<?php

namespace App\Controllers;

use App\Models\DeveloperModel;
use CodeIgniter\RESTful\ResourceController;

class Developer extends ResourceController
{
    protected $helpers = ['custom_helpers'];
    function __construct()
    {
        $this->developer = new DeveloperModel();
    }

    public function index()
    {
        $data['developer'] = $this->developer->findAll();
        return view('developer/index', $data);
    }

    public function show($id = null)
    {
        $data['developer'] = $this->developer->where('id_developer', $id)->first();
        if (empty($data['developer'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('developer/show', $data);
    }

    public function new()
    {
        return view('developer/new');
    }

    public function create()
    {
        if (!$this->validate([
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran terlalu besar',
                    'is_image' => 'File anda bukan gambar',
                    'mime_in' => 'File anda bukan gambar'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $post_image = $this->request->getFile('foto');

        if ($post_image->getError() == 4) {
            $image_name = 'user.png';
        }else{
            $image_name = $post_image->getRandomName();
            $post_image->move('img/', $image_name);
        }
        $data = [
            'fullname' => $this->request->getPost('fullname'),
            'nip' => $this->request->getPost('nip'),
            'gender' => $this->request->getPost('gender'),
            'email' => $this->request->getPost('email'),
            'no_hp' => $this->request->getPost('no_hp'),
            'foto' => $image_name,
            'note' => $this->request->getPost('note'),
            'created_by' => $this->request->getPost('created_by'),
        ];
        $this->developer->insert($data);
        return redirect()->to(site_url('developer'))->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id = null)
    {
        $developer = $this->developer->where('id_developer', $id)->first();
        if (is_object($developer)) {
            $data['developer'] = $developer;
            return view('developer/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id = null)
    {
        if (!$this->validate([
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran terlalu besar',
                    'is_image' => 'File anda bukan gambar',
                    'mime_in' => 'File anda bukan gambar'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $post_image = $this->request->getFile('foto');

        if ($post_image->getError() == 4) {
            $image_name = $this->request->getVar('fotoLama');
        }else{
            $image_name = $post_image->getRandomName();
            $post_image->move('img/', $image_name);
            unlink('img/' . $this->request->getVar('fotoLama'));
        }

        $data = [
            'fullname' => $this->request->getPost('fullname'),
            'nip' => $this->request->getPost('nip'),
            'gender' => $this->request->getPost('gender'),
            'email' => $this->request->getPost('email'),
            'no_hp' => $this->request->getPost('no_hp'),
            'foto' => $image_name,
            'note' => $this->request->getPost('note'),
            'created_by' => $this->request->getPost('created_by'),
        ];

        $this->developer->update($data);
        return redirect()->to(site_url('developer'))->with('success', 'Data Berhasil Diupdate');
    }

    public function remove($id = null)
    {
        //
    }

    public function delete($id = null)
    {
        $this->developer->where('id_developer', $id)->delete();
        return redirect()->to(site_url('developer'))->with('success', 'Data Berhasil Dihapus');
    }

    public function trash()
    {
        $data['developer'] = $this->developer->onlyDeleted()->findAll();
        return view('developer/trash', $data);
    }

    public function restore($id = null)
    {
        $this->db      = \Config\Database::connect();
        
        if ($id != null) {
            $this->db->table('developer')
                ->set('deleted_at', null, true)
                ->where(['id_developer' => $id])
                ->update();
        } else {
            $this->db->table('developer')
                ->set('deleted_at', null, true)
                ->where(['deleted_at is NOT NULL', NULL, FALSE])
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('developer'))->with('success', 'Data Berhasil Direstore');
        }
    }

    public function delete2($id = null)
    {
        if ($id != null) {
            $this->developer->delete($id, true);
            return redirect()->to(site_url('developer/trash'))->with('success', 'Data Berhasil Dihapus Permanen');
        }else{
            $this->developer->purgeDeleted();
            return redirect()->to(site_url('developer/trash'))->with('success', 'Data Trash Berhasil Dihapus Permanen');
        }
        
    }
}
