<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Dashboard extends CI_Controller {
 
public function __construct() {
    parent::__construct();
    $this->load->model('admin_model');
    $this->load->model('kategori_model');
    $this->load->model('daerah_model');
    $this->load->model('promo_model');
    $this->load->model('kontributor_model'); 
    $this->load->model('produk_model');
    $this->load->model('hotel_model');
         if( $this->session->userdata('logged_in'))
                    {
                    $this->load->view('admin/dashboard');
                    }else{
		redirect(site_url().'admin/auth','refresh');

                    }
}
        
    function index() {

      $data['title']='Pesona Sumatera Utara';
      $data['judul']='Wismut 2016';
      $this->load->view('admin/header',$data);
      $this->load->view('admin/dashboard');
      $this->load->view('admin/footer');
       
    }
   //admin profile
    public function profile()
    {
       $id=$this->session->userdata('id_admin');
       $data['title']='Pesona Sumatera Utara';
       $data['judul']='Wismut 2016';
       $data['profile']=$this->admin_model->edit_profile($id);
       $this->load->view('admin/header',$data);
       $this->load->view('admin/v_profile',$data);
       $this->load->view('admin/footer');
    }
    
    public function update_profile()
    {
      $oldpass= md5($this->session->userdata('password'));
      $id=  $this->input->post('id');
      $this->form_validation->set_rules('nama','nama','required');
      $this->form_validation->set_rules('email','email','required|valid_email');
      $this->form_validation->set_rules('username','username','required');
      $this->form_validation->set_rules('password','password','required|md5');
      $this->form_validation->set_rules('new_pass','new_pass','required|md5');
      
      if($this->form_validation->run() != true)
      {
          $data['title']='Pesona Sumatera Utara';
          $data['judul']='Wismut 2016';
          $data['profile']=$this->admin_model->edit_profile($id);
          $this->load->view('admin/header',$data);
          $this->load->view('admin/v_profile',$data);
          $this->load->view('admin/footer');
      }  else {
          $nama = $this->input->post('nama');
          $email = $this->input->post('email');
          $username = $this->input->post('username');
          $password = md5($this->input->post('password'));
          $new_pass = md5($this->input->post('new_pass'));
          $foto = $this->input->post('foto');
       if($password==$oldpass){
           if($_FILES['foto']['name'] == ""){				
				$d = array(
					'nama' => $nama,
					'email' => $email,
					'username' => $username,
                                        'password' => $new_pass
					);
                                $this->admin_model->update_profile($d,$id);
                                $this->session->set_userdata($d);
				redirect('admin/dashboard/profile/diupdate','refresh');
       }else{
                                $config['upload_path'] = './gambar_posting/';
				$config['allowed_types'] = 'gif|jpg|png';			
				$this->load->library('upload', $config);
				$this->upload->do_upload('foto');
				$data = array('upload_data' => $this->upload->data());
				$d = array(
					'nama' => $nama,
					'email' => $email,
					'username' => $username,
                                        'password' => $new_pass,									
					'foto' => $data['upload_data']['file_name']
					);
				$this->admin_model->update_profile($d,$id);
                                $this->session->set_userdata($d);
				redirect('admin/dashboard/profile/diupdate','refresh');
       }
       
      }else{
          redirect('admin/dashboard/profile/error','refresh');
      }
    }
    }

    //kategori produk
    function kategori()
    {
       $data['title']='Pesona Sumatera Utara';
      $data['judul']='Wismut 2016';
        $data['kategori']= $this->kategori_model->kategori();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/v_kategori',$data);
        $this->load->view('admin/footer');
    }
    function tambah_kategori()
    {
        $data['title']='Pesona Sumatera Utara';
        $data['judul']='Wismut 2016';
        
        $this->load->library('form_validation');
		$this->form_validation->set_rules('kategori','kategori','required');
		$this->form_validation->set_message('kategori','Kategori harus di isi');
		if($this->form_validation->run()=="true"){
			$data = array(
				'kategori' => $this->input->post('kategori')
				);
			$this->kategori_model->tambah_kategori($data);
                       redirect(site_url().'admin/dashboard/kategori/ditambah');

                        }else{			
			$data['kategori'] = $this->kategori_model->kategori();
			$this->load->view('admin/header',$data);
			$this->load->view('admin/v_kategori',$data);
			$this->load->view('admin/footer');
		}
        
        }
        

        function edit_kategori($id){
            $data['title']='Pesona Sumatera Utara';
             $data['judul']='Wismut 2016';
		$data['kategori'] = $this->kategori_model->kategori();
		$data['edit_kategori'] = $this->kategori_model->edit_kategori($id);
		$this->load->view('admin/header',$data);
		$this->load->view('admin/v_kategori_edit',$data);
		$this->load->view('admin/footer');
	}
        
        function update_kategori(){
		$data = array(
			'kategori' => $this->input->post('kategori')
			);
		$id = $this->input->post('id');
		$this->kategori_model->update_kategori($id,$data);
		redirect(site_url().'admin/dashboard/kategori/diupdate');
	}
        
	function hapus_kategori($id){
		$this->kategori_model->hapus_kategori($id);
		redirect(site_url().'admin/dashboard/kategori/dihapus');
	}
        
        
        //daftar daerah wisata
        function daerah()
         {
             $data['title']='Pesona Sumatera Utara';
             $data['judul']='Wismut 2016';
             $data['daerah']= $this->daerah_model->daerah();
             $this->load->view('admin/header',$data);
             $this->load->view('admin/v_daerah',$data);
             $this->load->view('admin/footer');
         }
        function tambah_daerah()
    {
        $data['title']='Pesona Sumatera Utara';
        $data['judul']='Wismut 2016';
        
        $this->load->library('form_validation');
		$this->form_validation->set_rules('daerah','daerah','required');
		$this->form_validation->set_message('daerah','daerah harus di isi');
		if($this->form_validation->run()=="true"){
			$data = array(
				'kota' => $this->input->post('daerah')
				);
			$this->daerah_model->tambah_daerah($data);
                       redirect(site_url().'admin/dashboard/daerah/ditambah');

                        }else{			
			$data['daerah'] = $this->daerah_model->daerah();
			$this->load->view('admin/header',$data);
			$this->load->view('admin/v_daerah',$data);
			$this->load->view('admin/footer');
		}
        
        }
        

        function edit_daerah($id){
            $data['title']='Pesona Sumatera Utara';
             $data['judul']='Wismut 2016';
		$data['daerah'] = $this->daerah_model->daerah();
		$data['edit_daerah'] = $this->daerah_model->edit_daerah($id);
		$this->load->view('admin/header',$data);
		$this->load->view('admin/v_daerah_edit',$data);
		$this->load->view('admin/footer');
	}
        
        function update_daerah(){
		$data = array(
			'daerah' => $this->input->post('daerah')
			);
		$id = $this->input->post('id');
		$this->daerah_model->update_daerah($id,$data);
		redirect(site_url().'admin/dashboard/daerah/diupdate');
	}
        
	function hapus_daerah($id){
		$this->daerah_model->hapus_daerah($id);
		redirect(site_url().'admin/dashboard/daerah/dihapus');
	}
        
        
        //promo wisata
        function wisata_view()
        {
            $data['title']='Pesona Sumatera Utara';
            $data['judul']='Wismut 2016';
            $data['promo_wisata']= $this->promo_model->promo_getAll();
            $this->load->view('admin/header',$data);
            $this->load->view('admin/v_promo_wisata',$data);
            $this->load->view('admin/footer');
        }
        
        /*
        function promo_wisata_baru()
        {
            $data['title']='Pesona Sumatera Utara';
            $data['judul']='Wismut 2016';
            $data['kategori']=  $this->kategori_model->kategori();
            $data['daerah']= $this->daerah_model->daerah();
            $this->load->view('admin/header',$data);
            $this->load->view('admin/v_promo_wisata_baru',$data);
            $this->load->view('admin/footer');
        }
        function promo_wisata_act()
        {
            $this->form_validation->set_rules('judul','judul','required');
            $this->form_validation->set_rules('deskripsi','deskripsi','required');
            $this->form_validation->set_rules('kategori','kategori','required');
            $this->form_validation->set_rules('daerah','daerah','required');
            
            if($this->form_validation->run() != true)
            {
                $data['title']='Pesona Sumatera Utara';
                $data['judul']='Wismut 2016';
                $data['kategori']=  $this->kategori_model->kategori();
                $data['daerah']= $this->daerah_model->daerah();
                $this->load->view('admin/header',$data);
                $this->load->view('admin/v_promo_wisata_baru',$data);
                $this->load->view('admin/footer');
            }else{
                $judul = $this->input->post('judul');
                $deskripsi = $this->input->post('deskripsi');
                $kategori = $this->input->post('kategori');
                $daerah = $this->input->post('daerah');
                $config['upload_path']='./gambar_post/';
                $config['allowed_type']='gif|jpg|jpeg|png';
                $this->load->library('upload',$config);
                $this->upload->do_upload('gambar');
                $data = array('upload_data' => $this->upload->data());
                $d = array (
                    'judul' => $judul,
                    'deskripsi' => $deskripsi,
                    'kategori' => $kategori,
                    'daerah' => $daerah,
                    'tanggal' => date('Y-m-d'),
                    'author' => $this->session->userdata('id_kontributor'),
                    'gambar' => $data['upload_data']['file_name']
                );
                $this->promo_model->promo_wisata_act($d);
                redirect('admin/dashboard/promo_wisata/oke','refresh');
            }
        }
        **/
        function produk_view()
        {
            $data['title']='Pesona Sumatera Utara';
            $data['judul']='Wismut 2016';
            $data['produk']= $this->produk_model->produk_getAll();
            $this->load->view('admin/header',$data);
            $this->load->view('admin/v_produk',$data);
            $this->load->view('admin/footer');
        }
        
        function hotel_view()
        {
            $data['title']='Pesona Sumatera Utara';
            $data['judul']='Wismut 2016';
            $data['hotel']= $this->hotel_model->hotel_getAll();
            $this->load->view('admin/header',$data);
            $this->load->view('admin/v_hotel',$data);
            $this->load->view('admin/footer');
        }
                
        function kontributor_view()
        {
            $data['title']='Pesona Sumatera Utara';
            $data['judul']='Wismut 2016';
            $data['kontributor']= $this->kontributor_model->getAll();
            $this->load->view('admin/header',$data);
            $this->load->view('admin/v_kontributor',$data);
            $this->load->view('admin/footer');
        }
        function detail_kontributor($id)
        {
            $data['title']='Pesona Sumatera Utara';
            $data['judul']='Wismut 2016';
            $data['detail']=  $this->kontributor_model->detail($id);
            $this->load->view('admin/header',$data);
            $this->load->view('admin/v_detail',$data);
            $this->load->view('admin/footer');
        }
        
        function kontributor_action()
        {
           $data = array(
             'is_active' =>$this->input->post('is_active') 
           );
           $id = $this->input->post('id');
           $this->kontributor_model->action($id,$data);
           redirect(site_url().'admin/dashboard/detail_kontributor/success');
        }
        
}