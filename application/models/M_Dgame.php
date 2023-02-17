<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_Dgame extends CI_Model{
    private $_table = 'dgame'; // $_tabel adalah nama dari tabel, menggunakan private karena hanya
                                 // akan di akses pada class ini saja

    // nama kolom pada tabel
    public $id_game;
    public $nama_game;
    public $genre;
    public $harga;

    public function rules(){ // rules digunakan untuk validasi input data
        return[
            [
                'field' => 'nama_game',
                'label' => 'Nama_game',
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
        return $this->db->get_where($this->_table,["id_game" => $id])->row();// untuk mengambil data berdasarkan id dari hasil query
    }
    public function simpan(){ // untuk menyimpan data
        $post = $this->input->post(); // mengambil data dari form
         // membuat id unik
        $this->nama_game = $post["nama_game"]; // isi field nama_game
        $this->genre = $post["genre"];
        $this->harga = $post["harga"];
        $this->db->insert($this->_table, $this); // menyimpan data ke database
    }
    public function update(){ // untuk mengedit data
        $post = $this->input->post(); // mengambil data dari form
        $this->id_game = $post["id"]; 
        $this->nama_game = $post["nama_game"]; 
        $this->genre = $post["genre"];
        $this->harga = $post["harga"];
        $this->db->update($this->_table, $this, array('id_game' => $post['id']));// menyimpan data ke database
    }
    public function hapus($id){
        return $this->db->delete($this->_table, array("id_game" => $id)); // menghapus data berdasarkan id yang dipilih
    }
} 