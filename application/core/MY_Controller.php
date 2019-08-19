<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $userdata = false;

	public function __construct(){
		parent::__construct();
	}

	public function render($halaman,$data=false){
		$this->load->view('template/header',$data);
		$this->load->view($halaman,$data);
		$this->load->view('template/footer',$data);
	}
}
