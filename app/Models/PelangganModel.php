<?php namespace App\Models;
 
 use CodeIgniter\Model;
  
 class PelangganModel extends Model{
 
     protected $table = "pelanggan";
     protected $allowedFields = ['id_pelanggan','nama_pelanggan','password','alamat_pelanggan','no_hp_pelanggan'];
     protected $primaryKey = "id_user";
 
     public function getAllPelanggan()
     {
         $builder =$this->db->table('pelanggan');
        $quary   = $builder->get();
        return $quary->getResult();
     }
    
    public function getId($id_pelanggan)
    {
        $db = \Config\Database::connect();

    $builder = $db->table('servis');
    $builder->select('servis.*, barang.nama_barang, users.username');
    $builder->join('barang', 'barang.id_barang = servis.id_barang', 'left');
    $builder->join('users', 'users.id = servis.id_user', 'left');
    $builder->where('servis.nik', $nik);

    $query = $builder->get();
    $result = $query->getResult();

    return $result;
    }
   

 
    
}