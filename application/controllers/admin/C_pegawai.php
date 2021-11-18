<?php defined('BASEPATH') or exit('NO direct script acces allowed');

class C_pegawai extends CI_Controller
{
    public function __construct()
    { // method contruck akan dipanggil pertama kali saat controler diakses
        parent::__construct();
        $this->load->model("M_pegawai"); // meload M_pegawai pada models
        $this->load->library('form_validation'); // untuk menvalidasi datainput pada method
    }
    public function index()
    {
        $data["pegawai"] = $this->M_pegawai->getAll(); // memangil semua data di tabel pegawai
        $this->load->view("admin/pegawai/list", $data); // memanggil view
    }
    public function tambah()
    {
        $pegawai = $this->M_pegawai; // objek model
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($pegawai->rules()); // menerapkan rules

        if ($validation->run()) {
            $pegawai->simpan();
            $this->session->set_flashdata('success', 'Berhasil disimpan'); // pemberitahuan data berhasil disimpan
        }
        $this->load->view("admin/pegawai/new_form"); // menampilkan form tambah 
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/pegawai');

        $pegawai = $this->M_pegawai;
        $validation = $this->form_validation;
        $validation->set_rules($pegawai->rules());

        if ($validation->run()) {
            $pegawai->update();
            $this->session->set_flashdata('success', 'Berhasill di simpan'); // pemberitahuan data berhasil disimpan
        }

        $data["pegawai"] = $pegawai->getById($id);
        if (!$data["pegawai"]) show_404();

        $this->load->view("admin/pegawai/edit_form", $data);
    }
    public function hapus($id = null)
    { // menghapus data berdsarkan id
        if (!isset($id)) show_404();

        if ($this->M_pegawai->hapus($id)) {
            redirect((site_url('admin/C_pegawai')));
        }
    }
}
