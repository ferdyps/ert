<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
    public function lihat_data(){
        return $this->db->query("call list_warga_valid()");
    }
// ==================================================================
    public function edit_data($table, $pk_field, $id, $data) {
        $this->db->where($pk_field, $id);
        return $this->db->update($table, $data);
    }
// ==================================================================
    public function lihat_data_warga_novalid() {
        $this->db->where('valid', 0);
        return $this->db->get('warga');
    }
// ==================================================================    
    public function lihat_kk_novalid(){
        $this->db->where('valid', 0);
        return $this->db->get('kartu_keluarga');
    }
// ==================================================================
    public function lihat_kk_valid(){
        $this->db->where('valid', 1);
        return $this->db->get('kartu_keluarga');
        
    }
}

/* End of file M_admin.php */

?>