<?php

class Pemesanan extends CI_Model {

    function getPemesanan() {
        $username = $this->session->userdata('nama');
        return $this->db->query("select * from pemesanan where namaPemandu='$username'");
    }

    function insertPemesanan($pemesanan) {
        $this->db->insert('pemesanan', $pemesanan);
    }

}
