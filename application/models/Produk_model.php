<?php
class Produk_model extends CI_Model
{
    //var $table = 'kontributor';
       public function __construct() {
           parent::__construct();
       }
       function promo_produk()
       {
           $username = $this->session->userdata('username');
           return $this->db->query("select * from produk,kategori,daerah,kontributor where produk.kategori=kategori.id_kategori and daerah.id_daerah=produk.daerah and kontributor.id_kontributor=produk.author and kontributor.username='$username'")->result();
       }
       function produk_getAll()
       {
            return $this->db->query("select * from produk,kategori,daerah,kontributor where produk.kategori=kategori.id_kategori and daerah.id_daerah=produk.daerah and kontributor.id_kontributor=produk.author")->result();
       }
       function promo_produk_act($data)
       {
           $this->db->insert('produk',$data);
       }
       function edit_produk($id)
       {
           $this->db->where('id_produk',$id);
           return $this->db->get('produk')->result();
       }
       function update_produk($data,$id)
       {
           $this->db->where('id_produk',$id);
           $this->db->update('produk',$data);
       }
       function hapus_produk($id)
       {
           $this->db->where('id_produk',$id);
           $this->db->delete('produk');
       }
}