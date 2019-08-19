<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batal extends MY_Controller {

	public $userdata = false;

	public function __construct(){
		parent::__construct();
		
		$this->userdata = $this->session->userdata();
		$this->load->model("M_Pesanan");
		
	}

	public function index()
	{
		
		if( isset($_POST['alasan']) ){

				$data = $_POST;
				
				$id_pesanan = ($_POST['id_pesanan']);

				$a = $this->M_Pesanan->getData($id_pesanan);
				$jumlahDarah = $a[0]->jumlah;
				$idDarah = $a[0]->id_darah;
				
				$queryManualTambahAlasan = "UPDATE pesanan set note = '".$data['alasan']."' where id_pesanan = '".$data['id_pesanan']."' ";
				$queryManualEditStatus   = "UPDATE pesanan set status = 'cancel_perawat' where id_pesanan = '".$data['id_pesanan']."' ";
				
				$this->db->query($queryManualTambahAlasan);
				$this->db->query($queryManualEditStatus);
				$this->db->query("UPDATE darah SET stok = stok + $jumlahDarah WHERE id_darah = '$idDarah';");
			}
			
			$list = $this->M_Pesanan->list_data();
            $this->render('page/batal',[
				"list"	=> $list
			]);
		}
	
		public function batal_detail($id_pesanan){

			$detail_pesanan = $this->M_Pesanan->reaksi($id_pesanan);
			
			$data	=(array) $detail_pesanan[0];
			
			$detail_pesanan = "<div class='alert alert-info'>
			<b>Id Pesanan</b> : {$data['id_pesanan']} <br/>
			</div>";

			echo $detail_pesanan;

		}

		
	
}
