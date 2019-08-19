<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends MY_Controller {

	public $userdata = false;

	public function __construct(){
		parent::__construct();
		$this->userdata = $this->session->userdata();
		$this->load->model("M_Darah");
		if( $this->userdata['role'] != 'admin' ) show_404();
	}

	public function index()
	{

		$this->form_validation->set_rules("id_darah","ID Darah","required");
		$this->form_validation->set_rules("stok","Stok","required");

		$run = $this->form_validation->run();

		if( $run == TRUE ){

			$id_darah = $this->input->post("id_darah");
			$stok 	  = $this->input->post("stok");

			$update = $this->M_Darah->update_stok($id_darah,$stok);

			if( $update ){
				$this->session->set_flashdata("alert","<div class='alert alert-success'>Berhasil update stok</div>");
			}else{
				$this->session->set_flashdata("alert","<div class='alert alert-danger'>Gagal update stok</div>");
			}

		}

		$list = $this->M_Darah->list_data();
		$this->render('page/admin/stok',[
			"list"	=> $list
		]);
	}

	public function detail($id){

		$detail = $this->M_Darah->detail($id);

		echo json_encode($detail[0]);

	}

	public function grafik(){

		$data = $this->db->query("
			SELECT golongan,SUM(stok) as stok FROM darah GROUP BY golongan
		")->result_array();

		$grafik["label"] = $grafik['val'] = '';

		foreach ($data as $key => $value) {
			$grafik['label'] .= "'".$value['golongan']."'," ;
			$grafik['val'] .= "".$value['stok'].",";
		}

		$this->render("page/admin/grafik_stok.php",$grafik);
	}
}
