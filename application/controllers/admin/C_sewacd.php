<?php defined('BASEPATH') or exit('NO direct script acces allowed');

class C_sewacd extends CI_Controller

{
    public function __construct()
    { // method contruck akan dipanggil pertama kali saat controler diakses
        parent::__construct();
        $this->load->model("M_sewacd"); // meload M_sewacd pada models
        $this->load->library('form_validation'); // untuk menvalidasi datainput pada method
    }
    public function index()
    {
        $data["sewacd"] = $this->M_sewacd->getAll(); // memangil semua data di tabel cd
        $this->load->view("admin/sewa_cd/list", $data); // memanggil view
    }
    public function tambah()
    {
        $cd = $this->M_sewacd; // objek model
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($cd->rules()); // menerapkan rules

        if ($validation->run()) {
            $cd->simpan();
            $this->session->set_flashdata('success', 'Berhasil disimpan'); // pemberitahuan data berhasil disimpan
        }
        $this->load->view("admin/sewa_cd/tambah_sewacd"); // menampilkan form tambah 
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/sewa_cd');

        $cd = $this->M_sewacd;
        $validation = $this->form_validation;
        $validation->set_rules($cd->rules());

        if ($validation->run()) {
            $cd->update();
            $this->session->set_flashdata('success', 'Berhasill di simpan'); // pemberitahuan data berhasil disimpan
        }

        $data["sewacd"] = $cd->getById($id);
        if (!$data["sewacd"]) show_404();

        $this->load->view("admin/sewa_cd/edit", $data);
        
    }
    public function hapus($id = null)
    { // menghapus data berdsarkan id
        if (!isset($id)) show_404();

        if ($this->M_sewacd->hapus($id)) {
            redirect((site_url('admin/C_cd')));
        }
    }
    public function grafik(){
        $this->load->view('grafik/gfcd');
    }
}

