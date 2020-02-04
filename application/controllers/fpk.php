<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fpk extends CI_Controller {
function __construct(){
	parent::__construct();
	$this->load->model('model_fpk');
	$this->load->model('model_pelamar');
	$this->load->model('model_jabatan');			
}

	
		public function index()
	{
		
		$data['record']= $this->model_fpk->tampil_data();
		$this->template->load('template','fpk/view',$data);
	}

	

	function input_data()
	{

	if(isset($_POST['submit'])){
		$this->model_fpk->insert();
		redirect('fpk');
	}else{	
			$data['jabatan']= $this->model_jabatan->tampil_data();
			$this->template->load('template','fpk/post',$data);
		}

}


	function proses()
	{

	if(isset($_POST['submit'])){
		$this->model_fpk->insert_proses();
		redirect('fpk');
	}else{	
			$data['record']= $this->model_fpk->tampil_data();
			$data['pelamar']= $this->model_pelamar->tampil_data_pem_fpk();
			$this->template->load('template','fpk/proses_fpk',$data);
		}

}

	function detail(){
			$id = $this->uri->segment(3);
			$data['detail']=$this->model_fpk->detail($id);
			$data['fpk']=$this->model_fpk->detail_fpk($id)->row_array();
			$this->template->load('template','fpk/detail',$data);

	}
}