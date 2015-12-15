<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('kontributor_model');
        $this->load->model('promo_model');
        $this->load->model('kategori_model');
        $this->load->model('daerah_model');
        $this->load->model('produk_model');
        $this->load->model('hotel_model');
        $this->load->model('admin_model');
        
		if( $this->session->userdata('logged_in'))
                    {
                    $this->load->view('kontributor/dashboard');
                    }else{
		redirect(site_url().'kontributor/auth');

                    }
    }
  public function index()
    {
      $id=$this->session->userdata('id_kontributor');
      $data['title']="Pesona sumatra utara";
      $data['judul']='Wismut 2016';
      $data['user'] = $this->kontributor_model->edit_profile($id);
      $this->load->view('kontributor/header', $data);
      $this->load->view('kontributor/dashboard',$data);
      $this->load->view('kontributor/footer');
      
    }
    //kontributor profile
    function profile()
    {
       $id=$this->session->userdata('id_kontributor');
       $data['title']='Pesona Sumatera Utara';
       $data['judul']='Wismut 2016';
       $data['profile']=$this->kontributor_model->edit_profile($id);
       $this->load->view('kontributor/header',$data);
       $this->load->view('kontributor/v_profile',$data);
       $this->load->view('kontributor/footer');
    }

    function update_profile()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('email','email','required');
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('password','password','required');
        $this->form_validation->set_rules('jk','jenis_kelamin','required');
        $this->form_validation->set_rules('alamat','alamat','required');
        $this->form_validation->set_rules('no_hp','No Handphone');
        $this->form_validation->set_rules('tgl_lahir','Tanggal Lahir');
        $this->form_validation->set_rules('tempat_lahir','Tempat Lahir');
		if($this->form_validation->run() != true ){
                        $data['title']='Pesona Sumatera Utara';
                        $data['judul']='Wismut 2016';
			$data['profile']=$this->kontributor_model->edit_profile($id);
			$this->load->view('kontributor/header',$data);
			$this->load->view('kontributor/v_profile',$data);
			$this->load->view('kontributor/footer');
		}else{			
                        $nama = $this->input->post('nama');
                        $email = $this->input->post('email');
                        $username = $this->input->post('username');
                        $password = md5($this->input->post('password'));
			$jk = $this->input->post('jk');
                        $alamat = $this->input->post('alamat');
                        $no_hp = $this->input->post('no_hp');
                        $tgl_lahir = $this->input->post('tgl_lahir');
                        $tempat_lahir = $this->input->post('tempat_lahir');
                if($_FILES['foto']['name'] == ""){
                    $data = array(
					'nama' => $nama,
					'email' => $email,
					'username' => $username,
                                        'password' => $password,
                                        'jk' => $jk,
                                        'alamat' => $alamat,
                                        'no_hp' => $no_hp,
                                        'tgl_lahir' => $tgl_lahir,
                                        'tempat_lahir' => $tempat_lahir
                    );
                    $this->kontributor_model->update_profile($id,$data);
                    $this->session->set_userdata($data);
                    redirect('kontributor/dashboard/profile/diupdate','refresh');
                }else{
                $config['upload_path']='./foto/';
                $config['allowed_types']='gif|jpg|jpeg|png';
                $config['max_size'] = 1024 * 8;
                $config['overwrite'] =true;
                $config['file_name'] = $username;
                $this->load->library('upload',$config);
                $this->upload->do_upload('foto');
                $d = array('upload_data' => $this->upload->data());
				$data = array(
					'nama' => $nama,
					'email' => $email,
					'username' => $username,
                                        'password' => $password,
                                        'jk' => $jk,
                                        'alamat' => $alamat,
                                        'no_hp' => $no_hp,
                                        'tgl_lahir' => $tgl_lahir,
                                        'tempat_lahir' => $tempat_lahir,
                                        'foto' => $d['upload_data']['file_name']
					);
				$this->kontributor_model->update_profile($id,$data);
                                $this->session->set_userdata($data);
				redirect('kontributor/dashboard/profile/diupdate','refresh');
                	
		}		   
    }
    
    }


    //promo wisata
        function promo_wisata()
        {
            $data['title']='Pesona Sumatera Utara';
            $data['judul']='Wismut 2016';
            
            $data['promo_wisata']= $this->promo_model->promo_wisata();
            $this->load->view('kontributor/header',$data);
            $this->load->view('kontributor/v_promo_wisata',$data);
            $this->load->view('kontributor/footer');
        }
        function promo_wisata_baru()
        {
            $data['title']='Pesona Sumatera Utara';
            $data['judul']='Wismut 2016';
            $data['kategori']=  $this->kategori_model->kategori();
            $data['daerah']= $this->daerah_model->daerah();
            $this->load->view('kontributor/header',$data);
            $this->load->view('kontributor/v_promo_wisata_baru',$data);
            $this->load->view('kontributor/footer');
        }
        
        function promo_wisata_act()
        {
            $id = $this->session->userdata('username');
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
                $this->load->view('kontributor/header',$data);
                $this->load->view('kontributor/v_promo_wisata_baru',$data);
                $this->load->view('kontributor/footer');
            }else{
                $judul = $this->input->post('judul');
                $deskripsi = $this->input->post('deskripsi');
                $kategori = $this->input->post('kategori');
                $daerah = $this->input->post('daerah');
                
                $config['upload_path']='./gambar_post/';
                $config['allowed_types']='gif|jpg|jpeg|png';
                $config['max_size'] = 1024 * 8;
                $config['overwrite'] =true;
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
                redirect('kontributor/dashboard/promo_wisata/oke','refresh');
            }
        }
        
        function edit_promo_wisata($id)
        {
            	//$this->load->library('form_validation');
                $data['title']='Pesona Sumatera Utara';
                $data['judul']='Wismut 2016';
		$data['wisata_baru'] = $this->promo_model->edit_promo_wisata($id);
		$data['kategori'] = $this->kategori_model->kategori();
                $data['daerah'] = $this->daerah_model->daerah();
                
		$this->load->view('kontributor/header',$data);
		$this->load->view('kontributor/v_promo_wisata_edit',$data);
		$this->load->view('kontributor/footer');
        }
        
        function update_promo_wisata()
        {
        // $this->load->library('form_validation');
                $id = $this->input->post('id');
                $this->form_validation->set_rules('judul','judul','required');
                $this->form_validation->set_rules('deskripsi','deskripsi','required');
                $this->form_validation->set_rules('kategori','kategori','required');
                $this->form_validation->set_rules('daerah','daerah','required');
		
		if($this->form_validation->run() != true ){
                        $data['title']='Pesona Sumatera Utara';
                        $data['judul']='Wismut 2016';
			$data['wisata_baru'] = $this->promo_model->edit_promo_wisata($id);
			$data['kategori'] = $this->kategori_model->kategori();
                        $data['daerah']= $this->daerah_model->daerah();
			$this->load->view('kontributor/header',$data);
			$this->load->view('kontributor/v_promo_wisata_edit',$data);
			$this->load->view('kontributor/footer');
		}else{			
                        $judul = $this->input->post('judul');
                        $deskripsi = $this->input->post('deskripsi');
                        $kategori = $this->input->post('kategori');
                        $daerah = $this->input->post('daerah');
			if($_FILES['gambar']['name'] == ""){				
				$d = array(
					'judul' => $judul,
					'deskripsi' => $deskripsi,
					'kategori' => $kategori,
                                        'daerah' => $daerah
					);
				$this->promo_model->update_promo_wisata($d,$id);
				redirect('kontributor/dashboard/promo_wisata/diupdate','refresh');
			}else{				
				$config['upload_path'] = './gambar_posting/';
				$config['allowed_types'] = 'gif|jpg|png';			
				$this->load->library('upload', $config);
				$this->upload->do_upload('gambar');
				$data = array('upload_data' => $this->upload->data());
				$d = array(
					'judul' => $judul,
					'deskripsi' => $deskripsi,
					'kategori' => $kategori,
                                        'daerah' => $daerah,										
					'gambar' => $data['upload_data']['file_name']
					);
				$this->promo_model->update_promo_wisata($d,$id);
				redirect('kontributor/dashboard/promo_wisata/diupdate','refresh');
			}			
		}		   
        }
        function hapus_promo_wisata($id)
        {            
	$this->promo_model->hapus_promo_wisata($id);
	redirect('kontributor/dashboard/promo_wisata/dihapus','refresh');
        }
        
        
        //promo produk
        function promo_produk()
        {
            $data['title']='Pesona Sumatera Utara';
            $data['judul']='Wismut 2016';
            $data['promo_produk']= $this->produk_model->promo_produk();
            $this->load->view('kontributor/header',$data);
            $this->load->view('kontributor/v_promo_produk',$data);
            $this->load->view('kontributor/footer');
        }
        
        function promo_produk_baru()
        {
            $data['title']='Pesona Sumatera Utara';
            $data['judul']='Wismut 2016';
            $data['kategori']=  $this->kategori_model->kategori();
            $data['daerah']= $this->daerah_model->daerah();
            $data['wisata']= $this->promo_model->wisata();
            $this->load->view('kontributor/header',$data);
            $this->load->view('kontributor/v_promo_produk_baru',$data);
            $this->load->view('kontributor/footer'); 
        }
        function promo_produk_act()
        {
            $this->form_validation->set_rules('judul','judul','required');
            $this->form_validation->set_rules('deskripsi','deskripsi','required');
            $this->form_validation->set_rules('kategori','kategori','required');
            $this->form_validation->set_rules('daerah','daerah','required');
            $this->form_validation->set_rules('wisata','wisata','required');
            if($this->form_validation->run() != true)
            {
                $data['title']='Pesona Sumatera Utara';
                $data['judul']='Wismut 2016';
                $data['kategori']=  $this->kategori_model->kategori();
                $data['daerah']= $this->daerah_model->daerah();
                $data['wisata']=  $this->promo_model->wisata();
                $this->load->view('kontributor/header',$data);
                $this->load->view('kontributor/v_promo_produk_baru',$data);
                $this->load->view('kontributor/footer');
            }else{
                $judul = $this->input->post('judul');
                $deskripsi = $this->input->post('deskripsi');
                $kategori = $this->input->post('kategori');
                $daerah = $this->input->post('daerah');
                $wisata = $this->input->post('wisata');
                
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
                    'wisata' => $wisata,
                    'tanggal' => date('Y-m-d'),
                    'author' => $this->session->userdata('id_kontributor'),
                    'gambar' => $data['upload_data']['file_name']
                );
                $this->produk_model->promo_produk_act($d);
                redirect('kontributor/dashboard/promo_produk/oke','refresh');
            }
        }
        function edit_produk($id)
        {
            	//$this->load->library('form_validation');
                $data['title']='Pesona Sumatera Utara';
                $data['judul']='Wismut 2016';
		$data['produk'] = $this->produk_model->edit_produk($id);
		$data['kategori'] = $this->kategori_model->kategori();
                $data['daerah'] = $this->daerah_model->daerah();
                $data['wisata'] = $this->promo_model->wisata();
		$this->load->view('kontributor/header',$data);
		$this->load->view('kontributor/v_produk_edit',$data);
		$this->load->view('kontributor/footer');
        }
        function update_produk()
        {
                $id = $this->input->post('id');
                $this->form_validation->set_rules('judul','judul','required');
                $this->form_validation->set_rules('deskripsi','deskripsi','required');
                $this->form_validation->set_rules('kategori','kategori','required');
                $this->form_validation->set_rules('daerah','daerah','required');
		//$this->form_validation->set_rules('wisata','wisata','required');
		if($this->form_validation->run() != true ){
                        $data['title']='Pesona Sumatera Utara';
                        $data['judul']='Wismut 2016';
			$data['produk'] = $this->produk_model->edit_produk($id);
			$data['kategori'] = $this->kategori_model->kategori();
                        $data['daerah']= $this->daerah_model->daerah();
                        $data['wisata'] = $this->promo_model->wisata();
			$this->load->view('kontributor/header',$data);
			$this->load->view('kontributor/v_produk_edit',$data);
			$this->load->view('kontributor/footer');
		}else{			
                        $judul = $this->input->post('judul');
                        $deskripsi = $this->input->post('deskripsi');
                        $kategori = $this->input->post('kategori');
                        $daerah = $this->input->post('daerah');
                        $wisata = $this->input->post('wisata');
                        
			if($_FILES['gambar']['name'] == ""){				
				$d = array(
					'judul' => $judul,
					'deskripsi' => $deskripsi,
					'kategori' => $kategori,
                                        'daerah' => $daerah,
                                        'wisata' => $wisata
					);
				$this->produk_model->update_produk($d,$id);
				redirect('kontributor/dashboard/promo_produk/diupdate','refresh');
			}else{				
				$config['upload_path'] = './gambar_posting/';
				$config['allowed_types'] = 'gif|jpg|png';			
				$this->load->library('upload', $config);
				$this->upload->do_upload('gambar');
				$data = array('upload_data' => $this->upload->data());
				$d = array(
					'judul' => $judul,
					'deskripsi' => $deskripsi,
					'kategori' => $kategori,
                                        'daerah' => $daerah,
                                        'wisata' => $wisata,
					'gambar' => $data['upload_data']['file_name']
					);
				$this->produk_model->update_produk($d,$id);
				redirect('kontributor/dashboard/promo_produk/diupdate','refresh');
			}			
		}
        }
        function hapus_produk($id)
        {            
	$this->produk_model->hapus_produk($id);
	redirect('kontributor/dashboard/promo_produk/dihapus','refresh');
        }
        
        //Informasi Hotel
        function hotel_get()
        {
            $data['title']='Pesona Sumatera Utara';
            $data['judul']='Wismut 2016';
            $data['hotel']= $this->hotel_model->hotel_get();
            $this->load->view('kontributor/header',$data);
            $this->load->view('kontributor/v_hotel',$data);
            $this->load->view('kontributor/footer');
        }
        function hotel_new()
        {
            $data['title']='Pesona Sumatera Utara';
            $data['judul']='Wismut 2016';
           // $data['kategori']=  $this->kategori_model->kategori();
            $data['daerah']= $this->daerah_model->daerah();
            $data['jenis']=array(
              'Melati',
                'Mawar',
                'Kenanga'
            );
            $this->load->view('kontributor/header',$data);
            $this->load->view('kontributor/v_hotel_new',$data);
            $this->load->view('kontributor/footer');
        }
        function hotel_act()
        {
            $this->form_validation->set_rules('nama_hotel','nama_hotel','required');
            $this->form_validation->set_rules('deskripsi','deskripsi','required');
            $this->form_validation->set_rules('jenis','jenis','required');
            $this->form_validation->set_rules('daerah','daerah','required');
           // $this->form_validation->set_rules('wisata','wisata','required');
            if($this->form_validation->run() != true)
            {
                $data['title']='Pesona Sumatera Utara';
                $data['judul']='Wismut 2016';
                //$data['kategori']=  $this->kategori_model->kategori();
                $data['jenis']=array(
                'Melati',
                'Mawar',
                'Kenanga'
                 );
                $data['daerah']= $this->daerah_model->daerah();
                //$data['wisata']=  $this->promo_model->wisata();
                $this->load->view('kontributor/header',$data);
                $this->load->view('kontributor/v_hotel_new',$data);
                $this->load->view('kontributor/footer');
            }else{
                $nama_hotel = $this->input->post('nama_hotel');
                $deskripsi = $this->input->post('deskripsi');
                //$kategori = $this->input->post('kategori');
                $jenis = $this->input->post('jenis');
                $daerah = $this->input->post('daerah');
                //$wisata = $this->input->post('wisata');
                
                $config['upload_path']='./gambar_post/';
                $config['allowed_type']='gif|jpg|jpeg|png';
                $this->load->library('upload',$config);
                $this->upload->do_upload('gambar');
                $data = array('upload_data' => $this->upload->data());
                $d = array (
                    'nama_hotel' => $nama_hotel,
                    'deskripsi' => $deskripsi,
                    'jenis' => $jenis,
                    'daerah' => $daerah,
                    
                    'tanggal' => date('Y-m-d'),
                    'author' => $this->session->userdata('id_kontributor'),
                    'gambar' => $data['upload_data']['file_name']
                );
                $this->hotel_model->hotel_act($d);
                redirect('kontributor/dashboard/hotel_get/oke','refresh');
            }
        }
        function edit_hotel($id)
        {
            	//$this->load->library('form_validation');
                $data['title']='Pesona Sumatera Utara';
                $data['judul']='Wismut 2016';
		$data['hotel'] = $this->hotel_model->edit_hotel($id);
		//$data['kategori'] = $this->kategori_model->kategori();
                $data['jenis']=array(
                'Melati',
                'Mawar',
                'Kenanga'
                 );
                $data['daerah'] = $this->daerah_model->daerah();
                //$data['wisata'] = $this->promo_model->wisata();
		$this->load->view('kontributor/header',$data);
		$this->load->view('kontributor/v_edit_hotel',$data);
		$this->load->view('kontributor/footer');
        }
        function update_hotel()
        {
                $id = $this->input->post('id');
                $this->form_validation->set_rules('nama_hotel','nama_hotel','required');
                $this->form_validation->set_rules('deskripsi','deskripsi','required');
                //$this->form_validation->set_rules('kategori','kategori','required');
                $this->form_validation->set_rules('daerah','daerah','required');
		//$this->form_validation->set_rules('wisata','wisata','required');
		if($this->form_validation->run() != true ){
                        $data['title']='Pesona Sumatera Utara';
                        $data['judul']='Wismut 2016';
			$data['hotel'] = $this->hotel_model->edit_hotel($id);
			//$data['kategori'] = $this->kategori_model->kategori();
                        $data['jenis']=array(
                        'Melati',
                        'Mawar',
                        'Kenanga'
                         );
                        $data['daerah']= $this->daerah_model->daerah();
                        //$data['wisata'] = $this->promo_model->wisata();
			$this->load->view('kontributor/header',$data);
			$this->load->view('kontributor/v_edit_hotel',$data);
			$this->load->view('kontributor/footer');
		}else{			
                        $nama_hotel = $this->input->post('nama_hotel');
                        $deskripsi = $this->input->post('deskripsi');
                        //$kategori = $this->input->post('kategori');
                        $daerah = $this->input->post('daerah');
                        $jenis = $this->input->post('jenis');
                        
			if($_FILES['gambar']['name'] == ""){				
				$d = array(
					'nama_hotel' => $nama_hotel,
					'deskripsi' => $deskripsi,
                                        'daerah' => $daerah,
                                        'jenis' => $jenis
					);
				$this->hotel_model->update_hotel($d,$id);
				redirect('kontributor/dashboard/hotel_get/diupdate','refresh');
			}else{				
				$config['upload_path'] = './gambar_posting/';
				$config['allowed_types'] = 'gif|jpg|png';			
				$this->load->library('upload', $config);
				$this->upload->do_upload('gambar');
				$data = array('upload_data' => $this->upload->data());
				$d = array(
					'nama_hotel' => $nama_hotel,
					'deskripsi' => $deskripsi,
                                        'daerah' => $daerah,
                                        'jenis' => $jenis,
					'gambar' => $data['upload_data']['file_name']
					);
				$this->hotel_model->update_hotel($d,$id);
				redirect('kontributor/dashboard/hotel_get/diupdate','refresh');
			}			
		}
        }
        function hapus_hotel($id)
        {
        $this->hotel_model->hapus_hotel($id);
	redirect('kontributor/dashboard/hotel_get/dihapus','refresh');
        }
        
        
        //update profile
        function edit_profile($id)
        {
            $data['title']='Pesona Sumatera Utara';
            $data['judul']='Wismut 2016';
            $data['profile']=  $this->kontributor_model->edit_profile($id);
            $this->load->view('kontributor/header',$data);
            $this->load->view('kontributor/v_edit_profile',$data);
            $this->load->view('kontributor/footer');
        }
        
       
}