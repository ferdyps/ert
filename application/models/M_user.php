<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function insert_user($data){
        return $this->db->insert('user', $data);
    }
    
    public function cek_user($data){
        $sql = "SELECT * FROM user WHERE (username = ? OR email = ?) AND password = ?";
        return $this->db->query($sql,array($data['autentikasi'],$data['autentikasi'],$data['password']));
    }

    
}

/* End of file ModelName.php */
