<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
    }
    function index()
    {
        $this->akun();  
    }
    function akun($id)
    {
       $id=$this->session->userdata('id_admin');
       $data['title']='Pesona Sumatera Utara';
       $data['judul']='Wismut 2016';
       
    }
}