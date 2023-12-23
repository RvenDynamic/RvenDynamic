<?php

namespace App\Controllers;
use \App\Models\BarangModel;


class Barang extends BaseController
{
    protected $barangModel;
    protected $helpers = ['form'];


    public function __construct()
    {
        $this->barangModel =  new BarangModel();
    }
    

    public function index()
    {
        $data = [
            'title' => 'Selater',
            'barang' => $this->barangModel->getAllBarang(),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/data_barang', $data);
    }

    public function simpan(){
        if (
            !$this->validate([
                'nama_barang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'merk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'proc' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'vga' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'seri' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'warna' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'hardisk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'memori' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'kelengkapan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'kerusakan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
            ])
        ) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('/barang')->withInput();
        }
        // validasi data sukses
        $this->barangModel->save([

            'nama_barang' => $this->request->getVar('nama_barang'),
            'merk' => $this->request->getVar('merk'),
            'proc' => $this->request->getVar('proc'),
            'vga' => $this->request->getVar('vga'),
            'seri' => $this->request->getVar('seri'),
            'warna' => $this->request->getVar('warna'),
            'hardisk' => $this->request->getVar('hardisk'),
            'memori' => $this->request->getVar('memori'),
            'kelengkapan' => $this->request->getVar('kelengkapan'),
            'kerusakan' => $this->request->getVar('kerusakan'),

        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!.');
        // kembali ke halaman index barang
        return redirect()->to('/barang');
    }
   
}