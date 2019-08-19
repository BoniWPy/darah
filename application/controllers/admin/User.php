<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public $userdata = false;

	public function __construct(){
		parent::__construct();
		$this->userdata = $this->session->userdata();
		$this->load->model("M_User");
		if( $this->userdata['role'] != 'admin' ) show_404();
	}

	public function index()
	{

		$this->form_validation->set_rules("nik","Nik","required");
		$this->form_validation->set_rules("nama","Nama","required");
		$this->form_validation->set_rules("role","Role","required");
		$this->form_validation->set_rules("no_hp","No HP","required");
		$this->form_validation->set_rules("password","Password","required");

		$run = $this->form_validation->run();

		if( $run == TRUE ){

			$data = [
				"nik"	=> $this->input->post("nik"),
				"nama_user"	=> $this->input->post("nama"),
				"no_hp"	=> $this->input->post('no_hp'),
				"role"	=> $this->input->post("role"),
				"password"	=> md5($this->input->post("password")),
			];

			$save = $this->M_User->tambah($data);

			if( $save ){
				$this->session->set_flashdata("alert","<div class='alert alert-success'>Berhasil menambah user</div>");
			}else{
				$this->session->set_flashdata("alert","<div class='alert alert-danger'>Gagal menambah user</div>");
			}

		}


		$list = $this->M_User->list_data();
		$this->render('page/admin/user',[
			"list"	=> $list
		]);
	}
}
