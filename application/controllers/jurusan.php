<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jurusan extends CI_Controller {
function __construct(){
	parent::__construct();
	$this->load->model('model_jurusan');
	cek_session();

}
	
	public function index()
	{
		
		$data['record']= $this->model_jurusan->tampil_data();
		$this->template->load('template','jurusan/lihat_data',$data);
	}



	function input_data()
	{

	if(isset($_POST['submit'])){
		$this->model_jurusan->insert();
		redirect('jurusan');
	}

	}
	function hapus(){
		$id=$this->uri->segment(3);
		$this->model_jurusan->hapus($id);
		redirect('jurusan');
	}

	function edit_data(){
		if(isset($_POST['submit'])){
		$this->model_jurusan->edit();
		redirect('jurusan');
	}else{
				$id=$this->uri->segment(3);
				$data['jurusan']=$this->model_jurusan->get_one($id)->row_array();
				$this->template->load('template','jurusan/edit_jurusan',$data);
		}
	}
}
