<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_cd extends CI_Model{
    private $_table = 'tb_cd'; // $_tabel adalah nama dari tabel, menggunakan private karena hanya
                                 // akan di akses pada class ini saja

    // nama kolom pada tabel
    public $id_cd;
    public $nama_cd;
    public $genre;
    public $harga;
    public $foto = "default.jpg";

    public function rules(){ // rules digunakan untuk validasi input data
        return[
            [
                'field' => 'nama_cd',
                'label' => 'Nama_cd',
                'rules' => 'required'],
            [
                'field' => 'genre',
                'label' => 'Genre',
                'rules' => 'required'],
            [
                'field' => 'harga',
                'label' => 'Harga',
                'rules' => 'required'],      

            ];
    }
    public function getAll(){
        return $this->db->get($this->_table)->result(); // untuk mengambil semua data hasil query
    }
    public function getById($id){
        return $this->db->get_where($this->_table,["id_cd" => $id])->row();// untuk mengambil data berdasarkan id dari hasil query
    }
    public function simpan(){ // untuk menyimpan data
        $post = $this->input->post(); // mengambil data dari form
        
         // membuat id unik
        $this->nama_cd = $post["nama_cd"]; // isi field nama_cd
        $this->genre = $post["genre"];
        $this->harga = $post["harga"];
        $this->db->insert($this->_table, $this); // menyimpan data ke database
    }
    public function update(){ // untuk mengedit data
        $post = $this->input->post(); // mengambil data dari form
        $this->id_cd = $post["id"]; 
        $this->nama_cd = $post["nama_cd"]; 
        $this->genre = $post["genre"];
        $this->harga = $post["harga"];
        $this->db->update($this->_table, $this, array('id_cd' => $post['id']));// menyimpan data ke database
    }
    public function hapus($id){
        return $this->db->delete($this->_table, array("id_cd" => $id)); // menghapus data berdasarkan id yang dipilih
    }
} 