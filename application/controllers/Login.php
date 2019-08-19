<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public $userdata = false;

	public function __construct(){
		parent::__construct();
		$this->userdata = $this->session->userdata();
		// //mengaktifkan debugging
		// $this->output->enable_profiler(TRUE);

		if( isset($this->userdata['nik']) ){
			redirect("/");
		}


        $this->load->model('M_Login');
	}

	public function index()
	{	
		
		$this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        //set message form validation
		$this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px"> <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

		$run = $this->form_validation->run();

		if( $run == TRUE ){
			$nik 		= $this->input->post("nik",TRUE);
			$password 	= $this->input->post("password",TRUE);

			$cek = $this->M_Login->login([
				"nik"		=> $nik,
				"password"	=> md5($password)
			]);

			if( $cek == FALSE ){
				$this->session->set_flashdata("error","<div class='alert alert-danger'>Nik/Password salah</div>");
				redirect("/login");
			}else{
				$this->session->set_userdata($cek);
				redirect("/");
			}
		}

		$this->render('page/login');
	}
}
