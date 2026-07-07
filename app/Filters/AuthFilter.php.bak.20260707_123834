<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (! session()->get('isLoggedIn')) {
            return redirect()->to(site_url('login'))->with('error', 'Sila login untuk akses halaman tersebut.');
        }

        $requiredRoles = [];

        foreach ((array) $arguments as $argument) {
            foreach (explode(',', (string) $argument) as $role) {
                $role = trim($role);

                if ($role !== '') {
                    $requiredRoles[] = $role;
                }
            }
        }

        if ($requiredRoles !== []) {
            $role = (string) session()->get('role');

            if (! in_array($role, $requiredRoles, true)) {
                return redirect()->to(site_url('dashboard'))->with('error', 'Access denied. Akaun anda tiada kebenaran untuk halaman tersebut.');
            }
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }
}
