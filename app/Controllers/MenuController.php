<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Menu;

class MenuController extends BaseController
{
    private $menu;
    function __construct()
    {
        $this->menu = new Menu();
    }

    public function index()
    {
        $data['menus'] = $this->menu->findAll();         //get data dari database
        return view('pages/admin/menu/index', $data);   //mengembalikan view beserta data
    }
}
