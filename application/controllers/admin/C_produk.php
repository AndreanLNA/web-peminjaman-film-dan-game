<?php
 
 class C_produk extends CI_Controller {

	public function index(){
        $this->load->model('M_product');
        $this->load->helper('Dateindo');
		
		$content = $this->cart->contents();

		$this->load->view('admin/pegawai/cart', array('content' => $content));

	}

	public function tambah (){

		$data = array(
            array(
                'id'      => '1236',
	            'qty'     => 1,
	            'price'   => 100000,
	            'name'    => 'Samsung'
            ),
            array(
                'id'      => '1352',
	            'qty'     => 2,
	            'price'   => 200000,
	            'name'    => 'vivo'
            )
	        
		);

		$this->cart->insert($data);
		echo "keranjang telah ditambahkan";
	}
    public function update (){
        $data = array(
            'rowid' => 'b80bb7740288fda1f201890375a60c8f',
            'name' => 'oppo',
            'price' => 30000,
            'qty'   => 1
    );
        $this->cart->update($data);
        echo "berhasil di update";
    }
    function hapus_cart($data = null){ //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => '', 
            'qty' => 0, 
        );
        $this->cart->update($data);
        $this->load->view('admin/pegawai/cart');
    }
 }