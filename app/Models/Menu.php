<?php

namespace App\Models;

use CodeIgniter\Model;

class Menu extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'menus';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

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

    public function joinCart($type = 'left')
    {
        return $this->db->table('menus')
            ->select('*,menus.id as id, carts.id as cart_id')
            ->join('carts', 'menus.id = carts.menu_id and carts.user_id = '.session()->get('userdata')->id, $type)
            ->get()->getResult();
    }

    public function withSold(){
        return $this->db->table('menus')
            ->select('menus.*, sum(qty) as sold')
            ->join('order_menus', 'menus.id = order_menus.menu_id', 'inner')
            ->groupBy('menu_id')
            ->get()->getResult();
    }
}
