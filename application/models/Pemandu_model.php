<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
   
class Pemandu_model extends CI_Model {
 
       var $table = 'pemandu';
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
       public function insertUser($data)
       {
           return $this->db->insert('pemandu',$data);
       }
        public function edit_profile($id)
       {
           $this->db->where('id_pemandu',$id);
           return $this->db->get('pemandu')->result();
       }

       public function update_profile($id,$data)
       {
           $this->db->where('id_pemandu',$id);
          return $this->db->update('pemandu', $data); 
       }
       public function getPemandu(){
           return $this->db->get('pemandu');
       }
       public function getDetailPemandu($id) {
           $this->db->where('id_pemandu',$id);
           return $this->db->get('pemandu');
       }
}
