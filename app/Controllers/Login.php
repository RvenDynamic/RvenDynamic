<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
 
class Login extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('/login/index');
    } 
 
    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $email)->first();
        if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'id'       => $data['id'],
                    'username'     => $data['username'],
                    'level'    => $data['level'],
                    'alamat'    => $data['alamat'],
                    'no_hp'    => $data['no_hp'],
                    'picture'    => $data['picture'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/admin/index');
            }else{
                $session->setFlashdata('msg', 'Password salah');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'username  tidak ditemukan');
            return redirect()->to('/login');
        }
    }
 
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/home');
    }
}