<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class CI_total {
    public function total ($n = ''){
        return ($n === '') ? '' : number_format( (float) $n, 2, '.', ',');
    }
}