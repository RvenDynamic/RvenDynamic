<?php

namespace App\Controllers;
use \App\Models\ServisModel;
use \App\Models\BarangModel;
use \App\Models\UserModel;


class Servis extends BaseController
{
    protected $servisModel;
    protected $barangModel;
    protected $userModel;
    protected $helpers = ['form'];


    public function __construct()
    {
        $this->servisModel =  new ServisModel();
        $this->barangModel =  new BarangModel();
        $this->userModel =  new UserModel();
    }
    

    public function index()
    {
        $data = [
            'title' => 'Selater',
            'servis' => $this->servisModel->getAllServis(),
            'barang' => $this->barangModel->getAllBarang(),
            'user' => $this->userModel->getAllUser(),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/data_servis', $data);
    }

    public function simpan(){
        if (
            !$this->validate([
                'id_barang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'id_user' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'harga' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'tgl' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'garansi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'status' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
            ])
        ) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('/servis')->withInput();
        }
        // validasi data sukses
        $this->servisModel->save([

            'id_barang' => $this->request->getVar('id_barang'),
            'id_user' => $this->request->getVar('id_user'),
            'harga' => $this->request->getVar('harga'),
            'tgl' => $this->request->getVar('tgl'),
            'garansi' => $this->request->getVar('garansi'),
            'status' => $this->request->getVar('status'),

        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!.');
        // kembali ke halaman index servis
        return redirect()->to('/servis');
    }
   
}