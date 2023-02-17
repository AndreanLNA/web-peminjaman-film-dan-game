<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_catatan extends CI_Model{
    private $_table = 'tb_catatan'; // $_tabel adalah nama dari tabel, menggunakan private karena hanya
                                 // akan di akses pada class ini saja

    // nama kolom pada tabel
    public $id_catatan;
    public $catatan;
    public $tgl;
    public $jenis='';

    public function rules(){ // rules digunakan untuk validasi input data
        return[
            [
                'field' => 'catatan',
                'label' => 'Catatan',
                'rules' => 'required'],
            [
                'field' => 'tgl',
                'label' => 'Tgl',
                'rules' => 'required'],      

            ];
    }
    public function getAll(){
        return $this->db->get($this->_table)->result(); // untuk mengambil semua data hasil query
    }
    public function getById($id){
        return $this->db->get_where($this->_table,["id_catatan" => $id])->row();// untuk mengambil data berdasarkan id dari hasil query
    }
    public function simpan(){ // untuk menyimpan data
        $post = $this->input->post(); // mengambil data dari form
        
         // membuat id unik
        $this->catatan = $post["catatan"]; // isi field nama_cd
        $this->tgl = $post["tgl"];
        $this->jenis = $post["jenis"];
        $this->db->insert($this->_table, $this); // menyimpan data ke database
    }
    public function update(){ // untuk mengedit data
        $post = $this->input->post(); // mengambil data dari form
        $this->catatan = $post["catatan"]; // isi field nama_cd
        $this->tgl = $post["tgl"];
        $this->jenis = $post["jenis"];
        $this->db->update($this->_table, $this, array('id_catatan' => $post['id']));// menyimpan data ke database
    }
    public function hapus($id){
        return $this->db->delete($this->_table, array("id_catatan" => $id)); // menghapus data berdasarkan id yang dipilih
    }
} 