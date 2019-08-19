<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends MY_Controller {

	public $userdata = false;

	public function __construct(){
		parent::__construct();
		$this->userdata = $this->session->userdata();
		$this->load->model("M_Pesanan");
		$this->load->model("M_Darah");
	}

	public function index()
	{
		
		if( isset($_POST['jumlah']) ){

			$data = $_POST;
			// print_r($data);

			$darah = (array) $this->M_Darah->detail($data['darah'])[0];

			if( $darah['stok'] < $data['jumlah'] ){
				$this->session->set_flashdata("alert","<div class='alert alert-danger'>Stok tidak mencukupi, tersisa {$darah['stok']}</div>");
			}else{
				$insert = [
					"pasien"	=> $data['nama_pasien'],
					"id_user"	=> $this->userdata['id_user'],
					"nama_user"	=> $this->userdata['nama_user'],
					"bagian"	=> $data['bagian'],
					"id_darah"	=> $data['darah'],
					"golongan"	=> $darah['golongan'],
					"jumlah"	=> $data['jumlah'],
					"status"	=> "waiting",
					"data"		=> json_encode($data)
				];

				$rs = $this->M_Pesanan->pesan($insert);
				

				if( $rs == TRUE ){

					$sisa = $darah['stok'] - $data['jumlah'];
					//$update = $this->M_Darah->update_stok($data['darah'],$sisa);

					$this->session->set_flashdata("alert","<div class='alert alert-success'>Pesanan berhasil dilakukan</div>");

				}else{

					$this->session->set_flashdata("alert","<div class='alert alert-danger'>Gagal melakukan pesanan</div>");
				}
			}
		}

		$list = $this->M_Darah->list_data();
		$this->render('page/pesanan',[
			"list"	=> $list
		]);
	}

	public function detail($id_darah){

		$detail = $this->M_Darah->detail($id_darah);

		$data = (array) $detail[0];
		
		//pop up alert stok darah dimatikan, agar hanya admin yang tau 
		//stok darah
		// $detail = "<div class='alert alert-info'>
		// <b>Golongan</b> : {$data['golongan']} <br/>
		// <b>Ukuran</b> : {$data['ukuran']} <br/>
		// <b>Jenis</b> : {$data['jenis']} <br/>
		// <b>Stok</b> : {$data['stok']}
		// </div>";

		// echo $detail;

	}

	public function riwayat(){

		$list = $this->M_Pesanan->riwayat_pesan($this->userdata['id_user']);
		$this->render('page/riwayat-pesanan',[
			"list"	=> $list
		]);
	}

	public function reaksi($id_pesanan){

		$detail = $this->M_Darah->detail($id_pesanan);

		$data = (array) $detail[0];
		
		
		$detail = "<div class='alert alert-info'>
		<b>Golongan</b> : {$data['golongan']} <br/>
		<b>Ukuran</b> : {$data['ukuran']} <br/>
		<b>Jenis</b> : {$data['jenis']} <br/>
		<b>Stok</b> : {$data['stok']}
		</div>";

		echo $detail;

	}

	public function batal(){
		$detail	= $this->M_Darah->detail($id_pesanan);
		

		$data	= (array) $detail[0];

		$detail = "<div class='alert alert-info'>
		<b>Nama Pasien</b> : {$data['pasien']} <br/>
		<b>Golongan Darah</b> : {$data['golongan']} <br/>
		<b>Jumlah</b> : {$data['jumlah']} <br/>
		<b>Catatan</b> : {$data['note']}
		</div>";

		echo $detail;
	}

}
