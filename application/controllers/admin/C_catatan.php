<?php defined('BASEPATH') or exit('NO direct script acces allowed');

class C_catatan extends CI_Controller

{
    public function __construct()
    { // method contruck akan dipanggil pertama kali saat controler diakses
        parent::__construct();
        $this->load->model("M_catatan"); // meload M_catatan pada models
        $this->load->library('form_validation'); // untuk menvalidasi datainput pada method
    }
    public function index()
    {
        $data["ctc"] = $this->M_catatan->getAll(); // memangil semua data di tabel cd
        $this->load->view("admin/catatan/listctc", $data); // memanggil view
    }
    public function tambah()
    {
        $cd = $this->M_catatan; // objek model
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($cd->rules()); // menerapkan rules

        if ($validation->run()) {
            $cd->simpan();
            $this->session->set_flashdata('success', 'Berhasil disimpan'); // pemberitahuan data berhasil disimpan
        }
        $this->load->view("admin/catatan/tambahctc"); // menampilkan form tambah 
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/catatan');

        $cd = $this->M_catatan;
        $validation = $this->form_validation;
        $validation->set_rules($cd->rules());

        if ($validation->run()) {
            $cd->update();
            $this->session->set_flashdata('success', 'Berhasill di simpan'); // pemberitahuan data berhasil disimpan
        }

        $data["ctc"] = $cd->getById($id);
        if (!$data["ctc"]) show_404();

        $this->load->view("admin/catatan/editctc", $data);
        
    }
    public function hapus($id = null)
    { // menghapus data berdasarkan id
        if (!isset($id)) show_404();

        if ($this->M_catatan->hapus($id)) {
            redirect((site_url('admin/C_catatan')));
        }
    }
}
