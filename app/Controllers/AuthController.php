<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Order;
use App\Models\User;

class AuthController extends BaseController
{
    private User $user;
    private Order $trx;
    function __construct()
    {
        $this->user = new User();
        $this->trx = new Order();
    }

    public function index()
    {
        if (!isset(session()->get('userdata')->id)) {
            return redirect()->to('/login');
        }else{
            $data['trx_pending']  = count($this->trx->where('status', 'pending')->findAll());
            $data['trx_process']  = count($this->trx->where('status', 'process')->findAll());
            $data['trx_done']     = count($this->trx->where('status', 'done')->findAll());
            $data['income']       = $this->trx->countIncome()->income;
            $data['graph_income'] = $this->trx->graphIncome();
            $data['sold']         = $this->trx->countSold()->sold;
            $data['graph_sold']   = $this->trx->graphSold();
            return view('pages/admin/dashboard', $data);
        }
    }

    public function login(){
        return view('pages/auth/login');
    }

    public function authenticate(){
        $authenticated = $this->user
                            ->where('email', $this->request->getVar('email'))
                            ->where('password', md5($this->request->getVar('password')))
                            ->first();
        print_r($authenticated);
        if ($authenticated != null) {
            session()->set(['userdata' => $authenticated]);
            return redirect()->to(base_url('/admin'));
        }else{
            session()->set(['error' => 'Email atau Password Salah']);
            session()->markAsFlashdata('error');
            return redirect()->back();
        }
    }

    public function logout(){
        session()->remove('userdata');
        return redirect()->to(base_url());
    }
}
