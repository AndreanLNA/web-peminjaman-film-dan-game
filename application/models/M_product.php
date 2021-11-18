<?php

class M_product extends CI_Model
{

    public function get_all()
    {
        $query = $this->db->get('table_product');
        return $query->result();
    }
}