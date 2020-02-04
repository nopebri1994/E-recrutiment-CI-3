<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jadwal extends CI_Controller {
function __construct(){
	parent::__construct();
	$this->load->model('model_jadwal');

}
	
	public function index()
	{
		
		$data['record']= $this->model_jadwal->tampil_data();
		$this->template->load('template','jadwal/lihat_data',$data);
	}

	function input (){
		//$this->load->view('jadwal/input_data');
		$this->template->load('template','jadwal/input_data');
	}

	function input_data(){
		if (isset($_POST['submit'])){
			$this->model_jadwal->insert();
			redirect('jadwal');
		}
	}
	function hapus(){
		$id=$this->uri->segment(3);
		$this->model_jadwal->hapus($id);
		redirect('jadwal');
	}
	function edit_data(){
		if (isset($_POST['submit'])){
			$this->model_jadwal->edit();
			redirect('jadwal');
		}else{
			$id=$this->uri->segment(3);
			$data['jadwal']=$this->model_jadwal->get_one($id)->row_array();
			$this->template->load('template','jadwal/edit_jadwal',$data);
		}
	}
}
