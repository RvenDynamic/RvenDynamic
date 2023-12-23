<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;

 
class Register extends Controller
{

    protected $userModel;

    public function __construct()
    {
        $this->userModel =  new UserModel();

    }

    public function index()
    {
        $data = [
            
            
            'validation' => \Config\Services::validation()
            
        ];

        return view('/register/index', $data);
    }
    


    public function save()
    {
        if (!$this->validate([
         
            
    
            'username' => [
                'rules' => 'required|min_length[3]|max_length[20]',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[200]',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'repassword' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'matches' => 'samakan password'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus dipilih'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus dipilih'
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus dipilih'
                ]
            ],
            'picture' => [
                'rules' => 'max_size[picture,1024]|is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Pilih File / Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',
                ]
            ]
        ])) {
            
            // jika data tidak valid kembalikan ke halaman register
        
            session()->setFlashdata('error', 'masukan data sesuai ketentuan yang dibawah');
            
            return redirect()->to('/register')->withInput();
        }

        // ambil gambar
        $fileUser = $this->request->getFile('picture');

        // apakah tidak ada gambar yang di upload
        if ($fileUser->getError() == 4) {
            $namaUser = 'default.jpg';
        } else {
            // generate nama sampul random
            $namaUser = $fileUser->getRandomName();

            // pindahkan file ke folder img
            $fileUser->move('img/users', $namaUser);
        }
        // validasi data sukses
        $this->userModel->save([
            
            'username'     => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'level'    => $this->request->getVar('level'),
            'picture' => $namaUser
                    
           
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('regis', 'akun berhasil dibuat');
        // kembali ke halaman index Pegawai
        return redirect()->to('/login');
    }
}