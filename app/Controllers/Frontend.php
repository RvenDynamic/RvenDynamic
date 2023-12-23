<?php

namespace App\Controllers;
use \App\Models\ServisModel;
use \App\Models\BarangModel;
use \App\Models\PelangganModel;
use \App\Models\TestimoniModel;


class Frontend extends BaseController
{
    protected $servisModel;
    protected $barangModel;
    protected $pelangganModel;
    protected $testimoniModel;
    


    public function __construct()
    {
        $this->servisModel =  new ServisModel();
        $this->barangModel =  new BarangModel();
        $this->pelangganModel =  new PelangganModel();
        $this->testimoniModel =  new TestimoniModel();
    }
    

    public function index()
    {
        $data = [
            'title' => 'Selater',
            'servis' => $this->servisModel->getAllServis(),
            'pelanggan' => $this->pelangganModel->getAllPelanggan(),
            'barang' => $this->barangModel->getAllBarang(),
            'testi' => $this->testimoniModel->getAllTestimoni(),
        ];

        return view('frontend/index', $data);
    }
   
}