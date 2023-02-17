<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_sewacd extends CI_Model{
    private $_table = 'tb_sewacd'; // $_tabel adalah nama dari tabel, menggunakan private karena hanya
                                 // akan di akses pada class ini saja

    // nama kolom pada tabel
    public $id_sewacd;
    public $nama;
    public $harga;
    public $tgl_in;
    public $tgl_out;

    public function rules(){ // rules digunakan untuk validasi input data
        return[
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'],
            [
                'field' => 'harga',
                'label' => 'Harga',
                'rules' => 'required'],
            [
                'field' => 'tgl_in',
                'label' => 'Tgl_in',
                'rules' => 'required'],      

            [
                'field' => 'tgl_out',
                'label' => 'Tgl_out',
                'rules' => 'required']
        ];
    }
    public function getAll(){
        return $this->db->get($this->_table)->result(); // untuk mengambil semua data hasil query
    }
    public function getById($id){
        return $this->db->get_where($this->_table,["id_sewacd" => $id])->row();// untuk mengambil data berdasarkan id dari hasil query
    }
    public function simpan(){ // untuk menyimpan data
        $post = $this->input->post(); // mengambil data dari form
        
         // membuat id unik
        $this->nama = $post["nama"]; // isi field nama
        $this->harga = $post["harga"];
        $this->tgl_in = $post["tgl_in"];
        $this->tgl_out = $post["tgl_out"];
        $this->db->insert($this->_table, $this); // menyimpan data ke database
    }
    public function update(){ // untuk mengedit data
        $post = $this->input->post(); // mengambil data dari form
        $this->id_sewacd = $post["id"]; 
        $this->nama = $post["nama"]; 
        $this->harga = $post["harga"];
        $this->tgl_in = $post["tgl_in"];
        $this->tgl_out = $post["tgl_out"];
        $this->db->update($this->_table, $this, array('id_sewacd' => $post['id']));// menyimpan data ke database
    }
    public function hapus($id){
        return $this->db->delete($this->_table, array("id_sewacd" => $id)); // menghapus data berdasarkan id yang dipilih
    }
} 