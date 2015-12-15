<?php
class Hotel_model extends CI_Model
{
    public function __construct() {
           parent::__construct();
       }
       function hotel_get()
       {
           $username = $this->session->userdata('username');
           return $this->db->query("select * from hotel,daerah,kontributor where daerah.id_daerah=hotel.daerah and kontributor.id_kontributor=hotel.author and kontributor.username='$username'")->result();
       }
       function hotel_getAll()
       {
            return $this->db->query("select * from hotel,daerah,kontributor where daerah.id_daerah=hotel.daerah and kontributor.id_kontributor=hotel.author")->result();
       }
       
        function hotel_act($data)
       {
           $this->db->insert('hotel',$data);
       }
       function edit_hotel($id)
       {
           $this->db->where('id_hotel',$id);
           return $this->db->get('hotel')->result();
       }
       function update_hotel($data,$id)
       {
           $this->db->where('id_hotel',$id);
           $this->db->update('hotel',$data);
       }
       function hapus_hotel($id)
       {
           $this->db->where('id_hotel',$id);
           $this->db->delete('hotel');
       }
       //function wisata()
       //{
       //    return $this->db->get("destinasi")->result();
      // }
}