<?php

class kategori_model extends CI_Model
{
    function kategori()
       {
           return $this->db->get('kategori')->result();
       }
       function tambah_kategori($data)
       {
           $this->db->insert('kategori',$data);
       }
       function edit_kategori($id)
       {
           $this->db->where('id_kategori',$id);
           return $this->db->get('kategori')->result();
       }
       function update_kategori($id,$data)
       {
           $this->db->where('id_kategori',$id);
           $this->db->update('kategori',$data);
       }
       function hapus_kategori($id)
       {
           $this->db->where('id_kategori',$id);
           $this->db->delete('kategori');
       }
}

