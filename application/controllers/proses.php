<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses extends CI_Controller {
function __construct(){
	parent::__construct();
	$this->load->model('model_proses');
	$this->load->model('model_pendidikan');	
	$this->load->model('model_pelamar');
	$this->load->model('model_jadwal');
	cek_session();
}

	
		public function index()
	{
		
		$data['record']= $this->model_proses->tampil_data();
		$this->template->load('template','proses/lihat_data',$data);
	}

	

	function input_data()
	{

	if(isset($_POST['submit'])){
		$this->model_proses->insert();
		redirect('proses');
	}else{
			$id= $this->uri->segment(3);
			
			$data['jadwal']= $this->model_jadwal->tampil_data();
			$data['pelamar']= $this->model_pelamar->ambil($id)->row_array();
			$this->template->load('template','proses/form_jadwal',$data);
		}

}
}