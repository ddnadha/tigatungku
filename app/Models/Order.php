<?php

namespace App\Models;

use CodeIgniter\Model;

class Order extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'orders';
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

    public function findType(string $status): array
    {
        return $this->db->table('orders')
            ->select('orders.*, users.name')
            ->join('users', 'orders.user_id = users.id', 'inner')
            ->where('status', $status)
            ->get()->getResult();
    }

    public function countIncome($month = null){
        if ($month == null) date('n');
        return $this->db->table('orders')
            ->select('sum(total) as income')
            ->where('status', 'done')
            ->get()->getFirstRow();
    }

    public function graphIncome($month = null): array
    {
        if ($month == null) date('n');
        return $this->db->table('orders')
            ->select('sum(total) as income, date(created_at) as date')
            ->where('status', 'done')
            ->groupBy('date')
            ->get()->getResult();
    }
    public function countSold($month = null)
    {
        if ($month == null) date('n');
        return $this->db->table('order_menus')
            ->select('sum(qty) as sold, date(created_at) as date')
            ->join('orders', 'order_menus.order_id = orders.id', 'inner')
            ->groupBy('date')
            ->get()->getFirstRow();
    }

    public function graphSold($month = null): array
    {
        if ($month == null) date('n');
        return $this->db->table('order_menus')
            ->select('sum(order_menus.qty) as qty, date(orders.created_at) as date')
            ->join('orders', 'order_menus.order_id = orders.id', 'inner')
            ->groupBy('date')
            ->get()->getResult();
    }
}
