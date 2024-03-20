<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UsersModel;

class Users extends ResourceController
{
    protected $helpers = ['custom_helpers'];
    function __construct()
    {
        $this->users = new UsersModel();
    }

    public function index()
    {
        $data['users'] = $this->users->findAll();
        return view('users/index', $data);
    }

    public function show($id = null)
    {
        $data['users'] = $this->users->where('id_user', $id)->first();
        // jika app tidak ada di tabel
        if (empty($data['users'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('users/show', $data);
    }

    public function new()
    {
        return view('users/new');
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
        } else {
            $image_name = $post_image->getRandomName();
            $post_image->move('img/', $image_name);
        }
        $data = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'fullname' => $this->request->getVar('fullname'),
            'nip' => $this->request->getVar('nip'),
            'gender' => $this->request->getVar('gender'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'foto' => $image_name,
            'note' => $this->request->getVar('note'),
            'created_by' => $this->request->getVar('created_by'),
        ];
        $this->users->insert($data);
        return redirect()->to(site_url('users'))->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id = null)
    {
        $users = $this->users->where('id_user', $id)->first();
        if (is_object($users)) {
            $data['users'] = $users;
            return view('users/edit', $data);
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
        } else {
            $image_name = $post_image->getRandomName();
            $post_image->move('img/', $image_name);
            unlink('img/' . $this->request->getVar('fotoLama'));
        }

        $data = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'fullname' => $this->request->getVar('fullname'),
            'nip' => $this->request->getVar('nip'),
            'gender' => $this->request->getVar('gender'),
            'password' => password_hash(base64_encode(hash('sha384', true)), PASSWORD_DEFAULT),
            'foto' => $image_name,
            'note' => $this->request->getVar('note'),
            'created_by' => $this->request->getVar('created_by'),
        ];

        $this->users->update($id, $data);
        return redirect()->to(site_url('users'))->with('success', 'Data Berhasil Diupdate');
    }

    public function remove($id = null)
    {
        //
    }

    public function delete($id = null)
    {
        $this->users->where('id_user', $id)->delete();
        // $this->model->delete($id);
        return redirect()->to(site_url('users'))->with('success', 'Data Berhasil Dihapus');
    }

    public function trash()
    {
        $data['users'] = $this->users->onlyDeleted()->findAll();
        return view('users/trash', $data);
    }

    public function restore($id = null)
    {
        $this->db      = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('users')
                ->set('deleted_at', null, true)
                ->where(['id_user' => $id])
                ->update();
        } else {
            $this->db->table('users')
                ->set('deleted_at', null, true)
                ->where(['deleted_at is NOT NULL', NULL, FALSE])
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('users'))->with('success', 'Data Berhasil Direstore');
        }
    }

    public function delete2($id = null)
    {
        if ($id != null) {
            $this->users->delete($id, true);
            return redirect()->to(site_url('users/trash'))->with('success', 'Data Berhasil Dihapus Permanen');
        } else {
            $this->users->purgeDeleted();
            return redirect()->to(site_url('users/trash'))->with('success', 'Data Trash Berhasil Dihapus Permanen');
        }
    }
}
