<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class TestimoniModel extends Model{

    protected $table = "testimoni";
    protected $allowedFields = ['id_testi','id_pelanggan','id_barang','bintang','testi'];
    protected $primaryKey = "id_testi";

    public function getAllTestimoni()
    {
       $builder =$this->db->table('testimoni');
       $builder->join('barang', 'barang.id_barang = testimoni.id_barang');
       $builder->join('pelanggan', 'pelanggan.id_pelanggan = testimoni.id_pelanggan');
       $quary   = $builder->get();
       return $quary->getResult();
    }
}