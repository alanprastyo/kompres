<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
   
class Kontributor_model extends CI_Model {
 
       var $table = 'kontributor';
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
       public function edit_profile($id)
       {
           $this->db->where('id_kontributor',$id);
           return $this->db->get('kontributor')->result();
       }

       public function update_profile($id,$data)
       {
           $this->db->where('id_kontributor',$id);
          return $this->db->update('kontributor', $data); 
       }
       // public function cek($data){		
	//	return $this->db->get_where('$table',$data)->num_rows();
	//}
	//public function data($data){
	//	return $this->db->get_where('$table',$data)->result();
	//}
       
       function insertUser($data)
       {
           return $this->db->insert('kontributor',$data);
       }
       
       function sendEmail($to_email)
       {
        $from_email = 'alanprastyo95@gmail.com'; //change this to yours
        $subject = 'Verify Your Email Address';
        $message = 'Dear User,<br /><br />Please click on the below activation link to verify your email address.<br /><br /> http://localhost/wismut123/kontrubutor/verify/' . md5($to_email) . '<br /><br /><br />Thanks<br />Mydomain Team';
        
        //configure email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com'; //smtp host name
        $config['smtp_port'] = '465'; //smtp port number
        $config['smtp_user'] = $from_email;
        $config['smtp_pass'] = 'relnas1995'; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $this->email->initialize($config);
        
        //send mail
        $this->email->from($from_email, 'Mydomain');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
       }
       //activate user account
    function verifyEmailID($key)
    {
        $data = array('status' => 1);
        $this->db->where('md5(email)', $key);
        return $this->db->update('kontributor', $data);
    }
    
    
    //ambil data kontributor
    function getAll()
    {
        return $this->db->query("select * from kontributor,daerah where daerah.id_daerah=kontributor.daerah")->result();
    }
    
    function detail($id)
    {
        $this->db->where('id_kontributor',$id);
        return $this->db->query("select * from kontributor,daerah where daerah.id_daerah=kontributor.daerah and kontributor.id_kontributor='$id'")->result();

    }
    function action($id,$data)
    {
        $this->db->where('id_kontributor',$id);
        $this->db->update('kontributor',$data);
    }
}
