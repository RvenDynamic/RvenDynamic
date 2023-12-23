<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class BarangModel extends Model{

    protected $table = "barang";
    protected $allowedFields = ['id_barang','nama_barang','merk','proc','vga','seri','warna','hardisk','memori','kelengkapan','kerusakan'];
    protected $primaryKey = "id_barang";

    public function getAllBarang()
    {
        $builder =$this->db->table('barang');
       $quary   = $builder->get();
       return $quary->getResult();
    }
    public function getBarangById($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_barang' => $id])->first();
    }
}