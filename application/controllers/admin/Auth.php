<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
class Auth extends CI_Controller {
  function __construct() {
      parent::__construct();
      $this->load->model('admin_model');
    
  }
  
  public function index()
  {
      $this->loginform();
  }
    
  public function loginform()
  {
      $data['judul']="Area Login Administrator";
      $data['judulform']="Login Administrator";
      $this->load->view('admin/login',$data);
  }
    
  public function proseslogin()
  {
      //input dari form login
      $username = $this->input->post('username');
      $password = md5($this->input->post('password'));//md5 
      
      //validasi form
      $this->form_validation->set_rules('username','username','required|trim');
      $this->form_validation->set_rules('password','password','required|trim');
      
      //jalankan validasi form
      if($this->form_validation->run()==FALSE)
      {
          $this->session->set_flashdata('pesan1','username dan password masih kosong');
          redirect(site_url().'admin/auth');
          
      }else{
          $this->load->model('admin_model','',TRUE);
          $cekdata = $this->admin_model->ceklogin($username,$password);
          
          //cek login
         if($cekdata)
         {
             foreach ($cekdata as $datalogin)
             {
                 $id_admin = $datalogin['id_admin'];
                 $username =$datalogin['username'];
                 $nama  =$datalogin['nama'];
                 $email =$datalogin['email'];
                 $password = $datalogin['password'];
             }
             $dlogin=array(
                 'id_admin'=> $id_admin,
                 'username' => $username,
                 'nama' => $nama,
                 'email' => $email,
                 'password' => $password,
                 'logged_in' => TRUE
                 
             );
             
             //buat sessi
             $this->session->set_userdata($dlogin);
             //direct ke halaman dashboard
             redirect(site_url().'admin/dashboard');
             
         }  else {
         //gagal login direct ke form login dan tampilkan kesalahan
         $this->session->set_flashdata('pesan2', 'Username atau Password anda salah');
         redirect(site_url().'admin/auth');
         }
      }
      
  }
  
  public function logout()
  {
      $dlogin=array(
          'id_admin'=>'',
          'username'=>'',
          'nama'=>'',
          'email'=>'',
          'logged_in'=>'',
          
      );
      $this->session->unset_userdata($dlogin);
      $this->session->sess_destroy();
      redirect(site_url().'admin/auth');
  }
        
}