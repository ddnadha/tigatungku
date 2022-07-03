<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\HistoryIngredient;
use App\Models\Ingredient;

class IngredientController extends BaseController
{
    private Ingredient $ingredient;
    private HistoryIngredient $history;
    function __construct()
    {
        // parent::__construct();
        $this->ingredient = new Ingredient();
        $this->history = new HistoryIngredient();

    }
    public function index(): string
    {
        $data['ingres'] = $this->ingredient->findAll();
        return view('pages/admin/ingre/index', $data);
    }

    public function show($id): string
    {
        $data['ingre'] = $this->ingredient->find($id);
        $data['history'] = $this->history->where('ingredient_id', $id)->orderBy('buy_date')->findAll();
        return view('pages/admin/ingre/detail', $data);
    }

    public function create(): string
    {
        return view('pages/admin/ingre/create');
    }

    public function store(): \CodeIgniter\HTTP\RedirectResponse
    {
        $this->ingredient->insert($this->request->getVar());
        return redirect()->to(base_url('/admin/ingre'));
    }

    public function edit($id): string
    {
        $data['ingre'] = $this->ingredient->find($id);
        return view('pages/admin/ingre/update', $data);
    }

    public function update($id): \CodeIgniter\HTTP\RedirectResponse
    {
        $this->ingredient->update($id, $this->request->getVar());
        return redirect()->to(base_url('/admin/ingre'));
    }

    public function destroy($id): \CodeIgniter\HTTP\RedirectResponse
    {
        $this->ingredient->delete($id);
        return redirect()->back();
    }

    public function createRestock(): string
    {
        $data['ing'] = $this->ingredient->findAll();
        return view('pages/admin/ingre/restock', $data);
    }

    public function storeRestock(): \CodeIgniter\HTTP\RedirectResponse
    {
        $ingre = $this->ingredient->find($this->request->getVar('bahan'));
        $this->history->insert([
            'ingredient_id' => $this->request->getVar('bahan'),
            'price' => $this->request->getVar('price'),
            'qty' => $this->request->getVar('stock'),
            'buy_date' => date_format(date_create($this->request->getVar('date')), 'Y-m-d'),
        ]);
        $this->ingredient->update($this->request->getVar('bahan'), [
            'stock' => $ingre->stock + $this->request->getVar('stock'),
            'price' => $this->request->getVar('price'),
        ]);
        return redirect()->to(base_url('/admin/ingre/restock'));
    }
}
