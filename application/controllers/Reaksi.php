<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reaksi extends MY_Controller {

	public $userdata = false;

	public function __construct(){
		parent::__construct();
		
		$this->userdata = $this->session->userdata();
		$this->load->model("M_Pesanan");
		
	}

	public function index()
	{
		
		if( isset($_POST['reaksi_darah']) ){

				$data = $_POST;
				
				
				// $insert = [
				// 	"id_user"		=> $this->userdata['id_user'],
				// 	"nama_user"		=> $this->userdata['nama_user'],
				// 	"reaksi_darah"	=> $data['reaksi_darah']
				// ];
				
				// $this->M_Pesanan->reaksi($insert);

			$queryManualUpdateDarah = "UPDATE pesanan set reaksi_darah = '".$data['reaksi_darah']."',reaksi =  '".$data['reaksi']."' where id_pesanan = '".$data['id_pesanan']."' ";
			
			$this->db->query($queryManualUpdateDarah);


				
			}
			
			$list = $this->M_Pesanan->list_data();
            $this->render('page/reaksi',[
				"list"	=> $list
			]);
		}
	
		public function reaksi_detail($id_pesanan){

			$detail_pesanan = $this->M_Pesanan->reaksi($id_pesanan);
			
			$data	=(array) $detail_pesanan[0];
			
			$detail_pesanan = "<div class='alert alert-info'>
			<b>Id Pesanan</b> : {$data['id_pesanan']} <br/>
			</div>";

			echo $detail_pesanan;

		}

		
	
}
