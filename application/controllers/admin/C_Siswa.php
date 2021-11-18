<?php defined('BASEPATH') or exit('NO direct script acces allowed');

class C_Siswa extends CI_Controller
{
    public function pembayaran()
    {
    	echo "Firman membayar". format_rupiah()."Pada hari sabtu";
    }
}