<?php
class Promo_model extends CI_Model
{
  //  var $table = 'kontributor';
       public function __construct() {
           parent::__construct();
       }
       function promo_wisata()
       {
           $username = $this->session->userdata('username');
           return $this->db->query("select * from destinasi,kategori,daerah,kontributor where destinasi.kategori=kategori.id_kategori and daerah.id_daerah=destinasi.daerah and kontributor.id_kontributor=destinasi.author and kontributor.username='$username'")->result();
       }
       function promo_getAll()
       {
           return $this->db->query("select * from destinasi,kategori,daerah,kontributor where destinasi.kategori=kategori.id_kategori and daerah.id_daerah=destinasi.daerah and kontributor.id_kontributor=destinasi.author")->result();
       }
        function promo_wisata_act($data)
       {
           $this->db->insert('destinasi',$data);
       }
       function edit_promo_wisata($id)
       {
           $this->db->where('id_destinasi',$id);
           return $this->db->get('destinasi')->result();
       }
       function update_promo_wisata($data,$id)
       {
           $this->db->where('id_destinasi',$id);
           $this->db->update('destinasi',$data);
       }
       function hapus_promo_wisata($id)
       {
           $this->db->where('id_destinasi',$id);
           $this->db->delete('destinasi');
       }
       function wisata()
       {
           return $this->db->get("destinasi")->result();
       }
}