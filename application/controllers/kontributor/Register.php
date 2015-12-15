<?php

class Register extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
                $this->load->database();
		$this->load->model('kontributor_model');
                $this->load->model('daerah_model');
                //$this->load->library('form_validation');
                $this->load->helper(array('form','url'));
                $this->load->library(array('session', 'form_validation', 'email'));
	}
        
        function index()
        {
            $this->register();
        }
        
        public function register()
        {
            //set validation rules
               $data['daerah']=  $this->daerah_model->daerah();
                
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[kontributor.email]');
		$this->form_validation->set_rules('daerah', 'Daerah', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[kontributor.username]');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
		//$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]|md5');
        
         //validate form input
                if($this->form_validation->run() == FALSE)
                {
                    $this->load->view('kontributor/register',$data);
                }
                else
                {
                    $data= array(
                      'nama' => $this->input->post('nama'),
                      'email' => $this->input->post('email'),
                      'daerah' => $this->input->post('daerah'),
                      'username' =>  $this->input->post('username'),
                      'password' => $this->input->post('password'),
                      'is_active' => 'Y'
                    );
                    if($this->kontributor_model->insertUser($data))
                    {
                        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please confirm the mail sent to your Email-ID!!!</div>');
                        redirect('kontributor/register');
                    }
                    else
                    {
                        $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                         redirect('kontributor/register');
                    }
                }
        }
}
