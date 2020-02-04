<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends CI_Controller {
function __construct(){
	parent::__construct();
	$this->load->model('model_pendidikan');
	cek_session();

}
	
	public function index()
	{
		
		$data['record']= $this->model_pendidikan->tampil_data();
		$this->template->load('template','pendidikan/lihat_data',$data);

	}



	function input_data()
	{

	if(isset($_POST['submit'])){
		$this->model_pendidikan->insert();
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert" id="success-alert"> Data Berhasil disimpan 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
			</button></div>');
		redirect('pendidikan');
	}

	}
	function hapus(){
		$id=$this->uri->segment(3);
		$this->model_pendidikan->hapus($id);
		redirect('pendidikan');
	}

	function edit_data(){
		if(isset($_POST['submit'])){
		$this->model_pendidikan->edit();
		redirect('pendidikan');
	}else{
				$id=$this->uri->segment(3);
				$data['pendidikan']=$this->model_pendidikan->get_one($id)->row_array();
				$this->template->load('template','pendidikan/edit_pendidikan',$data);

		}
	}

}
