<?php 
class M_shop extends CI_Model{
    function fetch_all(){
        $query = $this->db->get('table_product');
        return $query->result();
    }
}