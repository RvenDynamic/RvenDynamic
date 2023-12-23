<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class UserModel extends Model{

    protected $table = "users";
    protected $allowedFields = ['id','username','password','level','alamat','no_hp','picture'];
    protected $primaryKey = "id";

    public function getAllUser()
    {
        $builder =$this->db->table('users');
       $quary   = $builder->get();
       return $quary->getResult();
    }
}