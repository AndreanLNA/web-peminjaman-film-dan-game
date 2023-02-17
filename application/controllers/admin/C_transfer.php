<?php defined('BASEPATH') or exit('NO direct script acces allowed');

class C_transfer extends CI_Controller

{
    public function __construct()
    { // method contruck akan dipanggil pertama kali saat controler diakses
        parent::__construct();
        $this->load->model("M_transfer"); // meload M_transfer pada models
        $this->load->library('form_validation'); // untuk menvalidasi datainput pada method
    }
    public function index()
    {
        $data["sewacd"] = $this->M_transfer->getAll(); // memangil semua data di tabel cd
        $this->load->view("admin/vtransfer/list", $data); // memanggil view
    }
    public function tambah()
    {
        $cd = $this->M_transfer; // objek model
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($cd->rules()); // menerapkan rules

        if ($validation->run()) {
            $cd->simpan();
            $this->session->set_flashdata('success', 'Berhasil disimpan'); // pemberitahuan data berhasil disimpan
        }
        $this->load->view("admin/vtransfer/tambah_sewacd"); // menampilkan form tambah 
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/vtransfer');

        $cd = $this->M_transfer;
        $validation = $this->form_validation;
        $validation->set_rules($cd->rules());

        if ($validation->run()) {
            $cd->update();
            $this->session->set_flashdata('success', 'Berhasill di simpan'); // pemberitahuan data berhasil disimpan
        }

        $data["sewacd"] = $cd->getById($id);
        if (!$data["sewacd"]) show_404();

        $this->load->view("admin/vtransfer/edit", $data);
        
    }
    public function hapus($id = null)
    { // menghapus data berdsarkan id
        if (!isset($id)) show_404();

        if ($this->M_transfer->hapus($id)) {
            redirect((site_url('admin/C_transfer')));
        }
    }
    public function grafik(){
        $this->load->view('grafik/gfcd');
    }
}

