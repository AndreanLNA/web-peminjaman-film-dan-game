<?php defined('BASEPATH') or exit('NO direct script acces allowed');

class C_dgame extends CI_Controller
{
    public function __construct()
    { // method contruck akan dipanggil pertama kali saat controler diakses
        parent::__construct();
        $this->load->model("M_dgame"); // meload M_dgame pada models
        $this->load->library('form_validation'); // untuk menvalidasi datainput pada method
    }
    public function index()
    {
        $data["dgame"] = $this->M_dgame->getAll(); // memangil semua data di tabel dgame
        $this->load->view("admin/dgame/list", $data); // memanggil view
    }
    public function tambah()
    {
        $dgame = $this->M_dgame; // objek model
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($dgame->rules()); // menerapkan rules

        if ($validation->run()) {
            $dgame->simpan();
            $this->session->set_flashdata('success', 'Berhasil disimpan'); // pemberitahuan data berhasil disimpan
        }
        $this->load->view("admin/dgame/new_form"); // menampilkan form tambah 
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/dgame');

        $dgame = $this->M_dgame;
        $validation = $this->form_validation;
        $validation->set_rules($dgame->rules());

        if ($validation->run()) {
            $dgame->update();
            $this->session->set_flashdata('success', 'Berhasill di simpan'); // pemberitahuan data berhasil disimpan
        }

        $data["dgame"] = $dgame->getById($id);
        if (!$data["dgame"]) show_404();

        $this->load->view("admin/dgame/edit_form", $data);
    }
    public function hapus($id = null)
    { // menghapus data berdsarkan id
        if (!isset($id)) show_404();

        if ($this->M_dgame->hapus($id)) {
            redirect((site_url('admin/C_dgame')));
        }
    }
}
