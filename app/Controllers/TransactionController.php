<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Menu;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderMenu;
use App\Models\User;

class TransactionController extends BaseController
{
    private $menu;
    private $cart;
    private $trans;
    private $ordermenu;
    private $user;

    function __construct()
    {
        $this->menu = new Menu();
        $this->cart = new Cart();
        $this->trans = new Order();
        $this->ordermenu = new OrderMenu();
        $this->user = new User();
    }

    public function index(){
        $data['type'] = 'Baru';
        $data['transactions'] = $this->trans->findType('pending');
        return view('pages/admin/order/index', $data);
    }
    public function incoming(){
        $data['type'] = 'Sedang berjalan';
        $data['transactions'] = $this->trans->findType('ongoing');
        return view('pages/admin/order/index', $data);
    }
    public function history(){
        $data['type'] = 'Telah Selesai';
        $data['transactions'] = $this->trans->findType('done');
        return view('pages/admin/order/index', $data);
    }

    public function show($id){
        $data['trx'] = $this->trans->find($id);
        $data['user'] = $this->user->find($data['trx']->user_id);
        $data['menu'] = $this->ordermenu->transaction($data['trx']->id);
        return view('pages/admin/order/detail', $data);
    }
    public function create()
    {
        $cart = $this->menu->joinCart('inner');
        $trx_id = $this->trans->insert([
            'user_id' => session()->get('userdata')->id,
            'address' => $this->request->getVar('address'),
            'total' => 0,
            'ship_date' => date_format(date_create($this->request->getVar('date')), 'Y-m-d'),
            'shipment_method' => '',
            'payment_method' => '',
            'status' => 'pending',
        ], true);
        $total = 0;
        foreach ($cart as $c){
            $this->ordermenu->insert([
                'order_id' => $trx_id,
                'menu_id' => $c->menu_id,
                'qty' => $c->qty
            ]);
            $total += $c->price * $c->qty;
            $this->cart->where('user_id', session()->get('userdata')->id)->delete();
        }
        $this->trans->update($trx_id, [
            'total' => $total
        ]);
        return redirect()->to(base_url('/'));
    }


    public function addCart($id)
    {
        $old = $this->cart->where('menu_id', $id)
            ->where('user_id', session()->get('userdata')->id)
            ->first();
        if ($old == null) {
            $this->cart->insert([
                'menu_id' => $id,
                'user_id' => session()->get('userdata')->id,
                'qty' => 1
            ]);
        }else{
            $this->cart->update($old->id, [
                'menu_id' => $id,
                'user_id' => session()->get('userdata')->id,
                'qty' => $old->qty + 1
            ]);
        }
        return redirect()->back();
    }
    public function reduceCart($id){
        $old = $this->cart->where('menu_id', $id)
            ->where('user_id', session()->get('userdata')->id)
            ->first();
        if ($old->qty == 1) {
            $this->cart->delete($old->id);
        }else{
            $this->cart->update($old->id, [
                'qty' => $old->id - 1
            ]);
        }
        return redirect()->back();
    }

    
}
