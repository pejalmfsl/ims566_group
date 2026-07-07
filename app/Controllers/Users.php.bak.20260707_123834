<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        $this->data['title'] = 'User Management';
        $this->data['users'] = $userModel->orderBy('created_at', 'DESC')->findAll();

        return view('users/index', $this->data);
    }

    public function create()
    {
        $this->data['title'] = 'Create User';

        return view('users/form', $this->data);
    }

    public function store()
    {
        $rules = [
            'username' => 'required|min_length[3]|is_unique[users.username]',
            'name'     => 'required|min_length[3]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[3]',
        ];

        if (! $this->validate($rules)) {
            $this->data['title'] = 'Create User';
            $this->data['validation'] = $this->validator;

            return view('users/form', $this->data);
        }

        $userModel = new UserModel();
        $userModel->insert([
            'username' => strtoupper((string) $this->request->getPost('username')),
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash((string) $this->request->getPost('password'), PASSWORD_BCRYPT),
            'role'     => 'admin',
        ]);

        return redirect()->to(site_url('users'))->with('success', 'User berjaya dicipta.');
    }
}
