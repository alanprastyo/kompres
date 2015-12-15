<?php

class Mainpage extends CI_Controller
{
    function __construct() {
        parent::__construct();
    }

    public function index()
    {
      $data['judul']='Wisata Sumatera Utara 2016';
      $data['footer']='Wisata Sumut 2016';
      $this->load->view('header',$data);
      $this->load->view('mainpage');
      $this->load->view('footer');
          
    }
    function login_all()
    {
        $data['judul']='Login Area Wismut 2016';
        $this->load->view('login',$data);
    }
}

