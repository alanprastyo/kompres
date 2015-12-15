<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('pemandu_model');
        $this->load->model('pemesanan');
        $this->load->model('tarif_model');


        if ($this->session->userdata('logged_in')) {
            $this->load->view('pemandu/dashboard');
        } else {
            redirect(site_url() . 'pemandu/auth');
        }
    }

    public function index() {
        $data['title'] = "Pesona sumatra utara";
        $this->load->view('pemandu/header', $data);
        $this->load->view('pemandu/dashboard');
        $this->load->view('pemandu/footer');
    }

    function profile() {
        $id = $this->session->userdata('id_pemandu');
        $data['title'] = 'Pesona Sumatera Utara';
        $data['judul'] = 'Wismut 2016';
        $data['profile'] = $this->pemandu_model->edit_profile($id);
        $this->load->view('pemandu/header', $data);
        $this->load->view('pemandu/v_profile', $data);
        $this->load->view('pemandu/footer');
    }

    function update_profile() {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('jk', 'jenis_kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('noTelpon', 'No Handphone');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir');
        if ($this->form_validation->run() != true) {
            $data['title'] = 'Pesona Sumatera Utara';
            $data['judul'] = 'Wismut 2016';
            $data['profile'] = $this->pemandu_model->edit_profile($id);
            $this->load->view('pemandu/header', $data);
            $this->load->view('pemandu/v_profile', $data);
            $this->load->view('pemandu/footer');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $jk = $this->input->post('jk');
            $alamat = $this->input->post('alamat');
            $no_hp = $this->input->post('noTelpon');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $tempat_lahir = $this->input->post('tempat_lahir');
            if ($_FILES['foto']['name'] == "") {
                $data = array(
                    'nama' => $nama,
                    'email' => $email,
                    'username' => $username,
                    'password' => $password,
                    'jk' => $jk,
                    'alamat' => $alamat,
                    'noTelpon' => $noTelpon,
                    'tgl_lahir' => $tgl_lahir,
                    'tempat_lahir' => $tempat_lahir
                );
                $this->pemandu_model->update_profile($id, $data);
                $this->session->set_userdata($data);
                redirect('pemandu/dashboard/profile/diupdate', 'refresh');
            } else {
                $config['upload_path'] = './foto/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 1024 * 8;
                $config['overwrite'] = true;
                $config['file_name'] = $username;
                $this->load->library('upload', $config);
                $this->upload->do_upload('foto');
                $d = array('upload_data' => $this->upload->data());
                $data = array(
                    'nama' => $nama,
                    'email' => $email,
                    'username' => $username,
                    'password' => $password,
                    'jk' => $jk,
                    'alamat' => $alamat,
                    'noTelpon' => $noTelpon,
                    'tgl_lahir' => $tgl_lahir,
                    'tempat_lahir' => $tempat_lahir,
                    'foto' => $d['upload_data']['file_name']
                );
                $this->pemandu_model->update_profile($id, $data);
                $this->session->set_userdata($data);
                redirect('pemandu/dashboard/profile/diupdate', 'refresh');
            }
        }
    }

    public function list_pemesanan() {
        $data['title'] = 'Pesona Sumatera Utara';
        $data['judul'] = 'Wismut 2016';
        $data['pemesanan'] = $this->pemesanan->getPemesanan()->result();
        $data['tarifPemandu']= $this->tarif_model->getTarif()->result();
        $this->load->view('pemandu/header', $data);
        $this->load->view('pemandu/v_list_pemesanan', $data);
        $this->load->view('pemandu/footer');
    }
}
