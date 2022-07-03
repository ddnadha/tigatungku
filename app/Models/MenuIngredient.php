<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuIngredient extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'menu_ingredients';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];


    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function joinIng(){
        return $this->db->table('menu_ingredients')
            ->select('*, menu_ingredients.id as menusing_id')
            ->join('ingredients', 'menu_ingredients.ing_id = ingredients.id')
            ->get()
            ->getResult();
    }
}
