<?php

namespace App\Filters;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface{

    public function before(\CodeIgniter\HTTP\RequestInterface $request, $arguments = null)
    {
        if (!isset(session()->get('userdata')->id)) {
            return redirect()->to('/login');
        }
    }

    public function after(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, $arguments = null)
    {
        // TODO: Implement after() method.
    }
}
?>