<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_bulanan extends MY_Controller {

	public $userdata = false;

	public function __construct(){
		parent::__construct();
		$this->userdata = $this->session->userdata();
		$this->load->model("M_Pesanan");
		$this->load->library('pdf');
		}
		//if( isset($this->userdata['role']) AND $this->userdata['role'] != 'admin' OR !isset($this->userdata['role']) ) show_404();
	

	public function index(){

		if( isset($_POST['id_pesanan']) ){
			$data = [
				"status"	=> $_POST['status'],
				"note"		=> $_POST['note']
			];

			$id_pesanan = $_POST['id_pesanan'];
			
		}

		$list = $this->M_Pesanan->riwayat_bulanan();
		$this->render('page/admin/riwayat_bulanan',[
			"list"	=> $list
		]);
	}

	public function laporan_pdf(){
		
				$pdf = new FPDF('l','mm','A5');
				// membuat halaman baru
				$pdf->AddPage();
				//menambahkan gambar
				// $pdf->Image("<?php echo base_url('/assets/images/logo.png')
				$pdf->Image('https://bankdarah.delvionita.me/logo.png',60,30,90,0,'PNG');
				// setting jenis font yang akan digunakan
				$pdf->SetFont('Arial','B',16);
				// mencetak string
				$pdf->Cell(200,35,'LAPORAN TRANSAKSI PEMESANAN DARAH BULAN JULI 2019',0,1,'C');
				$pdf->SetFont('Arial','B',12);
				
				// Memberikan space kebawah agar tidak terlalu rapat
				
				$pdf->Cell(150,15,'',0,1);
				$pdf->SetFont('Arial','B',10);
				$pdf->Cell(30,6,'Nama Perawat',1,0);
				$pdf->Cell(50,6,'Nama Pasien',1,0);
				$pdf->Cell(35,6,'Golongan Darah',1,0);
				$pdf->Cell(25,6,'Jumlah',1,0);
				$pdf->Cell(50,6,'Tanggal',1,1);
				$pdf->SetFont('Arial','',10);
				$pesanan = $this->db->query("SELECT * FROM pesanan where status = 'confirm'")->result();
				foreach ($pesanan as $row){
					$pdf->Cell(30,6,$row->nama_user,1,0);
					$pdf->Cell(50,6,$row->pasien,1,0);
					$pdf->Cell(35,6,$row->golongan,1,0);
					$pdf->Cell(25,6,$row->jumlah,1,0);
					$pdf->Cell(50,6,$row->updated_at,1,1);
				}
				$pdf->Output();
			
		}
		
}


	

