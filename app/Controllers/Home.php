<?php

namespace App\Controllers;
use \App\Models\DokterModel;
use \App\Models\PoliModel;
use \App\Models\PasienModel;

use CodeIgniter\API\ResponseTrait;


class Home extends BaseController
{
    protected $dokterModel;
    protected $poliModel;
    protected $pasienModel;
    use ResponseTrait;


    public function __construct()
    {
        $this->dokterModel =  new DokterModel();
        $this->poliModel =  new PoliModel();
        $this->pasienModel =  new PasienModel();
        session();


       
    }

    public function index()
    {
        $data = [
            
            'dokter' => $this->dokterModel->getAllDokter(),
            'poli' => $this->poliModel->getAllPoli(),
           

            

           
        ];
        return view('front_end', $data);
    }

    

    public function cariData()
    {
        $nik = $this->request->getPost('nik');

    // Lakukan validasi NIK jika diperlukan

    // Cari data pasien berdasarkan NIK
    $pasienModel = new PasienModel();
    $dataPasien = $pasienModel->where('nik', $nik)->first();

    if ($dataPasien) {
        // Jika data pasien ditemukan, kirim respons dengan data pasien dalam format JSON
        $response = [
            'success' => true,
            'data' => [
                'nama_pasien' => $dataPasien['nama_pasien'],
                'tempat_lahir' => $dataPasien['tempat_lahir'],
                'tanggal_lahir' => $dataPasien['tanggal_lahir'],
                'hp' => $dataPasien['hp'],
                'nik2' => $dataPasien['nik'],
                'id_pasien' => $dataPasien['id_pasien'],
            ],
            'ok' => 'Data pasien ditemukan'

        ];
        return $this->response->setJSON($response);
    } else {
        // Jika data pasien tidak ditemukan, kirim respons dengan pesan error dalam format JSON
        $response = [
            'success' => false,
            'message' => 'Data pasien tidak ditemukan'
        ];
        return $this->response->setJSON($response);
    }
    }

    public function simpan_baru()
    {
        if (!$this->validate([
         
            
    
            'nama_pasien2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nik1' => [
                'rules' => 'required|max_length[16]|is_unique[rawat_jalan.nik]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'max_length' => 'Maksimal 16 Digit',
                    'is_unique' => 'Anda sudah pernah regristrasi dan NIK anda sudah terdaftar. ',

                ]
            ],
            'tempat_lahir2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tanggal_lahir2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'hp2' => [
                'rules' => 'required|max_length[13]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'max_length' => 'No hp Gk lebih 13 T*lol',

                ]
            ],
        ])) {
           // Jika data tidak valid, dapatkan pesan error
                $errors = $this->validator->getErrors();

                // Simpan pesan error ke session
                session()->setFlashdata('errors', $errors);
                session()->setFlashdata('pesan_gagal', 'Ada Yang Error Cek From Regristrasi');


                // Kembalikan pengguna ke halaman yang sesuai
                return redirect()->to('/home')->withInput();
        }

       
        // validasi data sukses
        $this->pasienModel->save([
            
            'nama_pasien' => $this->request->getVar('nama_pasien2'),
            'nik' => $this->request->getVar('nik1'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir2'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir2'),
            'hp' => $this->request->getVar('hp2'),
            'tanggal_kunjungan' => $this->request->getVar('tanggal_kunjungan2'),
            'id_poli' => $this->request->getVar('id_poli'),
            'id_dokter' => $this->request->getVar('id_dokter'),
           
           
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan_berhasil', 'Selamat Anda Telah Berhasil Registrasi Rawat Jalan');
        // kembali ke halaman index Pegawai
        return redirect()->to('/home');
    }


    public function simpan_lama()
    {
       

       
        $id_pasien = $this->request->getVar('id_pasien3');
        $nama_pasien = $this->request->getVar('nama_pasien3');
        $nik = $this->request->getVar('nik2');
        $tempat_lahir = $this->request->getVar('tempat_lahir3');
        $tanggal_lahir = $this->request->getVar('tanggal_lahir3');
        $hp = $this->request->getVar('hp3');
        $tanggal_kunjungan = $this->request->getVar('tanggal_kunjungan3');
        $id_poli = $this->request->getVar('poli2');
        $id_dokter = $this->request->getVar('dokter2');
        
        $dataPasien = [
            'nama_pasien' => $nama_pasien,
            'nik' => $nik,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'hp' => $hp,
            'tanggal_kunjungan' => $tanggal_kunjungan,
            'id_poli' => $id_poli,
            'id_dokter' => $id_dokter,
        ];
        $this->pasienModel->update($id_pasien, $dataPasien);
        
        // Tampilkan pesan sukses
        session()->setFlashdata('pesan_berhasil2', 'Anda telah terdaftar di Rumah Sehat');


        // Kembali ke halaman index atau halaman lain yang sesuai
        return redirect()->to('/home');

    }

    

   
   

   
}