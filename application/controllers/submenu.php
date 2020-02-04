<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class submenu extends CI_Controller {

	function __construct(){
	parent::__construct();
	$this->load->model('model_submenu');
	$this->load->model('model_mainmenu');

}
	public function index()
	{
	
		//$this->load->view('home');
		$data['record']= $this->model_submenu->tampil_data();
		$this->template->load('template','submenu/lihat_data',$data);
	}

	function input_data()
	{
		if(Isset($_POST['submit']))
		{
			$this->model_submenu->insert();
			redirect('submenu');
		}else{
			$data['mainmenu']=$this->model_mainmenu->tampil_data();
			$this->template->load('template','submenu/input_data',$data);
		}


	}
}
