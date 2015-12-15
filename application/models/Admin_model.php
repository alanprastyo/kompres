<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
   
class Admin_model extends CI_Model {
 
       var $table = 'admin';
       public function __construct() {
           parent::__construct();
       }
       public function ceklogin($username,$password)
       {
           $this->db->where('username',$username);
           $this->db->where('password',$password);
           $query = $this->db->get($this->table);
           if($query->num_rows()>0)
           {
               return $query->result_array();
           }
       }
       function edit_profile($id)
       {
           $this->db->where('id_admin',$id);
           return $this->db->get('admin')->result();
       }
       function update_profile($id,$data)
       {
           $this->db->where('id_admin',$id);
           $this->db->update('admin',$data);
       }


       //daftar kategori produk -> kategori model
       
       
       //daftar daerah wisata -> Daerah Model
       
       
       //promosi wisata untuk kontributor -> promo model
       
}
