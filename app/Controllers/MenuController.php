<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Menu;
use App\Models\Ingredient;
use App\Models\MenuIngredient;

class MenuController extends BaseController
{
    private $menu;
    function __construct()
    {
        $this->menu = new Menu();
        $this->ing = new Ingredient();
        $this->menuing = new MenuIngredient();
    }

    public function index()
    {
        $data['menus'] = $this->menu->withSold();        //get data dari database
        return view('pages/admin/menu/index', $data);   //mengembalikan view beserta data
    }

    public function show($id){
        $data['menu'] = $this->menu->find($id);
        $data['ingre'] = $this->menuing->where('menu_id', $id)->joinIng();
        return view('pages/admin/menu/detail', $data);
    }

    public function create(){
        $data['ing'] = $this->ing->findAll();                               //get data dari database
        $data['tmping'] = $this->menuing->where('menu_id', 0)->joinIng();   //get data dari database
        return view('pages/admin/menu/create', $data);                      //menampilkan form
    }

    public function store(){
        $img = $this->request->getFile('img');
        $fileName = $img->getRandomName();
        $this->menu->insert([
            'name'          => $this->request->getVar('name'),
            'unit'          => $this->request->getVar('unit'),
            'price'         => $this->request->getVar('price'),
            'description'   => $this->request->getVar('description'),
            'img'           => $fileName,
        ]);
         $img->move('uploads/img/menu/', $fileName);
        $tmping = $this->menuing->where('menu_id', 0)->findAll();
        foreach($tmping as $t){
            $this->menuing->update($t->id, [
                'menu_id' => $this->menu->getInsertID(),
            ]);
        }
        return redirect()->to(base_url('admin/menu'));
    }

    public function storeTmpIng(){
        $existedData = $this->menuing->where('menu_id', 0)
                        ->where('ing_id', $this->request->getVar('bahan'))
                        ->first();
        if ($existedData != null) {
            $this->menuing->update( $existedData->id, [
                'qty' => $existedData->qty + $this->request->getVar('butuh')
            ]);
        }else{
            $this->menuing->insert([
                'menu_id' => 0,
                'ing_id' => $this->request->getVar('bahan'),
                'qty' => $this->request->getVar('butuh'),
            ]);
        }
        return redirect()->back();
    }

    public function deleteTmpIng($id){
        $this->menuing->delete($id);
        return redirect()->back();
    }

    public function destroy($id){
        $this->menu->delete($id);
        return redirect()->back();
    }
}
