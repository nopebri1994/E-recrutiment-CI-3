<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jabatan extends CI_Controller {
function __construct(){
	parent::__construct();
	$this->load->model('model_jabatan');
	cek_session();

}
	
	public function index()
	{
	
		$data['record']= $this->model_jabatan->tampil_data();
		$this->template->load('template','jabatan/lihat_data',$data);
	}

	function input_data()
	{

	if(isset($_POST['submit'])){
		$this->model_jabatan->insert();
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert" id="success-alert"> Data Berhasil disimpan 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
			</button></div>');
		redirect('jabatan');
	}

	}

	function hapus(){
		$id=$this->uri->segment(3);
		$this->model_jabatan->hapus($id);
			$this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert" id="success-alert"> Data Berhasil dihapus 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
			</button></div>');
		redirect('jabatan');
	}

	function edit_data()
	{
		if(isset($_POST['submit'])){
		$this->model_jabatan->edit();
		redirect('jabatan');
	}else{	
				$id = $this->uri->segment(3);
				$data['jabatan']=$this->model_jabatan->get_one($id)->row_array();
				$this->template->load('template','jabatan/edit_jabatan',$data);
		}

	}
}
