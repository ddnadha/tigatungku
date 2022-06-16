<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Ingredient;

class IngredientController extends BaseController
{
    private $ingre;
    function __construct()
    {
        // parent::__construct();
        $this->ingre = new Ingredient();

    }
    public function index()
    {
        $data['ingres'] = $this->ingre->findAll();
        return view('pages/admin/ingre/index', $data);
    }
}
