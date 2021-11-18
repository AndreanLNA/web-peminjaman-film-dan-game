<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_pegawai extends CI_Model{
    private $_table = 'pegawai'; // $_tabel adalah nama dari tabel, menggunakan private karena hanya
                                 // akan di akses pada class ini saja

    // nama kolom pada tabel
    public $id_pegawai;
    public $nama_pegawai;
    public $pekerjaan_pegawai;
    public $alamat_pegawai;
    public $foto = "default.jpg";

    public function rules(){ // rules digunakan untuk validasi input data
        return[
            [
                'field' => 'nama_pegawai',
                'label' => 'Nama_pegawai',
                'rules' => 'required'],
            [
                'field' => 'pekerjaan_pegawai',
                'label' => 'Pekerjaan_pegawai',
                'rules' => 'required'],
            [
                'field' => 'alamat_pegawai',
                'label' => 'Alamat_pegawai',
                'rules' => 'required'],      

            ];
    }
    public function getAll(){
        return $this->db->get($this->_table)->result(); // untuk mengambil semua data hasil query
    }
    public function getById($id){
        return $this->db->get_where($this->_table,["id_pegawai" => $id])->row();// untuk mengambil data berdasarkan id dari hasil query
    }
    public function simpan(){ // untuk menyimpan data
        $post = $this->input->post(); // mengambil data dari form
        $this->id_pegawai = uniqid();
         // membuat id unik
        $this->nama_pegawai = $post["nama_pegawai"]; // isi field nama_pegawai
        $this->pekerjaan_pegawai = $post["pekerjaan_pegawai"];
        $this->alamat_pegawai = $post["alamat_pegawai"];
        $this->db->insert($this->_table, $this); // menyimpan data ke database
    }
    public function update(){ // untuk mengedit data
        $post = $this->input->post(); // mengambil data dari form
        $this->id_pegawai = $post["id"]; 
        $this->nama_pegawai = $post["nama_pegawai"]; 
        $this->pekerjaan_pegawai = $post["pekerjaan_pegawai"];
        $this->alamat_pegawai = $post["alamat_pegawai"];
        $this->db->update($this->_table, $this, array('id_pegawai' => $post['id']));// menyimpan data ke database
    }
    public function hapus($id){
        return $this->db->delete($this->_table, array("id_pegawai" => $id)); // menghapus data berdasarkan id yang dipilih
    }
} 