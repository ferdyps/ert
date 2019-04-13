<?php
    
defined('BASEPATH') OR exit('No direct script access allowed');

class M_warga extends CI_Model {
    public function cek_data_warga($id){
        $sql = "SELECT
            COUNT(u.id_user) AS sum_id
        FROM
            user u
        JOIN warga w ON w.id_user = u.id_user
        JOIN kartu_keluarga kk ON kk.id_kk = w.id_kk
        WHERE u.id_user = ?";
        return $this->db->query($sql,[$id]); 
    }

    public function input_data($table, $data){
        return $this->db->insert($table, $data);
    }

    public function select_data($table, $pk_field, $id) {
        $this->db->where($pk_field, $id);
        return $this->db->get($table);
    }

    public function cek_data_warga_punya_kepala_keluarga($id){
        $sql = "
        SELECT
            COUNT(nik) jml
        FROM
            warga
        WHERE id_user = " . $id . "
        ";
        return $this->db->query($sql);
    }
}

/* End of file M_warga.php */
