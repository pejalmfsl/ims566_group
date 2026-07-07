<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to(site_url('dashboard'));
        }

        if (strtolower($this->request->getMethod()) === 'post') {
            $rules = [
                'username' => 'required|min_length[3]',
                'password' => 'required|min_length[3]',
            ];

            if (! $this->validate($rules)) {
                $this->data['validation'] = $this->validator;

                return view('auth/login', $this->data);
            }

            $userModel = new UserModel();
            $user = $userModel->where('username', $this->request->getPost('username'))->first();

            if (! $user || ! password_verify((string) $this->request->getPost('password'), $user['password'])) {
                return redirect()->back()->withInput()->with('error', 'Login tidak berjaya. Username atau password tidak sah.');
            }

            session()->set([
                'isLoggedIn' => true,
                'user_id'    => $user['id'],
                'username'   => $user['username'],
                'name'       => $user['name'],
                'role'       => $user['role'],
            ]);

            return redirect()->to(site_url('dashboard'))->with('success', 'Login berjaya. Selamat datang, ' . $user['name'] . '.');
        }

        return view('auth/login', $this->data);
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(site_url('login'))->with('success', 'Logout berjaya.');
    }
}
