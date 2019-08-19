<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan_darah extends MY_Controller { 

	public $userdata = false;

	public function __construct(){
		parent::__construct();
		$this->userdata = $this->session->userdata();
		$this->load->model("M_Penerimaan");
		$this->load->library('pdf');
		}
		//if( isset($this->userdata['role']) AND $this->userdata['role'] != 'admin' OR !isset($this->userdata['role']) ) show_404();
	

	public function index(){

		// if( isset($_POST['id_penerimaan']) ){
		// 	$data = [
		// 		"status"	=> $_POST['status'],
		// 		"note"		=> $_POST['note']
		// 	];
		// 	$id_penerimaan = $_POST['id_penerimaan'];
		// }

		$list = $this->M_Penerimaan->riwayat_bulanan();
		$this->render('page/admin/penerimaan_darah',[
			"list"	=> $list
		]);
	}

    public function tambah(){
		if( isset($_POST['jumlah']) ){
			$data = $_POST;
			
	$this->db->insert('penerimaan', $data);
	
    $this->session->set_flashdata("alert","<div class='alert alert-success'>Pesanan berhasil dilakukan</div>");
	
		}
	$list = $this->M_Penerimaan->list_data();
	$this->render('page/admin/tambah_penerimaan',[
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
				$pdf->Cell(200,35,'LAPORAN TRANSAKSI PENERIMAAN DARAH BULAN JULI 2019',0,1,'C');
				$pdf->SetFont('Arial','B',12);
				
				// Memberikan space kebawah agar tidak terlalu rapat
				
				$pdf->Cell(200,17,'',0,1);
                $pdf->SetFont('Arial','B',10);
                $pdf->Cell(20,6,'NO ',1,0);
                $pdf->Cell(60,6,'NO PENERIMAAN',1,0);
                // $pdf->Cell(40,6,'GOLONGAN DARAH',1,0);
                $pdf->Cell(60,6,' JUMLAH LABU ',1,0);
				// $pdf->Cell(30,6,'TOTAL',1,0);
				$pdf->Cell(45,6,'TANGGAL',1,1);
				
				
				$pdf->SetFont('Arial','',10);
				$pesanan = $this->db->query("SELECT * FROM penerimaan")->result();
				foreach ($pesanan as $row){
                    $pdf->Cell(20,6,$row->id_penerimaan,1,0);
                    // $pdf->Cell(40,6,$row->golongan,1,0);
                    // $pdf->Cell(30,6,$row->jumlah_golongan,1,0);
                    $pdf->Cell(60,6,$row->no_penerimaan,1,0);
                    $pdf->Cell(60,6,$row->jumlah,1,0);
					$pdf->Cell(45,6,$row->created_at,1,1);
					
				}
				$pdf->Output();
			
		}
		
}


	

