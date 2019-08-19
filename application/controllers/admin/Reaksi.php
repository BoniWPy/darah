<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reaksi extends MY_Controller {

	public $userdata = false;

	public function __construct(){
		parent::__construct();
		$this->userdata = $this->session->userdata();
		$this->load->model("M_Pesanan");
		//if( isset($this->userdata['role']) AND $this->userdata['role'] != 'admin' OR !isset($this->userdata['role']) ) show_404();
	}

	public function index(){

		if( isset($_POST['id_pesanan']) ){
			$data = [
				"status"	=> $_POST['status'],
				"note"		=> $_POST['note']
			];
			$id_pesanan = $_POST['id_pesanan'];
		}

		$list = $this->M_Pesanan->reaksi_darah();
		$this->render('page/admin/reaksi',[
			"list"	=> $list
		]);
	}

	public function grafik_reaksi(){

		$data = $this->db->query("SELECT MONTH(created_at) as bulan,sum(1) as jumlah,ROUND( sum(IF(reaksi=0, 1, 0)) * 100 / SUM(1),0) as persen from pesanan group by MONTH(created_at) ")->result_array();
		// $totalTransfusi = $this->db->query("SELECT COUNT(id_pesanan) FROM pesanan");
		// var_dump($totalTransfusi);
		// var_dump($data);die();
	
		$grafik["label"] = $grafik['val'] = '';
		 
		$bulan = array( "1" => "January",
						"2" => "February",
						"3" => "Maret",
						"4" => "April",
						"5"	=> "Mei",
						"6" => "Juni",
						"7" => "Juli",
						"8"	=> "Agustus",
						"9" => "September",
						"10"=>	"Oktober",
						"11"=> "November",
						"12"=> "Desember");
		$persen = array();
						
		foreach ($data as $key => $value) {
			$persen[$value['bulan'] ] = $value['persen'];
		} 
		
						foreach($bulan as $key => $value){
							
							$grafik['label'] .= "'".$value."'," ;
							$grafik['val'] .= "'".(!empty($persen[$key])?$persen[$key]:0)."' ,";

						}

										
		// foreach ($data as $key => $value) {
		// 	$grafik['label'] .= "".$value['bulan']."," ;
		// 	$grafik['val'] .= "'".$value['persen']."' ,";
		// } 

		$this->render("page/admin/grafik_reaksi.php",$grafik);
	}

	
}
