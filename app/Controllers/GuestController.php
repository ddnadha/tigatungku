<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Menu;

class GuestController extends BaseController
{
    private $menu;

    function __construct()
    {
        $this->menu = new Menu();
    }
    public function home()
    {
        //
    }

    public function sale(){
        $data['menu'] = $this->menu->joinCart();
        return view('pages/user/sale', $data);
    }

    public function salesconfirm(){
        $data['menu'] = $this->menu->joinCart();
        return view('pages/user/sale-confirm', $data);
    }

    
}
