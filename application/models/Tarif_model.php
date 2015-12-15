<?php

class Tarif_model extends CI_Model {
   function getTarif() {
        $username = $this->session->userdata('username');
        return $this->db->query("select * from tarif where pemandu='$username'");
    }

    function insertTarif($tarifPemandu) {
        $this->db->insert('tarif', $tarifPemandu);
    }

}
