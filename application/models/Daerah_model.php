<?php

class Daerah_model extends CI_Model
{
    function daerah()
       {
           return $this->db->get('daerah')->result();
       }
       function tambah_daerah($data)
       {
           $this->db->insert('daerah',$data);
       }
       function edit_daerah($id)
       {
           $this->db->where('id_daerah',$id);
           return $this->db->get('daerah')->result();
       }
       function update_daerah($id,$data)
       {
           $this->db->where('id_daerah',$id);
           $this->db->update('daerah',$data);
       }
       function hapus_daerah($id)
       {
           $this->db->where('id_daerah',$id);
           $this->db->delete('daerah');
       }
    
}
