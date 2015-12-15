<?php

class Auth extends CI_Controller
{
    

    function __construct() {
        parent::__construct();
        $this->load->model('pemandu_model');
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation', 'email'));
        
    }

    public function index()
    {
        $this->loginform();
    }
    
    function loginform()
    {
        $data['title']='Wisata Sumut 2016';
        $data['judul']='Login Pemandu';
        $this->load->view('pemandu/login',$data);
    }
    function proseslogin()
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
          redirect(site_url().'pemandu/auth');
          
      }else{
          $this->load->model('pemandu_model','',TRUE);
          $cekdata = $this->pemandu_model->ceklogin($username,$password);
          
          //cek login
         if($cekdata)
         {
             foreach ($cekdata as $datalogin)
             {
                 $id_pemandu = $datalogin['id_pemandu'];
                 $nama  =$datalogin['nama'];
                 $email =$datalogin['email'];
                 $daerah=$datalogin['daerah'];
                 $foto_ktp=$datalogin['foto_ktp']; 
                 $username =$datalogin['username'];
                 $is_active=$datalogin['is_active'];
             }
             $dalogin=array(
                 'id_pemandu'=> $id_pemandu,
                 'nama' => $nama,
                 'email' => $email,
                 'daerah' => $daerah,
                 'username' => $username,
                 'is_active' => $is_active,
                 'logged_in' => TRUE
                 
             );
             
             //buat sessi
             $this->session->set_userdata($dalogin);
             //direct ke halaman dashboard
             redirect(site_url().'pemandu/dashboard');
             
         }  else {
         //gagal login direct ke form login dan tampilkan kesalahan
         $this->session->set_flashdata('pesan2', 'Username atau Password anda salah');
         redirect(site_url().'pemandu/auth');
         }
      }
    }
    
  public function logout()
  {
      $dalogin=array(
          'id_pemandu'=> '',
                 'nama' => '',
                 'email' => '',
                 'daerah' => '',
                 'username' => '',
                 'is_active' => '',
                 'logged_in' => ''
          
      );
      $this->session->unset_userdata($dalogin);
      $this->session->sess_destroy();
      redirect(site_url().'pemandu/auth');
  }
  
  
  //registrasi
   function registrasi()
    {
        //set validation rules
          //set validation rules
		$this->form_validation->set_rules('nama', 'nama', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[pemandu.email]');
		$this->form_validation->set_rules('daerah', 'Daerah', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[pemandu.username]');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]|md5');
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // fails
            $this->load->view('pemandu/registrasi');
        }
        else
        {
            //insert the user registration details into database
            $data = array(
                'nama' => $this->input->post('nama'),
		'email' => $this->input->post('email'),
                'daerah' => $this->input->post('daerah'),
                'username' => $this->input->post('username'),
		'password' => $this->input->post('password')
            );
            
            // insert form data into database
            if ($this->pemandu_model->insertUser($data))
            {
                // send email
                if ($this->pemandu_model->sendEmail($this->input->post('email')))
                {
                    // successfully sent mail
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please confirm the mail sent to your Email-ID!!!</div>');
                    redirect('pemandu/register');
                }
                else
                {
                    // error
                    $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                    redirect('pemandu/register');
                }
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                redirect('pemandu/register');
            }
        }
    }
    
    function verify($hash=NULL)
    {
        if ($this->pemandu_model->verifyEmailID($hash))
        {
            $this->session->set_flashdata('verify_msg','<div class="alert alert-success text-center">Your Email Address is successfully verified! Please login to access your account!</div>');
            redirect('pemandu/register');
        }
        else
        {
            $this->session->set_flashdata('verify_msg','<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
            redirect('pemandu/register');
        }
    }
  
}