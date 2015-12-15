<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class DaerahWisataController extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('DaerahWisata');
    $this->gambarPath = realpath(APPPATH . '../public/app/images/');
    $this->gambarPathUrl = base_url() . 'public/app/images.';
    $this->load->helper(array('url','form'));
  }
  public function getDaerahWisata($page, $size)
  {
    $response = array(
      'content' => $this->DaerahWisata->getDaerahWisata(($page - 1) * $size, $size)->result(),
      'totalPages' => ceil($this->DaerahWisata->getCountDaerahWisata() / $size));
    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
      exit;
  }
  public function indexAdmin()
  {
    $session = $this->session->userdata('isLogin');
    if($session == FALSE){
      redirect('login');
    }else{
      $this->load->view('');
    }
  }
  public function newPageKuliner()
  {
    $this->load->view('');
  }
  public function insertDaerahWisata()
  {
    $namaFile = Uuid::uuid4()->toString();
    $config['upload_path'] = $this->gambarPath;
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = 2000;
    $config['file_name'] = $namaFile;
    $this->load->library('upload', $config);
    if(!$this->upload->do_upload('gambar')){
    }else{
      $data = array(
        'id' => Uuid::uuid4()->toString(),
        'judul' => $this->input->post('judul'),
        'gambar' => $this->upload->file_name,
        'deskripsi' => $this->input->post('deskripsi')
      );
      $this->DaerahWisata->insertDaerahWisata($data);
      redirect('');
    }
  }
  public function updateDaerahWisata($id)
  {
    $data = (array)json_decode(file_get_contents('php://input'));
    $this->DaerahWisata->updateDaerahWisata($data, $id);
    $response = array(
      'Success' => true,
      'Info' => 'Data Berhasil diupdate');
    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
      exit;
  }
  public function deleteDaerahWisata($id)
  {
    $this->DaerahWisata->deleteDaerahWisata($id);
    $response = array(
      'Success' => true,
      'Info' => 'Data Berhasil dihapus');
    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
      exit;
  }
}
