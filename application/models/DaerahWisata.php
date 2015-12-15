<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class DaerahWisata extends CI_Model {
  public function getCountDaerahWisata()
  {
    return $this->db->count_all_results('daerah', FALSE);
  }
  public function getDaerahWisata($page, $size)
  {
    return $this->db->get('daerah', $size, $page);
  }
  public function insertDaerahWisata($dataDaerahWisata)
  {
    $val = array(
      'id' => $dataDaerahWisata['id'],
      'judul' => $dataDaerahWisata['judul'],
      'gambar' => $dataDaerahWisata['gambar'],
      'deskripsi' => $dataDaerahWisata['deskripsi']
    );
    $this->db->insert('daerah', $val);
  }
  public function updateDaerahWisata($dataDaerahWisata, $id)
  {
    $val = array(
      'judul' => $dataDaerahWisata['judul'],
      'gambar' => $dataDaerahWisata['gambar'],
      'deskripsi' => $dataDaerahWisata['deskripsi']
    );
    $this->db->where('id', $id);
    $this->db->update('daerah', $val);
  }
  public function deleteDaerahWisata($id)
  {
    $val = array(
      'id' => $id
    );
    $this->db->delete('daerah', $val);
  }
}
