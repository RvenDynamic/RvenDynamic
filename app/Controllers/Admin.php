<?php

namespace App\Controllers;
use \App\Models\ServisModel;
use \App\Models\BarangModel;
use \App\Models\UserModel;
use \App\Models\PelangganModel;
use \App\Models\TestimoniModel;


class Admin extends BaseController
{
    protected $servisModel;
    protected $barangModel;
    protected $userModel;
    protected $pelangganModel;
    protected $testimoniModel;
    


    public function __construct()
    {
        $this->servisModel =  new ServisModel();
        $this->userModel =  new UserModel();
        $this->pelangganModel =  new PelangganModel();
        $this->testimoniModel =  new TestimoniModel();
        $this->barangModel =  new BarangModel();
    }
    

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'jumlah_servis' => $this->servisModel->countAll(),
            'jumlah_pelanggan' => $this->pelangganModel->countAll(),
            'jumlah_user' => $this->userModel->countAll(),
            'jumlah_testi' => $this->testimoniModel->countAll(),
            'jumlah_barang' => $this->barangModel->countAll(),
        ];

        return view('admin/index', $data);
    }
    public function barang()
    {
        $data = [
            'title' => 'Data Barang',
            'barang' => $this->barangModel->getAllBarang(),
        ];

        return view('admin/data_barang', $data);
    }

    public function servis()
    {
        $data = [
            'title' => 'Data Servis',
            'servis' => $this->servisModel->getAllServis(),
            'pelanggan' => $this->pelangganModel->getAllPelanggan(),
            'user' => $this->userModel->getAllUser(),
            'barang' => $this->barangModel->getAllBarang(),
        ];

        return view('admin/data_servis', $data);

    }
    public function pelanggan()
    {
        $data = [
            'title' => 'Data Pelanggan',
            'pelanggan' => $this->pelangganModel->getAllPelanggan(),
        ];

        return view('admin/data_pelanggan', $data);
    }
    public function testimoni()
    {
        $data = [
            'title' => 'Testimoni Pelanggan',
            'testimoni' => $this->testimoniModel->getAllTestimoni(),
        ];

        return view('admin/testimoni', $data);
    }
    public function user()
    {
        $data = [
            'title' => 'Data User',
            'user' => $this->userModel->getAllUser(),
        ];

        return view('admin/user', $data);
    }
   
}