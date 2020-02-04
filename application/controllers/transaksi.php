<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	function __construct(){
	parent::__construct();
	$this->load->model('model_transaksi');
	$this->load->model('model_jadwal');
	$this->load->library('cfpdf');

	cek_session();
}

	
	public function index()
	{
	
		$data['jadwal']= $this->model_jadwal->tampil_data();
		$data['record']= $this->model_transaksi->tampil_data_tes();
		$this->template->load('template','transaksi/peserta_tes',$data);
	}

public function tidak_lulus()
	{
		
		$data['record']= $this->model_transaksi->tampil_data_tl();
		$this->template->load('template','transaksi/data_tl',$data);
	}

	public function tgl_tes()
	{
		if(isset($_POST['submit'])){
		
			$tanggal = $this->input->post('jadwal');
			$data['jadwal']= $this->model_jadwal->tampil_data();
			$data['record']= $this->model_transaksi->per_tanggal($tanggal);
		$this->template->load('template','transaksi/peserta_tes',$data);
		
	}
	if(isset($_POST['print'])){
		$this->load->library('pdf');
		$tgl_print = date('y-m-d');
		$pdf=new FPDF('P','mm','A4');
		$pdf->AliasNbPages();
		$pdf->AddPage();
	
		//header
		$pdf->image('assets/img/logo.png',40,3,-200);
		$pdf->cell(80);
		$pdf->SetFont('Arial','B','L');
		$pdf->SetFontSize(14);
		$pdf->Text(60,10,"Absensi Peserta Tes Calon Karyawan Baru",0,0,'C');
		$pdf->SetFont('Arial','B','L');
		$pdf->SetFontSize(12);
		$pdf->Text(70,15,"PT. Lion Metal Works Tbk Purwakarta");
		$pdf->SetFont('Arial','B','L');
		$pdf->SetFontSize(11);
		$pdf->Text(86,20,"Tanggal");
		$pdf->Text(103,20,$tanggal = $this->input->post('jadwal'));
		$pdf->SetFontSize(10);
		
		$pdf->ln(12);
		$pdf->cell(190,1,'','B',1,'L');
		$pdf->cell(190,1,'','B',0,'L');
		$pdf->ln(4);
		$pdf->SetFont('Arial','B','C');
		$pdf->setx(20);
		
		$pdf->Cell('10','9','No',1,0,'C');
		$pdf->Cell('60','9','Nama',1,0,'C');
		$pdf->Cell('20','9','umur',1,0,'C');
		$pdf->Cell('50','9','Pendidikan Terakhir',1,0,'C');
		$pdf->Cell('30','9','TTD',1,1,'C');
		// tampilkan dari database
		$pdf->SetFont('Arial','','L');
		$no=1;

		
		$data= $this->model_transaksi->per_tanggal($tanggal);
		foreach($data->result() as $d){
										$pdf->setx(20);
										$pdf->Cell('10','7',$no,1,0,'C');	
										$pdf->Cell('60','7',$d->nama,1,0,'');
										$pdf->Cell('20','7',$d->umur,1,0,'C');
										$pdf->Cell('50','7',$d->nama_pendidikan,1,0,'');
										$pdf->Cell('30','7','',1,1);
										$no++;
									}	
		$pdf->ln(12);

		$pdf->cell(157,'3',"Purwakarta 20".$tgl_print.",",0,1,'R');
		$pdf->cell(150,'7',"Dibuat Oleh,",0,0,'R');
		$pdf->ln(17);
		$pdf->SetFont('Arial','U','');
		$pdf->cell(150,'1',"M. Yusuf K.",0,1,'R');
		$pdf->SetFontSize(8);
		$pdf->SetFont('Arial','I','');
		$pdf->cell(146,'7',"HC Staff",0,0,'R');
		$pdf->Output();


	}
	
	}
}