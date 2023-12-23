<?php

namespace App\Models;

use CodeIgniter\Model;

class ServisModel extends Model
{
    
    protected $table            = 'servis';
    protected $allowedFields    = ['id_user', 'id_barang', 'harga', 'tgl', 'garansi','status'];
    protected $primaryKey       = 'id_servis';

    public function getAllServis()
    {
        $builder =$this->db->table('servis');
       $builder->join('barang', 'barang.id_barang = servis.id_barang');
       $builder->join('users', 'users.id = servis.id_user');
       $quary   = $builder->get();
       return $quary->getResult();
    }
    public function getServisById($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_servis' => $id])->first();
    }
}