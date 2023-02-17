<?php defined('BASEPATH') or exit('NO direct script acces allowed');

class C_rgame extends CI_Controller
{
    public function __construct()
    { // method contruck akan dipanggil pertama kali saat controler diakses
        parent::__construct();
        $this->load->model("M_Rgame"); // meload M_Rgame pada models
        $this->load->library('form_validation'); // untuk menvalidasi datainput pada method
    }
    public function index()
    {
        $data["rgame"] = $this->M_Rgame->getAll(); // memangil semua data di tabel rgame
        $this->load->view("admin/rgame/list", $data); // memanggil view
    }
    public function tambah()
    {
        $rgame = $this->M_Rgame; // objek model
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($rgame->rules()); // menerapkan rules

        if ($validation->run()) {
            $rgame->simpan();
            $this->session->set_flashdata('success', 'Berhasil disimpan'); // pemberitahuan data berhasil disimpan
        }
        $this->load->view("admin/rgame/new_form"); // menampilkan form tambah 
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/rgame');

        $rgame = $this->M_Rgame;
        $validation = $this->form_validation;
        $validation->set_rules($rgame->rules());

        if ($validation->run()) {
            $rgame->update();
            $this->session->set_flashdata('success', 'Berhasill di simpan'); // pemberitahuan data berhasil disimpan
        }

        $data["rgame"] = $rgame->getById($id);
        if (!$data["rgame"]) show_404();

        $this->load->view("admin/rgame/edit_form", $data);
    }
    public function hapus($id = null)
    { // menghapus data berdsarkan id
        if (!isset($id)) show_404();

        if ($this->M_Rgame->hapus($id)) {
            redirect((site_url('admin/C_rgame')));
        }
    }
    public function grafik(){
        $this->load->view('grafik/gfgame');
    }
}

